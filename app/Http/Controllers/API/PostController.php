<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    protected function addPost(Request $request) {
        $post = new Post();
        $post->userId = $request->userId;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image_path = $request->image_path;
    }
}
