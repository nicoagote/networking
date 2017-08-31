<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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
