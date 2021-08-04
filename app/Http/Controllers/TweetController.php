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

    public function show(int $id)
    {
        $tweet = Tweet::find($id);
        return view('tweets/show',[
            'id' => $id,
            'tweet' => $tweet
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

    public function showEditForm(int $id)
    {
        $tweet = Tweet::find($id);

        return view('tweets/edit', [
            'id' => $id,
            'tweet' => $tweet,
        ]);
    }

    public function edit(int $id, Request $request)
    {
        $tweet = Tweet::find($id);
        $tweet->title = $request->title;
        $tweet->content = $request->content;
        $tweet->save();

        return redirect()->route('tweets.index');

    }

    public function showDeleteForm(int $id )
    {
        $tweet = Tweet::find($id);
        return view('tweets/delete', [
            'id' => $id,
            'tweet' => $tweet,
        ]);
    }

    public function delete(int $id)
    {
        $tweet = Tweet::find($id);
        $tweet->delete();
        return redirect()->route('tweets.index');
    }

}
