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
        'HTML' => '#ff0000',
        'CSS' => '#0000ee',
        'PHP' => '#0000ff',
        'JS' => '#ffff00'
      ];

      foreach ($skills as $name => $color) {

        $skill = new Skill;

        $skill->name = $name;

        $skill->color = $color;

        $skill->save();
      }

    }
}
