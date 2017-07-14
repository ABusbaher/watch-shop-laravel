<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request){
        $input = $request->all();
        $comment = Comment::create($input);
        return response()->json($comment);
    }
}
