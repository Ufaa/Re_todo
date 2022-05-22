<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('/', [TodoController::class, 'index'])->name('index');
Route::resource('todos', TodoController::class);
Route::post('/create', [TodoController::class, 'create'])->name('create');
// Route::post('/delete/{id}', [TodoController::class, 'destroy'])->name('destroy');
// Route::post('/update/{id}', [TodoController::class, 'update'])->name('update');