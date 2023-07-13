<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Youverify\Youverify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BvnController extends Controller
{
    //for web interface
    public function verifyBvn(Request $request)
    {
        if (Auth::check()) {

            $request->validate([
                'id' => 'required'
            ]);

            $bvn = $request->id;

            // API key for Youverify
            $apiKey = 'SXFn2GA8.HwmyddDZkgmSdODrmtkHu1TwqPpagnKZ5PPE';

            // Youverify API endpoint

            $apiEndpoint = 'https://api.sandbox.youverify.co/v2/api/identity/ng/bvn';
            // https://api.youverify.co/v1/bvn/verify';

            // Create a Guzzle HTTP client
            $httpClient = new Client();

            // Make a POST request to the Youverify API
            $response = $httpClient->post($apiEndpoint, [
                'headers' => [
                    'token' => 'SXFn2GA8.HwmyddDZkgmSdODrmtkHu1TwqPpagnKZ5PPE',
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'id' => $bvn,
                    'isSubjectConsent' => true,
                ],
            ]);

            // Get the response body as an array
            $responseData = json_decode($response->getBody(), true);
            // dd($response);
            if ($response->getStatusCode() === 200 && $responseData['message'] === 'success') {

                $data = [
                    'id' => $responseData['data']['id'],
                    'firstName' => $responseData['data']['firstName'],
                    'lastName' => $responseData['data']['lastName'],
                    'mobile' => $responseData['data']['mobile'],
                    'dateOfBirth' => $responseData['data']['dateOfBirth'],
                    'businessId' => $responseData['data']['businessId'],
                    'country' => $responseData['data']['country'],
                ];
                // Pass the data to the success view
                return view('bvnsuccess', compact('data'));
            } else {
                // Pass the error message to the error view
                $error = isset($responseData['message']) ? $responseData['message'] : 'BVN verification failed';

                return view('bvnerror', compact('error'));
            }
        } else {
            return redirect('login');
        }
    }

//for api
    public function verifybvnapi(Request $request)
    {
            $request->validate([
                'id' => 'required'
            ]);

            $bvn = $request->id;

            // API key for Youverify
            $apiKey = 'SXFn2GA8.HwmyddDZkgmSdODrmtkHu1TwqPpagnKZ5PPE';

            // Youverify API endpoint

            $apiEndpoint = 'https://api.sandbox.youverify.co/v2/api/identity/ng/bvn';
            // https://api.youverify.co/v1/bvn/verify';

            // Create a Guzzle HTTP client
            $httpClient = new Client();

            // Make a POST request to the Youverify API
            $response = $httpClient->post($apiEndpoint, [
                'headers' => [
                    'token' => 'SXFn2GA8.HwmyddDZkgmSdODrmtkHu1TwqPpagnKZ5PPE',
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'id' => $bvn,
                    'isSubjectConsent' => true,
                ],
            ]);

            // Get the response body as an array
            $responseData = json_decode($response->getBody(), true);
            // dd($response);
            if ($response->getStatusCode() === 200 && $responseData['message'] === 'success') {

                $data = [
                    'id' => $responseData['data']['id'],
                    'firstName' => $responseData['data']['firstName'],
                    'lastName' => $responseData['data']['lastName'],
                    'mobile' => $responseData['data']['mobile'],
                    'dateOfBirth' => $responseData['data']['dateOfBirth'],
                    'businessId' => $responseData['data']['businessId'],
                    'country' => $responseData['data']['country'],
                ];

                return response()->json(['success' => true, 'data' => $data]);
            } else {

                $error = isset($responseData['message']) ? $responseData['message'] : 'BVN verification failed';
                return response()->json(['success' => false, 'error' => $error]);
            }
    }

}
