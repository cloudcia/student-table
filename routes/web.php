<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Http\Controllers\StudentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home' , [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about' , [
        "title" => "About",
        "nama" => "cia",
        "kelas" => "11 PPLG 2"
    ]);
});

Route::get('/student/all', [StudentsController::class, 'index'])->name('students.index');
Route::get('/student/detail/{student}', [StudentsController::class, 'show'])->name('students.show');
Route::get('/students/create', [StudentsController::class, 'create'])->name('students.create');
Route::post('/students/create', [StudentsController::class, 'store'])->name('students.store');
Route::get('/students/edit/{student}', [StudentsController::class, 'edit'])->name('students.edit');
Route::put('/students/edit/{student}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/delete/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');