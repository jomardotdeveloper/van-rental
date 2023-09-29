<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\SmsController;
use App\Finders\UserFinder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Managers\UserManager;

class ClientController extends Controller
{
    //client home
    public function clientHome(){
        return view('components.clients.home');
    }

    // client Services
    public function clientServices(){
        return view('components.clients.services');
    }

    // Client about
    public function clientAbout(){
        return view('components.clients.about');
    }
    // Client clientProfile
    public function clientProfile(){
        $account = Auth::user();
        return view('components.clients.profile')->with(['account'=>$account]);
    }
    // Client clientLocation
    public function clientLocation(){
        return view('components.clients.location');
    }
    // Client Booked
    public function clientBooked(Request $request){
        // dd($request->id);
        $data = $request->input('item');
        // Now you can directly create a new record in the "trips" table
        $clientBooked = Booked::create([
            'user_id' => $data['id'],
            'sender_id' => Auth::user()->id,
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'middlename' => $data['middlename'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'destination' => $data['destination'],
            'pickup' => $data['pickup'],
            'landmark' => $data['landmark'],
            'dateoftrip' => $data['dateoftrip'],
            'pax' => $data['pax'],
            'daysandhours' => $data['daysandhours'],
            'pickuptime' => $data['pickuptime'],
            'status' => 'Succesfully Booked'
            // Add other fields here
        ]);

        //get drivers contact number
        $result = UserFinder::find_user($data['id']);

        //send an sms to driver
        $sms = new SmsController();
        Log::info($sms->send_sms([
            'number' => "63" . $result['contact'],
            'message' => 'Hi '.ucwords($result['firstname']).', '.$data['firstname'].' has place an order on your van!'
        ]));

        //send an sms to user
        Log::info($sms->send_sms([
            'number' => "63" . substr($data['contact'],1),
            'message' => 'Dear' . $data['firstname']  .  ', We are delighted to inform you that your booking with Bataan Van Services has been successfully confirmed! Booking Details: - Drivers Name: ' . $result['firstname'] .  ' - Date and Time of Booking: - Pickup Location: - Drop-off Location: - Number of Passengers: Our team is now busy preparing to ensure a safe and comfortable journey for you and your fellow passengers. Our experienced drivers and well-maintained vehicles are ready to provide you with a seamless and enjoyable travel experience.Thank you for choosing Bataan Van Services for your transportation needs. We look forward to serving you and providing you with an exceptional travel experience. Safe travels!'
        ]));

        // Handle the case where the user with the given ID is not found
        return response()->json(['message' => 'Booking Successfully sent!','booking' => $clientBooked]);
    }

    // chatroom
    // public function chatRoom(Request $request){
    //     return view('components.clients.chatroom');
    // }

    public function getSeenMessageClient(Request $request){
        // user who login
        $outgoing_id = Auth::user()->id;
        // user who recieve a message
        $incoming_id = $request->incoming_id;

        $messages = DB::table('chats')
            ->select('chats.*', 'users.*', 'chats.created_at as chat_created_at')
            ->leftJoin('users', 'users.id', '=', 'chats.outgoing_msg_id')
            ->leftJoin('documents', 'documents.user_id', '=', 'users.id') // Assuming there's a user_id column in the Document table
            // ->where(function ($query) use ($outgoing_id, $incoming_id) {
            //     $query->where('outgoing_msg_id', $outgoing_id)
            //         ->where('incoming_msg_id', $incoming_id)
            //         ->where('read', 'seen'); // Add this condition to filter by 'unseen' messages
            // })
            // get the message for the specific users
            // remove for now where('outgoing_msg_id', $incoming_id)
            ->Where(function ($query) use ($outgoing_id, $incoming_id) {
                $query
                    ->where('incoming_msg_id', $outgoing_id);
                    // ->where('read', 'seen'); // Add this condition to filter by 'unseen' messages
            })
            ->orderBy('chats.id','desc')
            ->get();


        // Now, loop through the messages and fetch related documents for each user
        foreach ($messages as $message) {
            $userDocuments = DB::table('documents')
                ->where('user_id', $message->id) // Assuming user_id in documents table
                ->get();

            $message->documents = $userDocuments; // Attach documents to the message object
            // Convert created_at timestamp to time ago format
            $message->created_at = $this->getTimeAgo($message->chat_created_at);
        }

        return response()->json($messages);
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

    public function process_payment(Request $request){
        $amount = $request->input('amount');
        $nonce = round(microtime(true) * 1000);
        $redirect_uri = 'http://127.0.0.1:8000/client-dashboard';

        //live account
        //$link = 'https://api.nextpay.world/v2/paymentlinks';
        //$secret = 'u7t4rlw251kqr1tdkziw6iqo';
        //$client_key = 'ck_rb1f8rpm5oyd68x39ochcatl';

        //sandbox account
        $link ='https://api-sandbox.nextpay.world/v2/paymentlinks';
        $secret = 'e0fnx6fw2dtz9s4upnz9zgnw';
        $client_key = 'ck_sandbox_q41sjwn2bducgna2n6zxqfd4';


        $client = new \GuzzleHttp\Client();

        $data = [
            "title" => "Bataan Car Rental Services.",
            "amount" => $amount,
            "currency" => "PHP",
            "description" => "Your trust warms our hearts and drives us to create unforgettable travel experiences. At Bataan Car Rental Services, we provide more than just cars; we're dedicated to ensuring your journeys are smooth, safe, and enjoyable. We look forward to serving you again in the future. If you have any further questions or need assistance, please don't hesitate to reach out. We strive to make your experience with us perfect every time.",
            "private_notes" => "string",
            "limit" => 1,
            "redirect_url" => $redirect_uri,
            "nonce" => $nonce, // Generate a timestamp-based nonce
        ];

        $signature = hash_hmac('sha256', json_encode($data,JSON_UNESCAPED_SLASHES), $secret);

        $response = $client->request('POST', $link, [
          'body' => json_encode($data),
          'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'client-id' => $client_key,
            'idempotency-key' => '',
            'signature' => $signature,
          ],
        ]);

        $responseBody = $response->getBody();

        return response($responseBody, 200)->header('Content-Type', 'application/json');
    }

    // update account
    public function updateAccount(Request $request){
        // dd($request);
        // Find the user by their ID
        $user = User::find(Auth::user()->id);
        $insertedProductsNotif = [];
        $message = '';
        $type = '';
        if($user){
            if(Hash::check($request->input('password'),$user->password)){
                if ($user->firstname !== $request->firstname) {
                    $user->firstname = $request->firstname;
                }
                if ($user->lastname !== $request->lastname) {
                    $user->lastname = $request->lastname;
                }
                if ($user->middlename !== $request->middlename) {
                    $user->middlename = $request->middlename;
                }
                if ($user->contact !== $request->contact) {
                    $user->contact = $request->contact;
                }
                if ($user->email !== $request->email) {
                    $user->email = $request->email;
                }
                if ($user->birthdate !== $request->date) {
                    $user->birthdate = $request->date;
                }
                if ($user->municipality !== $request->municipal) {
                    $user->municipality = $request->municipal;
                }
                if ($user->zipcode !== $request->code) {
                    $user->zipcode = $request->code;
                }
                if ($user->street !== $request->street) {
                    $user->street = $request->street;
                }
                if ($user->barangay !== $request->barangay) {
                    $user->barangay = $request->barangay;
                }
                if ($user->password !== Hash::make($request->input('new-password')) && $request->input('new-password') !== null) {
                    $user->password = Hash::make($request->input('new-password'));
                    // You don't need to log the user out here
                    // They will need to log in again with the new password
                    $user->save();
                    $insertedProductsNotif[] = $user;
                    $type = 'success';
                     // Prepare the toast notification data
                    $notification = [
                        'status' => $type,
                        'message' => 'Your password has changed, please login!',
                    ];

                    // Convert the notification to JSON
                    $notificationJson = json_encode($notification);
                    Auth::logout();
                    return redirect()->route('login')->with('notification', $notificationJson);
                }

                // Check if other fields have changed
                if ($user->isDirty()) {
                    $user->save();
                    $insertedProductsNotif[] = $user;
                    $message = 'Successfully Updated!';
                    $type = 'success';
                }

                // Build the success message
                $messages = $message;

                // Prepare the toast notification data
                $notification = [
                    'status' => $type,
                    'message' => $messages,
                ];

                // Convert the notification to JSON
                $notificationJson = json_encode($notification);
                // If no fields have changed, just return without logging out
                return back()->with('notification', $notificationJson);

            }else{
                return back()->with(['failed' => 'Pasword Incorrect']);
            }
        }else {
            // Handle the case where the user is not found
            return redirect()->route('client-dash-profile')->with('error', 'User not found');
        }
    }
    public function update_password(Request $request){
        $user = new UserManager();
        return response()->json($user->update_password($request));
    }
}
