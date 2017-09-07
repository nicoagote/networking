<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $fillable = [
      'title', 'creator_id', 'short_description', 'long_description', 'active',
    ];

    public function skills() {
      return $this->belongsToMany('App\Skill', 'projects_skills', 'project_id', 'skill_id');
    }

    public function creator() {
      return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    public function users() {
      return $this->belongsToMany('App\User', 'projects_users', 'project_id', 'user_id')->where('state', '=', 'part_of');
    }

    public function requests() {
      return $this->belongsToMany('App\User', 'projects_users', 'project_id', 'user_id')->where('state', '=', 'request');
    }

    public function blocked() {
      return $this->belongsToMany('App\User', 'projects_users', 'project_id', 'user_id')->where('state', '=', 'blocked');
    }

}
