<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  protected $fillable = ['id', 'name', 'color'];

  public function users() {
    return $this->belongsToMany('App\User', 'users_skills', 'skill_id', 'user_id');
  }

  public function projects() {
    return $this->belongsToMany('App\Project', 'projects_skills', 'skill_id', 'project_id');
  }
}
