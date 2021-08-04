<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\TweetController;
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

    Route::get('tweets/{id}/show', [TweetController::class,'show'] )->name('tweets.show');

    Route::get('tweets/create', [TweetController::class, 'showCreateForm'])->name('tweets.create');
    Route::post('tweets/create', [TweetController::class, 'create']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/app', function () {
    return view('app');
})->middleware(['auth'])->name('dashboard');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');




require __DIR__.'/auth.php';
