<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
  protected $table = 'projects_users';

  protected $fillable = ['id', 'project_id', 'user_id', 'state'];
}
