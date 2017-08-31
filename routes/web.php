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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'IndexController@inicio')->name('index');
Route::get('/login', 'IndexController@login')->name('login');
Route::get('/register', 'IndexController@register')->name('register');
Route::get('/recuperar', 'IndexController@recuperar')->name('recuperar');
Route::get('/perfil', 'UserController@perfil')->name('perfil');
Route::get('/editarpefil', 'UserController@editarPefil')->name('editarperfil');
Route::get('/crearproyecto', 'UserController@crearProyecto')->name('crearproyecto');
Route::get('/editarproyecto', 'UserController@editarProyecto')->name('editarproyecto');
Route::get('/misproyectos', 'UserController@misProyectos')->name('misproyectos');
Route::get('/proyecto', 'UserController@proyecto')->name('proyecto');
