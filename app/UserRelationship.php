<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRelationship extends Model
{
  protected $table = 'user_relationships';

  protected $fillable = ['id', 'relating_user_id', 'related_user_id', 'state'];

}
