<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
      return view('dashboard.grade.index', [
        'title' => 'Grade',
        'grades' => Grade::all()
      ]);
    }

    public function create()
    {
      return view('dashboard.grade.create', [
        "title" => "Add New Grade",
    ]);
    }

    public function store(Request $request)
    {
      $validateData = $request->validate([
        "nama" => "required"
    ]);

    $result = Grade::create($validateData);
    if($result) {
        return redirect('/dashboard/grade')->with('success', 'New grade data has been added!');
    }
    }

    public function show(Grade $grade)
    {

    }

    public function edit(Grade $grade)
    {
      $result = Grade::destroy($grade->id);   
      if($result) {
          return redirect('/dashboard/grade')->with('success', 'Grade data has been deleted!');
      } else {
          return redirect('/dashboard/grade')->with('error', 'Grade data failed to delete!');
      }
    }

    public function update(Request $request, Grade $grade)
    {
      $request->validate([
        "nama" => "required",
    ]);

    $grade->update([
        "grade" => $request->grade,
    ]);

    return redirect('/dashboard/grade')->with('success', 'Grade data has been updated!');

    }

    public function destroy(Grade $grade)
    {
      $result = Grade::destroy($grade->id);   
      if($result) {
          return redirect('/dashboard/grade')->with('success', 'Grade data has been deleted!');
      } else {
          return redirect('/dashboard/grade')->with('error', 'Grade data failed to delete!');
      }
    }
}
