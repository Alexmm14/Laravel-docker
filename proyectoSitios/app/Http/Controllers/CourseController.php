<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::all();
        return view("Course.index", compact("course"))
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Course.createCourse");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course -> title = $request['title'];
        $course -> credits = $request['credits']; 
        $course -> save();
        return redirect()->route('course.index')
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Course::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view("Course.editCourse", compact("course"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $courseRequest = request()->except(['_token', '_method']);
        Student::where('id', '=', $id)->update($courseRequest);
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Etiqueta eliminada correctamente');
    }
}
