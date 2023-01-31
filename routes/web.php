<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;

use App\Http\Controllers\DynamicDependent;

use App\Http\Controllers\TaskController;





//**************************Session get,put and destroy*************************
Route::get('/session/get',[SessionController::class,'getSessionData']);
Route::get('/session/store',[SessionController::class,'storeSessionData']);
Route::get('/session/destroy',[SessionController::class,'destroySessionData']);




//****************Ajax Dynamic Dependent Dropdown in Laravel*************************
Route::get('/dynamic_dependent',[DynamicDependent::class,'index']);
Route::post('/dynamic_dependent/fetch',[DynamicDependent::class,'fetch'])->name('dynamicdependent.fetch');






//***********************Ajax Popap Bar***************************
Route::get('/',[TaskController::class,'index']);

Route::get('/task/fetch', [TaskController::class, 'fetch'])->name('task.fetch');

//Store
Route::post('/task/store',[TaskController::class,'store']);
//Edit
Route::get('/task/edit/{id}',[TaskController::class,'edit']);
//Update
Route::post('/task/update/{id}',[TaskController::class,'update']);
//Delete
Route::post('/task/delete/{id}',[TaskController::class,'destroy']);

Route::get('/task/index', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/fetch', [TaskController::class, 'fetch'])->name('task.fetch');
// Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
Route::delete('/task/{task}/destroy', [TaskController::class, 'destroy'])->name('task.destroy');
Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{task}/update', [TaskController::class, 'update'])->name('task.update');

