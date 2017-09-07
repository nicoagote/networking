<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

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
      return $this->hasMany('App\Project', 'creator_id', 'id');
    }

    public function skills() {
      return $this->belongsToMany('App\Skill', 'users_skills', 'user_id', 'skill_id');
    }

    public function reviews() {
      return $this->hasMany('App\UserReview', 'user_id', 'id');
    }

    public function endorsed(Skill $skill) {
      return $this->belongsToMany('App\User', 'endorse_skills', 'user_id', 'endorser_id')->where('skill_id', '=', $skill->id)->get();
    }

    public function curriculumDownloadLink() {
      $dotPosition = strpos($this->curriculum_file_location, '.');
      $extension = substr($this->curriculum_file_location, $dotPosition + 1, strlen($this->curriculum_file_location) + 1 - $dotPosition);
      echo '/download/curriculum' . $this->id . '.' . $extension;
    }

    public function getProfilePictureLocation() {
      if ($this->profile_picture_file_location == null) {
        $url = "storage/profile_pictures/default_profile_picture.jpg";
      } else {
        $url = "storage/" . $this->profile_picture_file_location;
      }
      return "$url";
    }

    public function getAltOfImage() {
      return "Imagen de perfil de " . $this->name . ' ' . $this->surname;
    }

    public function getProfilePicture($width, $height) {
      echo '<img src="' . $this->getProfilePictureLocation() . '" alt="' .  $this->getAltOfImage() . '" width=" ' . $width . '" height="' . $height . '" class="image-responsive img-circle ">';
    }
}
