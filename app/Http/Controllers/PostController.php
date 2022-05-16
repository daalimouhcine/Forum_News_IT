<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        Carbon::setLocale('fr');
        $posts = Post::orderBy("id", "asc")->with('user')->with('category')->with('comments')->with('votes')->get();


        return response()->json($posts);
    }


    protected function addPost(Request $request) {
        if($request->file('image')){

            $image = $request->file('image')->store('images','public');
    
            $post = Post::create([
                    'title' => $request->input('title'),
                    'body' => $request->input('body'),
                    'user_id' => $request->input('user_id'),
                    'category_id' => $request->input('category_id'),
                    'image' => $image,
            ]);
            
            $post->save();
        }else{
            $post = Post::create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'user_id' => $request->input('user_id'),
                'category_id' => $request->input('category_id'),
                'image' => 'Null',
        ]);
        
        $post->save(); 
        }

        return Redirect::back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
