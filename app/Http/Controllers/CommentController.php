<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tweet;

class CommentController extends Controller
{
    public function create(int $id,Request $request)
    {

        $tweet_id = Tweet::find($id)->id;
        $user_id = Auth::id();
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->tweet_id = $tweet_id;
        $comment->user_id = $user_id;
        $comment->save();

        return redirect()->route('tweets.show',[
            'id' => $id,
        ]);
    }

    public function index(int $id, Comment $comment)
    {
        $tweet = Tweet::find($id);
        $comment = DB::table('comments')->where('tweet_id', $id)->get();

        return view('tweets/show', [
            'id' => $id,
            'tweet' => $tweet,
            'comments' => $comment,
        ]);
    }
}
