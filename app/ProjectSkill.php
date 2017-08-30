<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSkill extends Model
{
    protected $table = 'projects_skills';

    protected $fillable = [
      'project_id', 'skill_id', 'seniority_level',
    ];
}
