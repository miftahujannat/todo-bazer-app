<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;


Route::get(uri:'/', action: [TodoController::class, 'index']);
Route::post(uri:'/Todos', action: [TodoController::class, 'postTodo']);
Route::patch(uri:'/Todos/status/{id}', action: [TodoController::class, 'updateStatus']);
Route::get(uri:'/Todos/update/{id}', action: [TodoController::class, 'edit']);
Route::patch(uri:'/Todos/update/{id}', action: [TodoController::class, 'updateTodo']);
Route::patch(uri:'/Todos/delete/{id}', action: [TodoController::class, 'deleteTodo']);
