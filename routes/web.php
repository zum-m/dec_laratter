<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

// ↓追加12.5
use App\Http\Controllers\FavoriteController;

use App\Http\Controllers\UnFavoriteController;




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

// Route::resource('tweet', TweetController::class);
Route::group(['middleware' => 'auth'], function () {
      // ↓追加12.5
    Route::post('tweet/{tweet}/favorites', [FavoriteController::class, 'store'])->name('favorites');
    Route::post('tweet/{tweet}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');

    Route::post('tweet/{tweet}/favorites2', [UnFavoriteController::class, 'butstore'])->name('favorites2');
    Route::post('tweet/{tweet}/unfavorites2', [UnFavoriteController::class, 'butdestroy'])->name('unfavorites2');

      // ↓追加
    Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');


    Route::resource('tweet', TweetController::class);
  });
Route::group(['middleware' => 'auth'], function () {
      // ↓追加12.5




      // ↓追加
    Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');


    Route::resource('tweet', TweetController::class);
  });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
