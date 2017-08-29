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
        for($userSkills = 0; $userSkills < 3; $userSkills++) {
          $userSkill = factory(App\UserSkills::class)->create(["user_id" => $u->id]);
        }
        for($userProjects = 0; $userProjects < 2; $userProjects++) {
          $userProject = factory(App\Project::class)->create(["creator_id" => $u->id]);
          $project = App\Project::all()->last();
          dump($userProject, $project);
          for ($projectSkills=0; $projectSkills < 3; $projectSkills++) {
            factory(App\ProjectSkill::class)->create(["project_id" => $project->id]);
          }
        }
      });
    }
}
