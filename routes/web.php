<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if(Auth::user()->role === "Admin"){
        return view('admin.index');
    }elseif(Auth::user()->role === "Teacher"){
        return view('teacher.index');
    }elseif(Auth::user()->role === "Pupil"){
        return view('pupil.index');
    }else{
        abort(403);
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/accounts', [AdminController::class, 'index'])->name('accounts');
Route::delete('/accounts/{user}/delete', [AdminController::class, 'destroy']);
Route::get('/accounts/{user}', [AdminController::class, 'show']);
Route::get('/accounts/{user}/edit', [AdminController::class, 'edit']);
Route::put('/accounts/{user}', [AdminController::class, 'update']);

Route::get('/class/create', [ClassController::class, 'create'])->name('create');
Route::post('/dashboard', [ClassController::class, 'store']);
Route::get('/class/{class}', [ClassController::class, 'show']);

Route::get('/join', [ClassController::class, 'view'])->name('join');
Route::post('/join', [ClassController::class, 'join'])->name('join');
require __DIR__.'/auth.php';
