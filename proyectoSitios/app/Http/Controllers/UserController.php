<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'sometimes|required|string|min:8',
        ]);

        $user = User::findOrFail($id);

        if (isset($validatedData['name'])) {
            $user->name = $validatedData['name'];
        }
        if (isset($validatedData['email'])) {
            $user->email = $validatedData['email'];
        }
        if (isset($validatedData['password'])) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }

    public function showUserGroups($userId)
    {
        $user = User::findOrFail($userId);
        return view('users.index', ['user' => $user]);
    }

    public function getTeachers()
    {
        // Verificar si el usuario autenticado es admin
        if (Auth::user()->typeUser->name !== 'Admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        // Obtener todos los usuarios de tipo "Profesor"
        $teachers = User::whereHas('typeUser', function ($query) {
            $query->where('name', 'Profesor');
        })->get();

        return response()->json($teachers);
    }

    public function getStudents()
    {
        // Verificar si el usuario autenticado es admin
        if (Auth::user()->typeUser->name !== 'Admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        // Obtener todos los usuarios de tipo "Alumno"
        $students = User::whereHas('typeUser', function ($query) {
            $query->where('name', 'Alumno');
        })->get();

        return response()->json($students);
    }

}
