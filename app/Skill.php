<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  protected $fillable = ['id', 'name', 'color'];

  public function users() {
    return belongsToMany('App\User', 'users_skills', 'skill_id', 'user_id');
  }
}
