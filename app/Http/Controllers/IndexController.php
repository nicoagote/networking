<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function inicio()
  {
      return view('index');
  }

  public function login()
  {
      return view('login');
  }

  public function register()
  {
      return view('register');
  }

  public function recuperar()
  {
      return view('recuperar');
  }
}
