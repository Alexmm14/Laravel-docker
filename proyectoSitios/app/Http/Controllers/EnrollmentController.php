<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Group;
use App\Models\Course;

class EnrollmentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $courses = Course::with('groups')->get();
        return view('enrollment.index', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $student = Student::find($request->student_id);
        $group = Group::find($request->group_id);

        if ($group->students()->count() < $group->max_students) {
            $student->groups()->attach($group);
            return redirect()->route('enrollment.index')->with('success', 'Inscripción realizada con éxito');
        }

        return redirect()->route('enrollment.index')->with('error', 'El grupo está lleno');
    }

    public function showCourses(Request $request)
    {
        $student = Student::find($request->student_id);
        $groups = $student->groups;

        return view('enrollment.show_courses', compact('student', 'groups'));
    }
}
