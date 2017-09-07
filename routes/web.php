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

Route::get('/home{show}', 'HomeController@home');

Route::get('/download/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    if (substr($filename, 0, 3) == 'cur') {
      $file_path =  storage_path() . '\\app\\public\\curriculums\\'. $filename;
    } else {
      $file_path =  storage_path() .'\\app\\public\\profile_pictures\\'. $filename;
    }

    // dd($file_path);

    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
})
->where('filename', '[A-Za-z0-9\-\_\.]+');

Route::get('/perfil{id}', 'HomeController@perfil');

Route::get('/perfil', 'HomeController@perfilpropio');
Route::post('/perfil', 'HomeController@interactionPerfil');

Route::post('/buscar', 'HomeController@buscar');
Route::get('/buscar', 'HomeController@buscarGet');

Route::get('/editarperfil', 'HomeController@editarPerfil')->name('editarperfil');
Route::post('/editarperfil', 'HomeController@guardarPerfil');

Route::get('/crearproyecto', 'HomeController@crearProyecto')->name('crearproyecto');
Route::post('/crearproyecto', 'HomeController@guardarProyecto')->name('guardarProyecto');

Route::get('/editarproyecto{id}', 'HomeController@editarProyecto');
Route::post('/editarproyecto/guardar', 'HomeController@guardarProyectoEditado');

Route::get('/misproyectos', 'HomeController@misProyectos')->name('misproyectos');

Route::get('/contactos', 'HomeController@contacto')->name('contactos');
Route::post('/contactos', 'HomeController@request');

Route::get('/faqs', 'HomeController@faqs')->name('faqs');

Route::get('/proyecto{id?}', 'HomeController@proyecto');
