<?php

namespace App\Http\Controllers\API;

use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    

    public function register(Request $request) {
        try {
            $user = new User ([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
            $result = $user->save();
            echo json_encode($result);
            
        } catch(QueryException $e) {
            echo json_encode($e->getmessage());
        } 
    }
}
