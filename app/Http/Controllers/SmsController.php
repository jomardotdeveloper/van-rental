<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SemaphoreService;
use App\Http\Requests\SmsValidationRequest;


class SMSController extends Controller
{

    public function send_sms($request)
    {
        $api_service = new SemaphoreService();
        $url = 'https://api.semaphore.co/api/v4/messages';
        $method = 'POST';
        $data = [
            'number' => $request['number'],
            'message' => $request['message'],
            'apikey' => config('services.semaphore.api_key')
        ];

        $response = $api_service->send_sms($url, $method, $data);

        // Process the API response or return an error message to the client
        return response()->json(['response' => $response]);
    }
}

