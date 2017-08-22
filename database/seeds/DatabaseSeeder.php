<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Poner las skills
      $this->call(SkillsSeeder::class);

      // Generar usuarios
      factory(App\User::class, 10)->create()->each(function ($u) {
        // Le asignamos skills al usuario.
        for($i = 0; $i < 3; $i++) {
          $variable = factory(App\UserSkills::class)->create(["user_id" => $u->id]);
        }
        for($i = 0; $i < 2; $i++) {
          $variable = factory(App\Project::class)->create(["creator_id" => $u->id]);
        }
      });
    }
}
