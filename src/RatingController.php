<?php

namespace Kavano\Rating;

use GuzzleHttp\Client;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
        //
        private static $rate_host;
        private static $app_key;
        private static $user_name;
        private static $password;
        private static $token;
    
        public function getRate()
        {
            self::getCredentials();
    
            $payload = [
                'headers' => [
                    'Authorization' => 'Bearer ' . self::$token,
                    'Accept'        => 'application/json'
                ],
                'form_params' => [
                    'user_id'  => auth()->user()->id,
                    'product_id'  => 1
                ],
            ];
            try {
                $client = new Client();
    
                $response = $client->post(self::$rate_host . '/api/rate/status', $payload);
                $recivedResponse =  json_decode($response->getBody()->getContents());
    
                $response = [
                    'message' => 'user rate status for this app',
                    'data' => $recivedResponse
                ];
                return response()->json($response, 200);
            } catch (\Exception $e) {
    
                return $e->getMessage();
            }
        }
    
        public function submitRate(Request $request)
        {
    
            self::getCredentials();
    
            $validation = $this->validate($request, [
                'rate' => 'required|int|min:1|max:5',
                'feedback' => 'max:255'
            ]);
    
            $agent = new Agent();
    
            $payload = [
                'headers' => [
                    'Authorization' => 'Bearer ' . self::$token,
                    'Accept' => 'application/json'
                ],
                'form_params' => [
                    'user_id' => auth()->user()->id,
                    'product_id' => 1,
                    'rate' => $request['rate'],
                    'feedback' => $request['feedback'],
                    'ip' => $request->ip(),
                    'device'   => $agent->device() . ' ' . $agent->version($agent->device()),
                    'platform' => $agent->platform() . ' ' . $agent->version($agent->platform()),
                    'browser'  => $agent->browser() . ' ' . $agent->version($agent->browser()),
                    'isDesktop' => $agent->isDesktop(),
                    'isMobile' =>  $agent->isMobile(),
                    'isTablet' =>  $agent->isTablet(),
                    'isRobot' =>   $agent->isRobot(),
                ]
            ];
    
            try {
                $client = new Client();
    
                $response = $client->post(self::$rate_host . '/api/rate/submit', $payload);
                $recivedResponse =  json_decode($response->getBody()->getContents());
                dd($recivedResponse);
                $response = [
                    'message' => 'user rated status for this app',
                    'data' => $recivedResponse ?: null
                ];
                return response()->json($response, 200);
            } catch (\Exception $e) {
    
                return $e->getMessage();
            }
        }
    
    
        private static function getCredentials()
        {
            self::$rate_host = config('rating.uri');
            self::$app_key = config("rating.app_key");
            self::$user_name = config("rating.username");
            self::$password = config("rating.password");
    
            $payload = [
                'form_params' => [
                    'email' => self::$user_name,
                    'password' => self::$password,
                ]
            ];
            try {
                $client = new Client();
    
                $response = $client->post(self::$rate_host . '/api/login', $payload);
                $recivedResponse =  json_decode($response->getBody()->getContents());
                self::$token = $recivedResponse->access_token;
            } catch (\Exception $e) {
    
                return $e->getMessage();
            }
        }
       
}
