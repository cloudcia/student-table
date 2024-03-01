<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function create()
    {
        return view('dashboard.student.create', [
            'title' => 'Add Student',
            'grades' => Grade::all(),
        ]);
    }

    public function edit(Student $student)
    {
        return view('dashboard.student.edit', [
            "title" => "Edit Student Data",
            "student" => $student,
            "grades" => Grade::all()
        ]);
    }

    public function view() {
        $students = Student::query();

        if (request()->has('search') && request('search')) {
            $students->filter(['search' => request('search')]);
        }

        return view('dashboard.student.index', [
            'title' => 'Student All',
            'students' => $students->latest()->paginate(8),
            'grade' => Grade::all()           ]);
    }

    public function show($student)
    {
        return view('dashboard.student.detail', [
            "title" => "Student Details",
            "students" => Student::find($student),
            'grade' => Grade::all()
        ]);
    }

    public function grade() {
        $grades = Grade::query();

        if (request()->has('search') && request('search')) {
            $grades->filter(['search' => request('search')]);
        }

        return view('dashboard.grade.index', [
            'title' => 'Student All',
            'students' => $grade->latest()->get()
        ]);
    }
}