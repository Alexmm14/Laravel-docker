<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->type_user_id;
        if ($user == 1) {
            #Alumno
            return view('home');
        }
        elseif ($user == 2) {
            #profesor
            return view('home');
        }
        else {
            #admin
            return view('home');
        }
    }
}
