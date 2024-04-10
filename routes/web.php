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
    Route::post('find', [App\Http\Controllers\RoomController::class, 'find'])->name('find');
    Route::get('close/{id}', [App\Http\Controllers\RoomController::class, 'close'])->name('close');
    Route::get('open/{id}', [App\Http\Controllers\RoomController::class, 'open'])->name('open');
});

Route::resource('quizzes', App\Http\Controllers\QuizController::class);
Route::resource('quizCollections', App\Http\Controllers\QuizCollectionController::class);
Route::resource('answers', App\Http\Controllers\AnswerController::class);
Route::resource('rooms', App\Http\Controllers\RoomController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
