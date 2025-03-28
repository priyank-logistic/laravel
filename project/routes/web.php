<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('students',[StudentController::class,'index'])->name('students.index');
Route::delete('students/delete/{id}',[StudentController::class,'delete']);
Route::get('students/add',[StudentController::class,'addStudent']);
Route::get('students/update-subscription/{id}',[StudentController::class,'updateSubscription']);

require __DIR__.'/auth.php';
