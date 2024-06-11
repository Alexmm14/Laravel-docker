<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
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
        #ver si es alumno profesor o administrador

        $course = Course::all();
        $auth = Auth::user();
        if ($auth->type_user_id == 2){
            $teacherId = Auth::user()->id;
            return view("course.index", compact("course", "auth", 'teacherId'));
        }if ($auth->type_user_id == 1) {
            return view("course.index", compact("course", "auth"));
        } else {
            return view("course.index", compact("course", "auth"));
        }


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


    public function getTeacherCourses($userId)
    {
        // Obtener el usuario y asegurarse de que es un Alumno
        $user = User::where('id', $userId)->whereHas('typeUser', function ($query) {
            $query->where('name', 'Profesor');
        })->first();

        // Verificar si el usuario es un alumno y existe
        if ($user) {
            // Obtener los cursos del usuario a través de los grupos
            $courses = Course::where('teacher_id', $userId)->get();
            return response()->json($courses);
        } else {
            return response()->json(['message' => 'Usuario no encontrado o no es un profesor'], 404);
        }
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

        $courseRequest = request()->except(['_token', '_method', 'countIns']);
        Course::where('id', '=', $id)->update($courseRequest);
        if ($request->has('countIns')) {
            User::where('id', '=', Auth::user()->id)->update(['countIns' => $request->input('countIns')]);
        }
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
