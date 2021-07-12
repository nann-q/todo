<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Models\Content;


Route::get('/',[TodoController::class,'index']);




Route::post('/todo/create',[TodoController::class,'create']);
Route::post('/todo/create',[TodoController::class,'store']);

Route::post('/todo/update/{id}',[TodoController::class,'update']);
Route::post('/todo/update/{id}',[TodoController::class,'update'])->name('todo.update');


Route::post('/todo/delete/{id}',[TodoController::class,'delete']);




Route::resource('contents','TodoController');
