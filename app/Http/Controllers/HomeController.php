<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    public function perfil()
    {
        return view('perfil');
    }

    public function editarPerfil()
    {
        return view('editarperfil');
    }

    public function crearProyecto()
    {
        return view('crearproyecto');
    }

    public function editarProyecto()
    {
        return view('editarproyecto');
    }

    public function misProyectos()
    {
        return view('misproyectos');
    }

    public function proyecto()
    {
        return view('proyecto');
    }
}
