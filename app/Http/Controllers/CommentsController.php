<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'username' => 'required|min:5',
            'comment_text' => 'required'
        ]);
        $input = $request->all();
        $comment = Comment::create($input);
        $like = Like::create(['comment_id' => $comment->id]);
        return response()->json($comment);
    }
}
