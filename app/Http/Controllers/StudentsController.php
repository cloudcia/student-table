<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\Session;

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
            "title" => "Student Details",
            "students" => Student::find($student)
        ]);
    }

    public function create()
    {
        return view('student.create', [
            'title' => 'Add Student',
            'grades' => Grade::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'grade_id' => 'required',
            'alamat' => 'required|string',
        ]);

        $student = new Student($validatedData);
        $student->save();

        Session::flash('success', 'Student created successfully');
        return redirect('/students/all');
    }

    public function destroy($student)
    {
        $student = Student::find($student);
        $student->delete();

        Session::flash('success', 'Student deleted successfully');
        return redirect('/students/all');
    }

    public function edit(Student $student)
    {
        return view('student.edit', [
            "title" => "Edit Student Data",
            "student" => $student,
            "grades" => Grade::all()
        ]);
    }


    public function update(Request $request, $student)
    {
        $student = Student::find($student);
    
        $validatedData = $request->validate([
            'nis' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'grade_id' => 'required|exists:grades,id',
            'alamat' => 'required|string',
        ]);
    
        Student::where('id', $student->id)->update([
            "nis" => $request->nis,
            "nama" => $request->nama,
            "tanggal_lahir" => $request->tanggal_lahir,
            "grade_id" => $request->grade_id,
            "alamat" => $request->alamat
        ]);
    
        Session::flash('success', 'Student updated successfully');
        return redirect()->route('students.index'); 
    }
    
}