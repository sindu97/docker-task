<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    /*===== Task Routes =======*/
    Route::resource('tasks', TaskController::class);
    Route::get('download', [TaskController::class, 'downloadCsv'])->name('tasks.download');
    Route::get('delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
