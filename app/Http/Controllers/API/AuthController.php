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
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "user";
            $result = $user->save();
            echo json_encode($result);

        } catch (QueryException $e) {
            echo json_encode(["errorMessage" => $e->getMessage()]);
        }
    }

}
