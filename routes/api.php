<?php

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// USERS
Route::get('/users', function() {
  return App\User::all();
});

Route::get('/user/{id}', function($id) {
  return App\User::find($id);
});

Route::get('/user/{id}/contacts', function($id) {
  return App\User::find($id)->contacts;
});

Route::get('/user/{id}/sentRequests', function($id) {
  return App\User::find($id)->sentRequests;
});

Route::get('/user/{id}/pendingRequests', function($id) {
  return App\User::find($id)->pendingRequests;
});

Route::get('/user/{id}/blocked', function($id) {
  return App\User::find($id)->blocked;
});

Route::get('/user/{id}/blockedBy', function($id) {
  return App\User::find($id)->blockedBy;
});

Route::get('/user/{id}/skills', function($id) {
  return App\User::find($id)->skills;
});

Route::get('/user/{id}/endorsed', function($id) {
  $user = App\User::find($id);
  $endorsedCollection = collect([]);
  foreach ($user->skills as $skill) {
    $endorsedCollection[$skill->id] = ($user->endorsed($skill));
  }
  return $endorsedCollection;
});

Route::get('/user/{id}/reviews', function($id) {
  return App\User::find($id)->reviews;
});

Route::get('/user/{id}/projects', function($id) {
  return App\User::find($id)->projects;
});

// SKILLS
Route::get('/skills', function() {
  return App\Skill::all();
});

Route::get('/skill/{id}/projects', function($id) {
  return App\Skill::find($id)->projects;
});

Route::get('/skill/{id}/users', function($id) {
  return App\Skill::find($id)->users;
});

// PROJECTS
Route::get('/projects', function() {
  return App\Project::all();
});

Route::get('/project/{id}/skills', function($id) {
  return App\Project::find($id)->skill;
});

Route::get('/project/{id}/users', function($id) {
  return App\Project::find($id)->users;
});
