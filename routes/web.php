<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;

// Public routes

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
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

// Students routes
    Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
    Route::get('/students/detail/{student}', [StudentsController::class, 'show'])->name('students.show');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/students', [DashboardController::class, 'view'])->name('dashboard.students.index');
    Route::get('/dashboard/students/create', [DashboardController::class, 'create'])->name('dashboard.students.create');
    Route::get('/dashboard/students/detail/{student}', [DashboardController::class, 'show'])->name('dashboard.students.show');
    Route::post('/dashboard/students/store', [StudentsController::class, 'store'])->name('dashboard.students.store');
    Route::get('/dashboard/students/edit/{student}', [DashboardController::class, 'edit'])->name('dashboard.students.edit');
    Route::put('/dashboard/students/update/{student}', [StudentsController::class, 'update'])->name('dashboard.students.update');
    Route::delete('/dashboard/students/delete/{student}', [StudentsController::class, 'destroy'])->name('dashboard.students.destroy');
    Route::get('/dashboard/grade', [GradeController::class, 'index']);
    Route::get("/dashboard/grade/create", [GradeController::class, "create"]);
    Route::post("/dashboard/grade/add", [GradeController::class, "store"]);
    Route::delete('/dashboard/grade/destroy/{grade}', [GradeController::class, 'destroy']);
    Route::get('/dashboard/grade/edit/{grade}', [GradeController::class, 'edit']);
    Route::put('/dashboard/grade/update/{grade}', [GradeController::class, 'update']);

});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);
Route::post("/logout", [LoginController::class, "logout"]);