<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // get comment for a specific post
    public function getComments($post_id) {
        $comments = Comment::where('postId', $post_id)->get();
        return response()->json($comments);
    }
    
    
    protected function addComment(Request $request) {
            $comment = new Comment();
            $comment->user_id = $request->userId;
            $comment->post_id = $request->postId;
            $comment->body = $request->body;
            
            $result = $comment->save();
            if($result) {
                echo json_encode(['status' => 'success', 'message' => 'Comment added successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error adding comment']);
            }


    }
}
