<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/demo', function() {
    return view('daisyui-test');
});

Route::get('/learning',[
    LearningController::class,
    'index'
] )->middleware(['auth','verified'])->name('learning');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('kelas-malam-laravel', function() {
    echo "<h1>Selamat datang ke Kelas Malam Laravel</h1>";
});

require __DIR__.'/auth.php';