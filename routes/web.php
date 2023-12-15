<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\SetLocale;

Route::group(['middleware' => SetLocale::class], function () {
    Route::redirect('/', '/tasks');  // Page d'accueil

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


    Route::get('/change-language/{locale}', [TaskController::class, 'setLocale'])
        ->name('setLocale');
});
