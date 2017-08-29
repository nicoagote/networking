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
        'C++'   => '#076390',
        'JAVA'  => '#f99924',
        'PY'    => '#1e415e',
        'JS'    => '#f0da50',
        'PHP'   => '#5f83bb',
        'C#'    => '#662e93',
        'SWIFT' => '#f57939',
        'RUBY'  => '#e14e40',
        'HTML'  => '#f16529',
        'CSS'   => '#33a9dc',
        'SQL'   => '#e0e1e3'
      ];

      foreach ($skills as $name => $color) {

        $skill = new Skill;

        $skill->name = $name;

        $skill->color = $color;

        $skill->save();
      }

    }
}
