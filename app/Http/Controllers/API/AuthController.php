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
            $result = $user->save();
            echo json_encode(["done" => $result, "userData" => $request]);

        } catch (QueryException $e) {
            if(str_contains($e, 'users_email_unique')) {
                echo json_encode(["errorMessage" => 'email']);
            } else {
                echo json_encode(["errorMessage" => 'else']);

            }
        }
    }

}
