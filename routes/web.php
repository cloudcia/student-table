<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "nama" => "cia",
        "kelas" => "11 PPLG 2"
    ]);
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Students routes
Route::get('/students/all', [StudentsController::class, 'index'])->name('students.index');
Route::get('/students/detail/{student}', [StudentsController::class, 'show'])->name('students.show');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/students/store', [StudentsController::class, 'store'])->name('students.store');
Route::get('/students/edit/{student}', [StudentsController::class, 'edit'])->name('students.edit');
Route::put('/students/update/{student}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/delete/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
