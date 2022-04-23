<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    protected function register(Request $request) {
        try {
            $user = new User();
            $user->first_name = trim($request->first_name);
            $user->last_name = trim($request->last_name);
            $user->email = trim($request->email);
            $user->password = Hash::make($request->password);
            if(empty($user->first_name) || empty($user->last_name)) {
                echo json_encode(["errorMessage" => "inputs shouldn't be empty"]);

            } else {
                $result = $user->save();
                echo json_encode(["done" => $result, "userData" => $user]);
            }

        } catch (QueryException $e) {
            if(str_contains($e, 'users_email_unique')) {
                echo json_encode(["errorMessage" => 'Email is all ready used']);
            } else {
                echo json_encode(["errorMessage" => 'some thing went wrong pleas try again']);

            }
        }
    }

    protected function login(Request $request) {
        try{
            $user = User::where('email', $request->email)->first();
            if(!empty($user)) {
                if(Hash::check($request->password, $user->password)) {
                    echo json_encode(["done" => true, "userData" => $user]);
                } else {
                    echo json_encode(["errorMessage" => "password is incorrect"]);
                }
            }
        } catch(QueryException $e) {
            echo json_encode(["errorMessage" => "some thing went wrong pleas try again"]);
        }
    }


}


