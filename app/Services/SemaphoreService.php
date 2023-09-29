<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Log;

class SemaphoreService
{
    protected $client;

    public function __construct(){
        $this->client = new Client();
    }

    public function send_sms($url, $method = 'GET', $data = [])
    {
        try{
            if($method == 'POST'){
                $response = $this->client->post($url,[
                    'json' => $data
                ]);

                return $response->getBody()->getContents();
            }

            return response()->json([
                'error' => 'Invalid method. Method not allowed'
            ]);

        } catch (ClientException $e) {

            $statusCode = $e->getCode();
            $responseBody = $e->getResponse()->getBody()->getContents();
            
            return response()->json(['error' => 'Client Error', 'status_code' => $statusCode, 'message' => $responseBody]);
        
        } catch (ServerException $e) {
            
            $statusCode = $e->getCode();
            $responseBody = $e->getResponse()->getBody()->getContents();
            
            return response()->json(['error' => 'Server Error', 'status_code' => $statusCode, 'message' => $responseBody]);

        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            return response()->json(['error' => 'General Error', 'message' => $errorMessage]);

        }
    }
}
