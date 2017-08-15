<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkills extends Model
{
    protected $table = 'users_skills';

    protected $fillable = ['user_id', 'skill_id', 'seniority_level'];
}
