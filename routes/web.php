<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/prueba', function() {
  $usuarios = App\User::all();
  $especialidades = App\Skill::all();
  $proyectos = App\Project::all();

  $datos = compact('usuarios', 'especialidades', 'proyectos');

  return view('prueba', $datos);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
