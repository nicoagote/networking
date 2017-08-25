<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'username', 'email', 'password', 'sex', 'date_of_birth', 'available',
        'country', 'phone', 'git', 'linkedin', 'description', 'curriculum_file_location', 'profile_picture_file_location'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills() {
      return $this->belongsToMany('App\Skill', 'users_skills', 'user_id', 'skill_id');
    }

    public function projects() {
      // return DB::statement('select * from users as u inner join projects as p where u.id = p.creator_id;');
      return $this->hasMany('App\Project', 'creator_id', 'id');
    }
}
