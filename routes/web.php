<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;




// todos routes
// Route::middleware('auth')->group(function() {
// });

Route::resource('/todos', TodoController::class);
Route::put('/todos/{todo}/complete', [TodoController::class, 'complete'])->name('todos.complete');
Route::delete('/todos/{todo}/incomplete', [TodoController::class, 'incomplete'])->name('todos.incomplete');





Route::get('/', function () {
    // return config('services.ses.key');
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::post('/upload', [UserController::class, 'uploadAvatar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
