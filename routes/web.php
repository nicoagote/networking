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

Route::middleware('guest')->get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/perfil', 'HomeController@perfil')->name('perfil');
Route::get('/editarpefil', 'HomeController@editarPefil')->name('editarperfil');
Route::get('/crearproyecto', 'HomeController@crearProyecto')->name('crearproyecto');
Route::get('/editarproyecto', 'HomeController@editarProyecto')->name('editarproyecto');
Route::get('/misproyectos', 'HomeController@misProyectos')->name('misproyectos');
Route::get('/proyecto', 'HomeController@proyecto')->name('proyecto');
Route::get('/contactos', 'HomeController@contacto')->name('contactos');
Route::get('/faqs', 'HomeController@faqs')->name('faqs');
