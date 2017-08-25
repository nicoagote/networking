<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EndorseSkill extends Model
{
  protected $table = 'endorse_skills';

  protected $fillable = [
    'user_id', 'skill_id', 'endorser_id', 
  ];
}
