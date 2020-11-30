<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function newComment(CommentRequest $request){
        $comment=Comment::create(
            [
                'post_id'=>$request->post_id,
                'content'=>$request->content
            ]
        );
        if($comment){
            return redirect()->back()->with('status', 'Your comment has been created!');
        }
        return redirect()->back()->with('status', 'Your comment fail!');
    }
}
