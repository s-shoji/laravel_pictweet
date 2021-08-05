<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function(){
    Route::get('tweets/index', [TweetController::class,'index'] )->name('tweets.index');

    Route::get('tweets/{id}/show', [CommentController::class,'index'] )->name('tweets.show');

    Route::get('tweets/create', [TweetController::class, 'showCreateForm'])->name('tweets.create');
    Route::post('tweets/create', [TweetController::class, 'create']);

    Route::get('tweets/{id}/edit', [TweetController::class,'showEditForm'])->name('tweets.edit');
    Route::post('tweets/{id}/edit', [TweetController::class,'edit']);

    Route::get('tweets/{id}/delete', [TweetController::class,'showDeleteForm'])->name('tweets.delete');
    Route::post('tweets/{id}/delete', [TweetController::class,'delete']);

    Route::post('tweets/{id}/comment', [CommentController::class,'create'])->name('comments.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('app', function () {
    return view('layouts/app');
})->middleware(['auth'])->name('dashboard');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');




require __DIR__.'/auth.php';
