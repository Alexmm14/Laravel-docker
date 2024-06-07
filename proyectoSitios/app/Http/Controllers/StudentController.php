<?php

namespace App\Http\Controllers;
use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return view("Student.index", compact("student"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Student.createStudent");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student -> name = $request['name'];
        $student -> email = $request['email'];
        $student -> save();
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Student::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view("Student.editStudent", compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $studentRequest = request()->except(['_token', '_method']);
        Student::where('id', '=', $id)->update($studentRequest);
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Etiqueta eliminada correctamente');
    }
}
