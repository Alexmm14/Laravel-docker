<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        #Información del usuario logueado
        $auth = Auth::user();
        $groups = Group::with('courses')->get();
        return view('group.index', compact('groups', 'auth'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('group.createGroup', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'group' => 'required|integer',
            'max_students' => 'required|integer|min:1',
            'cursos' => 'required|array|min:1|max:7',
            'cursos.*' => 'exists:courses,id',
        ]);

        $grupo = Group::create([
            'group' => $request->group,
            'max_students' => $request->max_students,
        ]);

        $grupo->courses()->attach($request->cursos);

        return redirect()->route('groups.index')->with('success', 'Grupo creado y cursos asignados correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener el grupo que se va a editar con los cursos asociados cargados
        $group = Group::with('courses')->findOrFail($id);

        // Obtener todos los cursos disponibles
        $courses = Course::all();

        // Pasar las variables a la vista
        return view('group.editGroup', compact('group', 'courses'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Extraer los datos del request, excepto los tokens y métodos
        $groupRequest = $request->except(['_token', '_method', 'courses']);
        $courseIds = $request->input('courses'); // Obtener los IDs de los cursos

        // Actualizar los datos del grupo
        Group::where('id', '=', $id)->update($groupRequest);

        // Encontrar el grupo actualizado
        $group = Group::find($id);

        // Actualizar las relaciones de cursos
        if ($group && $courseIds) {
            $group->courses()->sync($courseIds);
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('groups.index')->with('success', 'Grupo actualizado correctamente');
    }


    public function enroll(Request $request, $groupId)
    {
        $userId = auth()->user()->id; // Obtén el ID del usuario autenticado

        // Verifica si ya está inscrito
        if (User::find($userId)->groups->contains($groupId)) {
            return redirect()->back()->with('error', 'Ya estás inscrito en este grupo');
        }

        // Inscribir al usuario en el grupo
        User::find($userId)->groups()->attach($groupId);

        // Actualizar el número máximo de estudiantes del grupo
        Group::where('id', $groupId)->decrement('max_students');

        return redirect()->back()->with('success', 'Te has inscrito correctamente en el grupo');
    }

    public function enrolledCourses()
{
    // Obtener el usuario autenticado
    $user = auth()->user();

    // Obtener los grupos en los que el usuario está inscrito
    $enrolledGroups = $user->groups;

    // Cargar la vista y pasar los grupos inscritos por el usuario
    return view('users.index', compact('enrolledGroups'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $group = Group::findOrFail($id);
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Grupo eliminado correctamente');
    }
}
