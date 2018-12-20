<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;

class AuthController{

    private $clientEndpoint;
    public function __construct()
    {
        # Place your endpoint URL here
        $this->clientEndpoint = 'http://localhost:8889';
    }

# POST user auth

    public function postAuthLogon(Request $request){

        $data = $request->json()->all();

        $username = $data['username'];
        $password = $data['password'];

        try {

            $body = "\"NzBkNjk5YWYtZWEzMC00NzA3LWE0OWMtOWNiNTFhNTEwYmZjOzk2OTVBNURBNDhFQTkwQjE7MDAwMDAwMDJGRDEwNzEyNDcxNjU3NzAzNEI0OEEwQ0NCNUIwQzFCNzgwQjNERUI2MDdFQTFFNzc0MDdCMDY0NzQxQ0UwNTBEMDAwMDAwMDA7\"";

            return response($body)
                ->header('Content-Type', 'application/json');

        } catch (RequestException $e) {

            if ($e->hasResponse()) {

                $err =  Psr7\str($e->getResponse());

                return response()->json([
                    'message' => $err,
                ], 404);

            }
        }

    }

    public function postDummy(){

        return response()->json([
            'status' => 'OK',
            'message' => 'allow dumy method',
        ], 200)
            ->header('Content-Type', 'application/json');

    }

    public function postDummyInq(){

        return response()->json([
            'PAN' => 'xxx',
            'PROCESSING_CODE' => 'xxx'

        ], 200)
            ->header('Content-Type', 'application/json');

    }


# OPTION user balance

    public function optionsBalance($accNo){
        return response()->json([
            'acc_number' => $accNo,
            'message' => 'allow options method',
        ], 200)
            ->header('Content-Type', 'application/json');
    }

# HEAD user balance

    public function headBalance($accNo){
        return response()->json([
            'acc_number' => $accNo,
            'message' => 'allow options method',
        ], 200)
            ->header('Content-Type', 'application/json');
    }


# DELETE user balance

    public function deleteBalance($accNo){

        return response()->json([
            'acc_number' => $accNo,
            'message' => 'successfully deleted',
        ], 200)
        ->header('Content-Type', 'application/json');

    }


# PUT user balance

    public function putBalance(Request $request){

        $data = $request->json()->all();
        $accNo = $data['accnumber'];

        return response()->json([
            'acc_number' => $accNo,
            'message' => 'successfully created',
        ], 200)
            ->header('Content-Type', 'application/json');

    }

# PATCH patchBalance

    public function patchBalance(Request $request){

        $data = $request->json()->all();
        $accNo = $data['accnumber'];

        return response()->json([
            'acc_number' => $accNo,
            'message' => 'field acc_number successfully updated',
        ], 200)
            ->header('Content-Type', 'application/json');

    }



}