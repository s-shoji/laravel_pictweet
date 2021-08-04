<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index(Tweet $tweet)
    {
        $tweet = Tweet::all();

        return view('tweets/index', [
            'tweets' => $tweet,
        ]);
    }

    public function showCreateForm()
    {
        return view('tweets/create');
    }

    public function create(Request $request)
    {
        // $user = Auth::user();
        
        $tweet = new Tweet();
        $tweet->title = $request->title;
        $tweet->content  = $request->content;
        $tweet->user_id  = Auth::id();
        $tweet->save();

        return redirect()->route('tweets.index');
    }
}
