<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUserRequest extends Model
{
    protected $table = 'project_users_requests';

    protected $fillable = [
      'project_id', 'issuer_id',
    ];
}
