<?php

namespace App\Http\Controllers;

use App\Models\Van;
// use App\Models\Client;
use App\Models\User;
// use App\Models\Booked;

use App\Mail\OTPMail;
use App\Models\Booked;
use App\Models\Document;
use App\Models\Verifytoken;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Temporaryfile;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function registerDriver()
    {
        return view('auth.register-driver');
    }
    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => ['required', 'integer'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'birthplace' => ['required', 'string'],
            'contact' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthdate' => ['required', 'date'],
            'municipality' => ['required', 'string'],
            'zipcode' => ['required', 'integer'],
            'barangay' => ['required', 'string'],
            'street' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],

        ]);
        $client = User::create([
            'role' => 1,
            'is_activated' => 1, //activated account
            'approved' => 1,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'contact' => $request->contact,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'municipality' => $request->municipal,
            'zipcode' => $request->zipcode,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'password' => Hash::make($request->password),
            // Rest of the attributes...
        ]);
        return redirect()->route('login')->with(['success' => 'Register successfully', 'is_activated' => $client->is_activated]);
    }
    public function registerDriverPost(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'role' => ['required', 'integer'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            // 'age' => ['required', 'integer'],
            'birthplace' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'contact' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthdate' => ['required', 'date'],
            'municipality' => ['required', 'string'],
            'zipcode' => ['required', 'integer'],
            'barangay' => ['required', 'string'],
            'street' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
            // 'idNumber' => ['required', 'integer'],
            // 'orcr' => ['required', 'integer'],
            // 'plateNumber' => ['required', 'string'],

        ]);

        // call temporaryfile model
        $temporaryfiles = Temporaryfile::where('uuid', $request->uuid)->first();
        // dd($request);
        if ($validator->fails()) {

            // delete the folder
            Storage::deleteDirectory('profile/tmp/' . $temporaryfiles->folder);
            $temporaryfiles->delete();

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $get_user_email = $request->email;
        $get_user_name = $request->firstname . " " . $request->lastname;
        Mail::to($request->email)->send(new OTPMail($get_user_email, "Submit your application, just click the link below.", $get_user_name, "Verify Email", 'otp.verify-email'));
        // pass the request to a verify-Email function
        $this->verifyEmail($request);
        // Redirect to the login page with success and approval messages
        return redirect()->route('register.driver')->with([
            'success' => 'Register successfully',
            'approved' => 'We sent a verification link to your email!, Click the links below to continue the registration form.',
            'is_activated' => false,
        ]);

    }

    // driver verify email
    public function verifyEmail(Request $request)
    {
        // dd($request);
        $user = User::create([
            'role' => $request->role,
            'firstname' => $request->firstName,
            'lastname' => $request->lastName,
            'gender' => $request->gender,
            'age' => $request->age,
            'birthplace' => $request->birthplace,
            'nationality' => $request->nationality,
            'contact' => $request->contact,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'municipality' => $request->municipality,
            'zipcode' => $request->zipcode,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'password' => Hash::make($request->password),
            // for email used
            'is_activated' => 3,
            // 'idno' => $request->idNumber,
            // 'orcr' => $request->orcr,
            // 'platenumber' => $request->plateNumber,
            // Rest of the attributes...
        ]);

        // call temporaryfile model
        $temporaryfiles = Temporaryfile::where('uuid', $request->uuid)->first();

        // copy the tmp                                             sstore to  new folder
        Storage::copy('profile/tmp/' . $temporaryfiles->folder . '/' . $temporaryfiles->file, 'profile/' . $temporaryfiles->folder . '/' . $temporaryfiles->file);
        Document::create([
            'user_id' => $user->id,
            'name' => $temporaryfiles->file,
            'path' => $temporaryfiles->folder . '/' . $temporaryfiles->file,
        ]);
        // delete the folder
        Storage::deleteDirectory('profile/tmp/' . $temporaryfiles->folder);
        $temporaryfiles->delete();
        Auth::logout();
        // Redirect to the login page with success and approval messages
        return redirect()->route('register.driver')->with([
            'success' => 'Email Verified successfully',
            'approved' => 'Verified email, your form is now submitted. Wait for administrator to approved your application.',
            'is_activated' => false,
        ]);
    }

    public function verifyEmailPost(Request $request)
    {
        $account = User::findOrFail($request->email);
        // Perform the necessary update logic
        $account->is_activated = 1;
        $account->save();
        // Redirect to the login page with success and approval messages
        return redirect()->route('register.driver')->with([
            'success' => 'Email Verified successfully',
            'approved' => 'Verified email, your form is now submitted. Wait for administrator to approved your application.',
            'is_activated' => false,
        ]);
    }

    // email verified
    public function emailVerified(Request $request, $email)
    {
        // dd($email);
        $account = User::where('email', $email)->first();

        if ($account) {
            $account->approved = 0;
            $account->is_activated = 1;
            $account->save();
        }
        // Redirect to the login page with success and approval messages
        return redirect()->route('login')->with([
            'success' => 'Email Verified successfully',
            'approved' => 'Verified email, your form is now submitted. Wait for administrator to approved your application.',
        ]);
    }

    // uploads tmp
    public function tmpUpload(Request $request)
    {
        // dd($request);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            // Generate a unique folder name for storing the image
            $folder = uniqid('profile', true);
            // Generate a unique number as the ID for the image
            $uploadedId = Temporaryfile::max('uuid') + 1;
            // Store the image in the specified folder
            $image->storeAs('profile/tmp/' . $folder, $file_name);
            Temporaryfile::create([
                // 'user_id' => Auth::user();
                'uuid' => $uploadedId,
                'folder' => $folder,
                "file" => $file_name,
            ]);
            return response()->json(['folder' => $folder, 'uploaded_id' => $uploadedId]);
        }
    }

    // delete
    public function tmpDelete()
    {
        $tmp_file = Temporaryfile::where('folder', request()->getContent())->first();
        if ($tmp_file) {
            // delete the folder
            Storage::deleteDirectory('profile/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }

    public function login()
    {
        // get the session on the email
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user->role);
            if ($user->role == 1) {
                // User is a client
                return redirect('/client-dashboard')->with([
                    'success' => 'Login Success',
                    'name' => $user->firstname,
                    'showAlert' => true
                ]);
            } elseif ($user->role == 2) {
                if ($user->approved == 1) {
                    // User is an approved driver
                    return redirect('/driver-dashboard')->with(['success' => 'Login Success', 'is_activated' => $user->is_activated]);
                } elseif($user->approved == 0) {
                    // need to logout if not approved
                    Auth::logout();
                    // User is a driver pending approval ,'is_activated'=>$user->is_activated
                    return redirect()->route('login')->with(['approved' => 'Email verification success!. However your account is pending approval. Please wait for Bataan Van Rental Administrator authorization.']);
                }elseif($user->approved == 5){
                    Auth::logout();
                    return redirect()->route('login')->with([
                        'is_activated' => false,
                        'email' => $request->email,
                        'password' => $request->password,]);
                }
            } elseif ($user->role == 3) {
                // User is an admin
                return redirect('/admin-dashboard')->with('success', 'Login Success');
            }
        }
        return back()->with('error', 'Invalid email or password');
    }
    public function loginPostOtp(Request $request)
    {
        // dd($request);
        $enteredOtp = $request->otp;
        $enteredEmail = $request->email;
        $enteredPassword = $request->password;

        $credentials = [
            'email' => $enteredEmail,
            'password' => $enteredPassword,
        ];

        // OTP Methods for Driver
        $get_token = Verifytoken::where('token', $enteredOtp)->first();

        if ($get_token) {
            $get_token->is_activated = 2;
            $get_token->save();

            // Update the user account
            $user = User::where('email', $get_token->email)->first();
            $user->is_activated = 1; // Assuming 1 means verified
            $user->approved = 1; // Assuming 1 means approved
            $user->save();

            // Delete the token
            $get_token->delete();

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                    // User is an approved and verified driver
                    return redirect('/driver-dashboard')->with(['success' => 'Login Success', 'is_activated' => $user->is_activated]);

            }
        } else {
            Auth::logout();
            // User failed OTP verification
            return redirect()->route('login')->with([
                'is_activated' => 0,
                'approved' => "You need OTP to proceed.",
                'email' => $enteredEmail,
                'password' => $enteredPassword
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/')->with('logout', true);
    }

    public function confirmationBooking(Request $request)
    {
        $driver = Van::where('user_id', Auth::user()->id)->first();
        if ($driver) {
            $get_user_email = $request->email;
            $get_user_name = $request->user_name;
            $get_booking_id = $request->booking_id;
            // $get_vehicle_name = $request->vehicle_name;
            $get_pickup = $request->pickup;
            $get_dropoff = $request->dropoff;
            $get_booking_date = $request->booking_date;

            $booked = Booked::where('user_id',Auth::user()->id)->first();
            if($booked){
                $booked->status = 'payment';
                $booked->save();
            }
            // $get_total_amount = $request->total_amount;
            Mail::to($get_user_email)->send(new BookingConfirmationMail($get_user_name, $get_booking_id, $get_pickup, $get_dropoff, $get_booking_date));
            event(new NotificationEvent(Auth::user()->name));
            return response()->json(['status' => 'success']);
        }
    }
}
