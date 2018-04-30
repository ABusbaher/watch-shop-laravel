<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeIt(Request $request,$id)
    {
        $likeIt = Like::where(['comment_id' => $id])
            ->update(['likes_count'=>$request->likes_count]);
        return response()->json([$likeIt]);
    }

    public function likeItR(Request $request,$id)
    {
        $likeIt = Like::where(['reply_id' => $id])
            ->update(['likes_count'=>$request->likes_count]);
        return response()->json([$likeIt]);
    }

    public function dislikeIt(Request $request,$id)
    {
        $dislikeIt = Like::where(['comment_id' => $id])
            ->update(['dislikes_count'=>$request->dislikes_count]);
        return response()->json([$dislikeIt]);
    }

    public function dislikeItR(Request $request,$id)
    {
        $dislikeIt = Like::where(['reply_id' => $id])
            ->update(['dislikes_count'=>$request->dislikes_count]);
        return response()->json([$dislikeIt]);
    }

}
