<?php

namespace App\Http\Controllers;

use App\Models\Van;
use App\Models\User;
use App\Mail\OTPMail;
use App\Mail\RegistrationVehicleSuccess;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\Temporaryfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    // client controller
    public function client()
    {
        return view('dashboard.layouts.client-dashboard');
    }
    // driver controller
    public function driver()
    {
        return view('dashboard.layouts.driver-dashboard');
    }
    // admin controller
    public function admin()
    {
        // dd(User::all());
        return view('dashboard.admin-dashboard');
    }

    // register vehicle post
    public function registerVehiclePost(Request $request){
        $validator = Validator::make($request->all(), [
            // 'id' => ['required', 'integer'],
            'idNumber' => ['required', 'integer'],
            'orcr' => ['required', 'integer'],
            'plateNumber' => ['required', 'string'],
            'fullname' => ['required', 'string'],
            'companyName' => ['required', 'string'],
            'address' => ['required', 'string'],
            'model' => ['required', 'string'],
            'bags' => ['required', 'string'],
            'seats' => ['required', 'string'],
            'ac' => ['required', 'string'],
            'fuel' => ['required', 'string'],
        ]);

        // call temporaryfile model
        $temporaryfiles = Temporaryfile::all();
        if ($validator->fails()) {
            foreach ($temporaryfiles as $tempfile) {
                // delete the folder
                Storage::deleteDirectory('vehicle/tmp/' . $tempfile->folder);
                Storage::deleteDirectory('liscensed/tmp/' . $tempfile->folder);
                $tempfile->delete();
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($request->id);
        if($user){
            $user->update([
                'is_activated' => 0,
                'idno' => $request->idNumber,
                'orcr' => $request->orcr,
                'platenumber' => $request->plateNumber,
                'show_to_dashboard' => true

            ]);

            Van::create([
                'user_id' => $user->id,
                'idnumber' => $request->idNumber,
                'orcr' => $request->orcr,
                'platenumber' => $request->plateNumber,
                'fullname'=>$request->fullname,
                'companyname'=>$request->companyName,
                'address'=>$request->address,
                'model'=>$request->model,
                'bag'=>$request->bags,
                'seat'=>$request->seats,
                'ac'=>$request->ac,
                'fuel'=>$request->fuel,
            ]);

            // call temporaryfile model
        $temporaryfiles = Temporaryfile::all();
        foreach ($temporaryfiles as $tempfile) {
            // copy the tmp                                             sstore to  new folder
            Storage::copy('vehicle/tmp/' . $tempfile->folder . '/' . $tempfile->file, 'vehicle/' . $tempfile->folder . '/' . $tempfile->file);
            Storage::copy('liscensed/tmp/' . $tempfile->folder . '/' . $tempfile->file, 'liscensed/' . $tempfile->folder . '/' . $tempfile->file);
            Document::create([
                'user_id' => $user->id,
                'name' => $tempfile->file,
                'path' => $tempfile->folder . '/' . $tempfile->file,
            ]);
            // delete the folder
            Storage::deleteDirectory('vehicle/tmp/' . $tempfile->folder);
            Storage::deleteDirectory('liscensed/tmp/' . $tempfile->folder);
            $tempfile->delete();
        }

        }else{
            return redirect()->route('register.driver')->with([
                'approved' => 'Error Sending!',
            ]);
        }
        $name = $user->firstname.' '.$user->lastname;
        Mail::to($user->email)->send(new RegistrationVehicleSuccess($name,$user->email));

         // Redirect to the login page with success and approval messages
         return redirect()->route('register.vehicle')->with([
            'success' => 'Email Verified successfully',
            'approved' => 'Registration of vehicle is submitted!, your form is now submitted. Wait for administrator to approved your application.',
            'is_activated'=>false,
        ]);
    }

    // get Van Credentials
    public function getVanCredentials(){
        $vans = Van::with(['user','user.documents', 'user.maintenances'])
            ->get()->all();
        return response()->json($vans);
    }

    // about page
    public function about(){
        return view('dashboard.client.about');
    }
    // about driver
    public function aboutDriver(){
        return view('dashboard.client.driver-about');
    }
    // inquiry
    public function inquiry(){
        return view('dashboard.client.inquire');
    }
    // message driver
    public function messageDriver() {
        return view('dashboard.client.message-driver');
    }
    // complain on driver
    public function complainDriver() {
        return view('dashboard.client.complain-driver');
    }
    // customer's info
    public function customersInfo() {
        return view('dashboard.driver.customers-info');
    }
    // drivers account
    public function driversAccount() {
        return view('dashboard.driver.drivers-account');
    }
    // message customer
    public function messageCustomer() {
        return view('dashboard.driver.message-customer');
    }
    // add services
    public function addServices() {
        return view('dashboard.driver.add-services');
    }
    // add customer complete info page
    public function customerInfo() {
        return view('dashboard.driver.customer-info');
    }
    // get all booked
    public function getAllBooked(){
        return view('components.drivers.all-booked');
    }
    // load the home page
    public function driverHome(){
        return view('components.drivers.home');
    }
    // load the all client page
    public function getAllClientHome(){
        return view('components.drivers.all-client');
    }
    // register vehicle
    public function registerVehicle(){
        return view('components.drivers.registration-vehicle');
    }
}
