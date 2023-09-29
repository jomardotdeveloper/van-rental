<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booked;
use App\Models\Reciept;
use App\Mail\RecieptSent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\RecieptRecieved;
use App\Models\Temporaryfile;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RecieptController extends Controller
{
   // uploads tmp
   public function tmpUploadReciept(Request $request)
   {
    //    dd($request);
    if ($request->hasFile('reciept')) {
        $image = $request->file('reciept');
        $file_name = $image->getClientOriginalName();
        // Generate a unique folder name for storing the image
        $folder = uniqid('reciept', true);
        // Generate a unique UUID
        $uploadedId = (string) Str::uuid();
        // Store the image in the specified folder
        $image->storeAs('reciept/tmp/' . $folder, $file_name);
        
        $uploadedRecord = Temporaryfile::create([
            'user_id' => Auth::user(),
            'uuid' => $uploadedId,
            'folder' => $folder,
            "file" => $file_name,
        ]);
        
        return response()->json(['uploaded_record' => $uploadedRecord]);
    }
    
   }

   // problem in here not deleteing
   public function tmpDeleteReciept(Request $request)
{
    dd($request);
    $folderName = request()->getContent();
   
    $tmp_file = Temporaryfile::where('folder', $folderName)->first();

    if ($tmp_file) {
        // Delete the folder and its contents
        Storage::deleteDirectory('reciept/tmp/' . $tmp_file->folder);

        // Delete the record from the database
        $tmp_file->delete();

        return response()->json(['message' => 'Receipt deleted successfully']);
    } else {
        return response()->json(['message' => 'Receipt not found'], 404);
    }
}


// send DRiver a reciept
public function tmpSendReciept(Request $request){
    // dd($request);
    // call temporaryfile model
    $temporaryfiles = Temporaryfile::where('folder', $request->folder)->first();
    // dd($temporaryfiles->uuid);
    // foreach ($temporaryfiles as $tempfile) {
    // copy the tmp                                             sstore to  new folder
    Storage::copy('reciept/tmp/' . $temporaryfiles->folder . '/' . $temporaryfiles->file, 'reciept/' . $temporaryfiles->folder . '/' . $temporaryfiles->file);
    Reciept::create([
        'user_id' => Auth::user()->id,
        'reciever_id' => $request->driverId,
        'reciept' => $temporaryfiles->file,
        'path' => $temporaryfiles->folder . '/' . $temporaryfiles->file,
    ]);
    // delete the folder
    Storage::deleteDirectory('reciept/tmp/' . $temporaryfiles->folder);
    $temporaryfiles->delete();

    $driver = User::where('id',$request->driverId)->first();
    // dd($driver->email);
    if($driver){
        $name = Auth::user()->firstname.' '.Auth::user()->lastname;
        Mail::to($driver->email)->send(new RecieptSent($name, Auth::user()->email));
    }
    // trigger the event notify
    event(new NotificationEvent(Auth::user()->firstname));
    // Optionally, you can return the updated user data in the response
    return response()->json(['message' => 'sent successfully', 'status'=>'success'], 200);
}

// get reciept
public function getPayments(){
    $reciepts = DB::table('reciepts')
    ->join('users', 'reciepts.user_id', '=', 'users.id')
    ->select('reciepts.*','users.firstname','users.lastname','users.email')
    ->where('reciepts.reciever_id', Auth::user()->id)
    ->where('reciepts.status', 0)
    ->latest()
    ->get();
    // $reciepts = Reciept::with('user')->where('reciever_id',Auth::user()->id)->latest()->get();
    foreach ($reciepts as $reciept) {
         // Convert created_at timestamp to time ago format
        $reciept->created_at = $this->getTimeAgo($reciept->created_at);
    }
    // dd($reciept);
    return response()->json($reciepts);
}

// recieved
public function postPayments (Request $request){
    // Find the receipt record by its ID
    $receipt = Reciept::find($request->id);
    if ($receipt) {
        // Update the status attribute
        $receipt->status = 1; // New status value
        // Save the changes
        $receipt->save();

        $booked = Booked::where('user_id',Auth::user()->id)->first();
            if($booked){
                $booked->status = 'accepted';
                $booked->save();
            }
        // trigger the event notify
        event(new NotificationEvent(Auth::user()->firstname));
        Mail::to($request->email)->send(new RecieptRecieved($request->name, $request->email));
        return response()->json(['status'=>'success']);
    }
}

// Function to convert timestamp to time ago format
private function getTimeAgo($timestamp)
{
    $currentTime = now();
    $previousTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestamp);
    $diffInMinutes = $previousTime->diffInMinutes($currentTime);

    if ($diffInMinutes < 1) {
        return 'Just now';
    } elseif ($diffInMinutes < 60) {
        return $diffInMinutes . ' mins ago';
    } elseif ($diffInMinutes < 1440) {
        $diffInHours = floor($diffInMinutes / 60);
        return $diffInHours . ' hours ago';
    } else {
        $diffInDays = floor($diffInMinutes / 1440);
        return $diffInDays . ' days ago';
    }
}
}
