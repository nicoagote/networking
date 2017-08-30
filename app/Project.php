<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
      'title', 'creator_id', 'short_description', 'long_description', 'active',
    ];

    public function skills() {
      return $this->belongsToMany('App\ProjectSkill', 'project_skill', 'project_id', 'skill_id');
    }

    public function creator() {
      return $this->belongsTo('App\User', 'creator_id', 'id');
    }

    public function users() {
      return $this->belongsToMany('App\User', 'projects_users', 'project_id', 'user_id');
    }
}
