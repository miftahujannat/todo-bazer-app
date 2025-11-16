<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;


Route::get(uri:'/', action: [TodoController::class, 'index']);
Route::post(uri:'/todos', action: [TodoController::class, 'postTodo']);
Route::patch(uri:'/todos/status/{id}', action: [TodoController::class, 'updateStatus']);
Route::get(uri:'/todos/update/{id}', action: [TodoController::class, 'edit']);
Route::patch(uri:'/todos/update/{id}', action: [TodoController::class, 'updateTodo']);
Route::delete(uri:'/todos/delete/{id}', action: [TodoController::class, 'deleteTodo']);
