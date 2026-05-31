<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\HomeworkAnswersController;
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
Route::get('/class/{class}', [ClassController::class, 'show'])->name("class");
Route::get('/class/{class}/code', [ClassController::class, 'show_code'])->name("code");

Route::get('/join', [ClassController::class, 'view'])->name('join');
Route::post('/join', [ClassController::class, 'join']);

Route::post('/icon/create', [FileUploadController::class, 'upload']);
Route::get('/icon', [FileUploadController::class, 'create'])->name('icon');

Route::get('/homework/{class}', [HomeworkController::class, 'create'])->name("homework");
Route::post('/homework/{class}', [HomeworkController::class, 'store']);

Route::get('/answers/{homework}', [HomeworkAnswersController::class, 'index']);
Route::put('/rate-answer/{homeworkAnswers}', [HomeworkAnswersController::class, 'rating']);
Route::get('/edit-answers/{homeworkAnswers}', [HomeworkAnswersController::class, 'edit']);
Route::put('/edit-answers/{homeworkAnswers}', [HomeworkAnswersController::class, 'update']);
Route::get('/give-answers/{homework}', [HomeworkAnswersController::class, 'create']);
Route::post('/give-answers/{homework}', [HomeworkAnswersController::class, 'store']);

require __DIR__.'/auth.php';
