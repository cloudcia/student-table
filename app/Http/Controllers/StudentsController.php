<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('student.all', [
            "title" => "Students",
            "students" => Student::all()
        ]);
    }

    public function show($student)
    {
        return view('student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student)
        ]);
    }

    public function create()
    {
        return view('student.create', [
            'title' => 'Create Student',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kelas' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $student = new Student($validatedData);
        $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function destroy($student)
    {
        $student = Student::find($student);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

    public function edit($student)
    {
        $student = Student::find($student);
        return view('student.edit', [
            'title' => 'Edit Student',
            'student' => $student,
        ]);
    }

    public function update(Request $request, $student)
    {
        $student = Student::find($student);

        $validatedData = $request->validate([
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'kelas' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

}