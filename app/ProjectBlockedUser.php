<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectBlockedUser extends Model
{
    protected $table = 'project_blocked_users';

    protected $fillable = [
      'project_id', 'blocked_id',
    ];
}
