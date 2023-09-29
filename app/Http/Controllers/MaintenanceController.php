<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function postMaintenance(Request $request){
        // dd($request);
        $existingMaintenance = Maintenance::where('user_id', Auth::user()->id)->where('status','success')->first();
        if($existingMaintenance){
            $maintenance = new Maintenance();
            $maintenance->starting_date = $request->startingDate;
            $maintenance->end_date = $request->endDate;
            $maintenance->description = $request->description;
            $maintenance->status = 'maintenance';
            $maintenance->update();
            event(new NotificationEvent(Auth::user()->name));
            return response()->json(['status'=>'success', 'message'=>'Your Vehicle is set to a Maintenance']);
        }else{
            $maintenance = new Maintenance();
            $maintenance->user_id = Auth::user()->id;
            $maintenance->starting_date = $request->startingDate;
            $maintenance->end_date = $request->endDate;
            $maintenance->description = $request->description;
            $maintenance->status = 'maintenance';
            $maintenance->save();
            
        }
        event(new NotificationEvent(Auth::user()->name));
        return response()->json(['status'=>'success', 'message'=>'Your Vehicle is set to a Maintenance']);
    }

    public function getMaintenance(){
        $getMaintenance = Maintenance::where('user_id', Auth::user()->id)->first();
        return response()->json(['status'=>'success','maintenance'=>$getMaintenance]);
    }
}
