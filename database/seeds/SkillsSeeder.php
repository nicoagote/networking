<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $skills = [
        'C++'         => '#076390',
        'Java'        => '#f99924',
        'Python'      => '#1e415e',
        'JavaScript'  => '#f0da50',
        'PHP'         => '#5f83bb',
        'C#'          => '#662e93',
        'Swift'       => '#f57939',
        'Ruby'        => '#e14e40',
        'HTML'        => '#f16529',
        'CSS'         => '#33a9dc',
        'SQL'         => '#e0e1e3'
      ];

      foreach ($skills as $name => $color) {

        $skill = new Skill;

        $skill->name = $name;

        $skill->color = $color;

        $skill->save();
      }

    }
}
