<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;


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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $users = User::all();
        return view('users.index', compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    function crete 
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
        $user = User::create($request->validated());
        return redirect()->route('users.show', $user);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $user->update($request->validated());
        return redirect()->route('users.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index');
    }

}
