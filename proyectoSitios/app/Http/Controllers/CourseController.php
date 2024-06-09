<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->type_user_id;
        echo $user;

        $course = Course::all();
        return view("course.index", compact("course"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("course.createCourse");

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
        echo "Course created successfully";
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view("course.editCourse", compact("course"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $courseRequest = request()->except(['_token', '_method']);
        Course::where('id', '=', $id)->update($courseRequest);
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Etiqueta eliminada correctamente');
    }
}
