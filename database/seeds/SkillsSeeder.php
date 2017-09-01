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
        'C#'          => '#662e93',
        'C++'         => '#076390',
        'CSS'         => '#33a9dc',
        'HTML'        => '#f16529',
        'Java'        => '#f99924',
        'JavaScript'  => '#f0da50',
        'PHP'         => '#5f83bb',
        'Python'      => '#1e415e',
        'Ruby'        => '#e14e40',
        'SQL'         => '#e0e1e3',
        'Swift'       => '#f57939'
      ];

      foreach ($skills as $name => $color) {

        $skill = new Skill;

        $skill->name = $name;

        $skill->color = $color;

        $skill->save();
      }

    }
}
