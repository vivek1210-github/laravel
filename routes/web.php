<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;

// todos routes
Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::get('/todos/create', [TodoController::class, 'create']);
Route::post('/todos/create', [TodoController::class, 'store']);
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
Route::patch('/todos/{todo}/update', [TodoController::class, 'update'])->name('todo.update');


Route::get('/', function () {
    // return config('services.ses.key');
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::post('/upload', [UserController::class, 'uploadAvatar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
