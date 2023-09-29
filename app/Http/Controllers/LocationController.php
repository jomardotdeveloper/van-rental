<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{

    // get user location
    public function getUserLocation(Request $request, $id){
        $location = Location::where('user_id',$id)->get();

        if($location->isEmpty()){
            return response()->json(['data'=>'The User Location is not available for now.']);
        }
        return response()->json($location);
    }

    // stored user location

    public function postUserLocation(Request $request){
    $user = User::where('id', Auth::user()->id)->first();
    if ($user) {
        // Check if location already exists for the user
        $existingLocation = Location::where('user_id', $user->id)->first();
        if ($existingLocation) {
            // Location already exists, update the existing location
            $existingLocation->update([
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);
        } else {
            // Location does not exist, create a new location record
            $location = new Location;
            $location->user_id = $user->id;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->save();
        }
        // Respond with a success message or data
        return response()->json(['data' => 'Location saved successfully.']);
    }

    // Respond with an error message if user not found
    return response()->json(['data' => 'Looks like there is no user corresponding to that information.']);
}

}
