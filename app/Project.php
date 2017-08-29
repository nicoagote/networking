<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
      'title', 'creator_id', 'short_description', 'long_description', 'active',
    ];

    public function blockedUsers() {
      return $this->hasMany('App\User', 'project_blocked_users', 'project_id', 'blocked_user_id');
    }

    public function projectUsers() {
      return $this->hasMany('App\User', 'project_users', 'project_id', 'user_id');
    }

    public function projectUserRequests() {
      return $this->hasMany('App\User', 'project_user_requests', 'project_id', 'issuer_id');
    }

    public function skills() {
      return $this->belongsToMany('App\ProjectSkill', 'project_skill', 'project_id', 'skill_id');
    }

    public function user() {
      return $this->belongsTo('App\User', 'creator_id', 'id');
    }
}
