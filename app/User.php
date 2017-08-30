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

    public function relationships() {
      return  $this->belongsToMany('App\User', 'user_relationships', 'relating_user_id', 'related_user_id')->union($this->belongsToMany('App\User', 'user_relationships', 'related_user_id', 'relating_user_id')->addSelect('users.*')->addSelect('user_relationships.related_user_id')->addSelect('user_relationships.relating_user_id'));
    }

    public function contacts() {
      return $this->belongsToMany('App\User', 'user_relationships', 'relating_user_id', 'related_user_id')->where('state', '=', 'contact')->union($this->belongsToMany('App\User', 'user_relationships', 'related_user_id', 'relating_user_id')->where('state', '=', 'contact')->addSelect('users.*')->addSelect('user_relationships.related_user_id')->addSelect('user_relationships.relating_user_id'));
    }

    public function relatingContacts() {
      return $this->belongsToMany('App\User', 'user_relationships', 'relating_user_id', 'related_user_id')->where('state', '=', 'contact');
    }

    public function relatedContacts() {
      return $this->belongsToMany('App\User', 'user_relationships', 'related_user_id', 'relating_user_id')->where('state', '=', 'contact');
    }

    public function sentRequests() {
      return $this->belongsToMany('App\User', 'user_relationships', 'relating_user_id', 'related_user_id')->where('state', '=', 'request');
    }

    public function pendingRequests() {
      return $this->belongsToMany('App\User', 'user_relationships', 'related_user_id', 'relating_user_id')->where('state', '=', 'request');
    }

    public function blocked() {
      return $this->belongsToMany('App\User', 'user_relationships', 'relating_user_id', 'related_user_id')->where('state', '=', 'blocked');
    }

    public function blockedBy() {
      return $this->belongsToMany('App\User', 'user_relationships', 'related_user_id', 'relating_user_id')->where('state', '=', 'blocked');
    }

    public function projects() {
      // return DB::statement('select * from users as u inner join projects as p where u.id = p.creator_id;');
      return $this->hasMany('App\Project', 'creator_id', 'id');
    }

    public function skills() {
      return $this->belongsToMany('App\Skill', 'users_skills', 'user_id', 'skill_id');
    }

    /* public function reviews() {
      return $this->hasMany('App\User', 'user_reviews', 'user_id', ''); // !!! ver si hay que hacer una clase nueva
    } */

    // public function endorsed(Skill $skill) {
    //   $endorsedSkills = $this->hasMany('App\User', 'endorse_skills', 'user_id', 'endorser_id')->where('skill_id', '=', $skill->id);
    //   dd($endorsedSkills); // !!! ver si funciona
    //   return $this->skills('App\User', '');
    // }

}
