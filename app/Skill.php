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

  public function getLogoLocation() {
    $name = "";
    switch ($this->name) {
      case "C#":
        $name = "CSharp";
        break;
      case "C++":
        $name = "CPlusPlus";
        break;
      default:
        $name = $this->name;
        break;
    }
    return '/logos/logo' . $name . '.png';
  }

  public function getAltOfImage() {
    return 'logo' . $this->name;
  }

  public function getImage() {
    echo '<img src="' . $this->getLogoLocation() . '" alt="' .  $this->getAltOfImage() . '" width="50px" height="50px">';
  }
}
