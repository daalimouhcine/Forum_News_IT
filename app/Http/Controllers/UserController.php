<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\RequiresElement;

class UserController extends Controller
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
                echo json_encode(["done" => $result]);
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
            } else {
                echo json_encode(["errorMessage" => "email is incorrect"]);
            }
        } catch(QueryException $e) {
            echo json_encode(["errorMessage" => "some thing went wrong pleas try again"]);
        }
    }

    public function updateProfile(Request $request) {
        // check if the email is all ready exist
        $user = User::where('email', $request->email)->first();
        // return email is all ready exist
        if(!empty($user) && $user->id != $request->userId) {
            return response()->json(["error" => "email is all ready exist"]);
        } 

        $user = User::where('id', $request->userId)->first();

        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        if(!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $result = $user->save();
        return response()->json(["done" => $user]);
    }
    

    public function users() {
        $users = User::where('role', 'user')->get();
        return response()->json([$users]);
    }


    public function deleteUser(Request $request) {
        $user = User::where('id', $request->userId)->first();
        // delete the posts of this user
        $posts = Post::where('user_id', $request->userId)->get();
        foreach ($posts as $post) {
            Post::destroy($post->id);
        }
        // delete the comments of this user
        $comments = Comment::where('user_id', $request->userId)->get();
        foreach ($comments as $comment) {
            Comment::destroy($comment->id);
        }
        // delete the user
        User::destroy($user->id);
        return response()->json(["done" => true]);
    }

}
