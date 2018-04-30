<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'username' => 'required|min:5',
            'reply_text' => 'required'
        ]);
        $input = $request->all();
        $reply = Reply::create($input);
        $like = Like::create(['reply_id' => $reply->id]);
        return response()->json($reply);
    }
}
