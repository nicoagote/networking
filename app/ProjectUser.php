<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $table = 'project_users';

    protected $fillable = [
      'project_id', 'user_id',
    ];
}
