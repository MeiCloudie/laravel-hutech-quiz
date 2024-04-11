<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('rooms')->group(function () {
    Route::get('{id}/play', [App\Http\Controllers\PlayController::class, 'index'])->name('play.index');

    Route::post('find', [App\Http\Controllers\RoomController::class, 'find'])->name('find');
    Route::get('close/{id}', [App\Http\Controllers\RoomController::class, 'close'])->name('close');
    Route::get('open/{id}', [App\Http\Controllers\RoomController::class, 'open'])->name('open');
    Route::get('join/{id}', [App\Http\Controllers\RoomController::class, 'join'])->name('join');
    Route::get('leave/{id}', [App\Http\Controllers\RoomController::class, 'leave'])->name('leave');
})->middleware('auth');

Route::resource('quizzes', App\Http\Controllers\QuizController::class)->middleware('auth');
Route::resource('quizCollections', App\Http\Controllers\QuizCollectionController::class)->middleware('auth');
Route::resource('answers', App\Http\Controllers\AnswerController::class)->middleware('auth');
Route::resource('rooms', App\Http\Controllers\RoomController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
