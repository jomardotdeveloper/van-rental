<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Models\Chat;
use App\Models\User;
use App\Models\Booked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function getUserCredentials(Request $request, $id)
    {
        // dd($id);
        $driver = User::with(['documents', 'vans', 'locations','bookeds'])->find($id);
        // If the user with the given ID exists
        if ($driver) {
            // Now you can access the user's documents, vans, and locations
            $user = $driver; // The main user data

            // Do something with the retrieved data
            // For example, return the data as JSON
            return response()->json([
                'user' => $user
            ]);
        } else {
            // Handle the case where the user with the given ID is not found
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function getAllClientBooked(Request $request, $id)
    {
        $booked = Booked::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return response()->json($booked);
    }

    // return chat page
    public function chatRoomDriver()
    {
        return view('components.drivers.chatroom');
    }

    // send Message to client
    public function sendClientMessage(Request $request)
    {
        $message = new Chat();
        $message->incoming_msg_id = $request->incoming_id;
        $message->outgoing_msg_id = Auth::user()->id;
        $message->msg = $request->message;
        $message->save();

        event(new NotificationEvent(Auth::user()->name));
        return response()->json(['status' => 'success']);
    }

    // get message
    public function getClientMessage(Request $request)
    {
        // use Illuminate\Support\Facades\DB;
        $outgoing_id = Auth::user()->id;
        $incoming_id = $request->incoming_id;
        $messages = DB::table('chats')
            ->select('chats.*', 'users.*')
            ->leftJoin('users', 'users.id', '=', 'chats.outgoing_msg_id')
            ->leftJoin('documents', 'documents.user_id', '=', 'users.id') // Assuming there's a user_id column in the Document table
            ->where(function ($query) use ($outgoing_id, $incoming_id) {
                $query->where('outgoing_msg_id', $outgoing_id)
                    ->where('incoming_msg_id', $incoming_id);
            })
            ->orWhere(function ($query) use ($outgoing_id, $incoming_id) {
                $query->where('outgoing_msg_id', $incoming_id)
                    ->where('incoming_msg_id', $outgoing_id);
            })
            ->orderBy('chats.id')
            ->get();

        // Now, loop through the messages and fetch related documents for each user
        foreach ($messages as $message) {
            $userDocuments = DB::table('documents')
                ->where('user_id', $message->id) // Assuming user_id in documents table
                ->get();

            $message->documents = $userDocuments; // Attach documents to the message object
        }
        return response()->json($messages);
        // $messages now contains the fetched messages

    }
    // public function getClientMessageDriver(Request $request)
    // {
        
    //     $outgoing_id = Auth::user()->id;
    // $incoming_id = $request->incoming_id;
    
    // $messages = DB::table('chats')
    //     ->select('chats.*', 'users.*')
    //     ->leftJoin('users', 'users.id', '=', 'chats.outgoing_msg_id')
    //     ->leftJoin('documents', 'documents.user_id', '=', 'users.id')
    //     ->where(function ($query) use ($outgoing_id, $incoming_id) {
    //         $query->where('outgoing_msg_id', $outgoing_id)
    //             ->where('incoming_msg_id', $incoming_id);
    //     })
    //     ->orWhere(function ($query) use ($outgoing_id, $incoming_id) {
    //         $query->where('outgoing_msg_id', $incoming_id)
    //             ->where('incoming_msg_id', $outgoing_id);
    //     })
    //     ->orderBy('chats.id')
    //     ->get();

    // // Create an associative array to hold documents for each user
    // $userDocumentsMap = [];

    // // Loop through the messages and populate the userDocumentsMap
    // foreach ($messages as $message) {
    //     $user_id = $message->id; // Change this to the appropriate user_id field

    //     if (!isset($userDocumentsMap[$user_id])) {
    //         $userDocumentsMap[$user_id] = [];
    //     }

    //     $userDocuments = DB::table('documents')
    //         ->where('user_id', $user_id) // Assuming user_id in documents table
    //         ->get();

    //     $userDocumentsMap[$user_id] = $userDocuments;
    // }

    // // Attach the documents to the respective message objects
    // foreach ($messages as $message) {
    //     $user_id = $message->id; // Change this to the appropriate user_id field

    //     if (isset($userDocumentsMap[$user_id])) {
    //         $message->documents = $userDocumentsMap[$user_id];
    //     }
    // }
    // // dd($messages);

    // return response()->json($messages);

    // }
    // get booked request
    public function getBookedRequest(Request $request){
         // Get the Booked model data with status "pending" for the authenticated user
        //  $booked = Booked::where('user_id', Auth::user()->id)
        //  ->where('status', 'pending')
        //  ->get();

        $booked = DB::table('bookeds')
        ->where(function ($query) {
            $userId = Auth::user()->id;
            $query->where('user_id', $userId)
                ->orWhere('sender_id', $userId);
        })
        ->where('status', '!=', 'successful')
        ->get();
    
                // Now, loop through the messages and fetch related documents for each user
        foreach ($booked as $book) {
            // Convert created_at timestamp to time ago format
            $book->created_at = $this->getTimeAgo($book->updated_at);
        }
        //  dd($booked);
         
         return response()->json($booked);
    }
    // get booked by id request
    public function getBookedByIdRequest(Request $request, $id) {
        $booked = DB::table('bookeds')
            ->where('id', $id)
            ->where('status', '!=', 'successful')
            ->get();
    
        // Now, loop through the booked items and modify the created_at timestamp
        foreach ($booked as $book) {
            // Convert created_at timestamp to time ago format
            $book->created_at = $this->getTimeAgo($book->created_at); // Assuming you meant to use created_at here

            // new added
                    // Retrieve documents related to the user_id of this booked item
            $documents = DB::table('documents')
                ->where('user_id', $book->user_id)
                ->get();

            $book->documents = $documents; // Attach documents to the booked item

            $users = DB::table('users')
                ->where('id', $book->user_id)
                ->get();

            $book->users = $users; // Attach documents to the booked item
        }
    
        return response()->json($booked);
    }
    
    // get unseen message
    public function getUnseenMessage(Request $request)
    {
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
                    ->where('incoming_msg_id', $outgoing_id)
                    ->where('read', 'unseen'); // Add this condition to filter by 'unseen' messages
            })
            ->orderBy('chats.id')
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
    // update unseen to seen
    public function updateUnseenMessage(Request $request)
    {
        // user who recieve a message
        $outgoing_id = $request->outgoing_id;

        Chat::where('outgoing_msg_id',$outgoing_id)
        ->update(['read'=>'seen']);
        return response()->json(['status'=>'success']);
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
