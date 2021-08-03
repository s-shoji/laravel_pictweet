<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
class TweetController extends Controller
{
    public function index(Tweet $tweet)
    {
        $tweet = Tweet::all();

        return view('tweets/index', [
            'tweets' => $tweet,
        ]);
    }
}
