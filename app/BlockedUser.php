<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockedUser extends Model
{
    protected $table = 'blocked_users';
    
    protected $fillable = [
      'user_id', 'blocked_user_id',
    ];
}
