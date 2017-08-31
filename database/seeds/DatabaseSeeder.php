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
          for ($projectSkills=0; $projectSkills < 3; $projectSkills++) {
            factory(App\ProjectSkill::class)->create(["project_id" => $project->id]);
          }
          for ($projectUsers=0; $projectUsers < 3; $projectUsers++) {
            factory(App\ProjectUser::class)->create(["project_id" => $project->id]);
          }
        }
      });

      $users = App\User::all();
      $users->each(function($u) {
        for ($userRelationships=0; $userRelationships < 2; $userRelationships++) {
          factory(App\UserRelationship::class)->create(['relating_user_id' => $u->id]);
        }

        for ($endorseSkills = 0; $endorseSkills < 2; $endorseSkills++) {
          factory(App\EndorseSkill::class)->create(['endorser_id' => $u->id]);
        }

        for ($userReviews = 0; $userReviews < 2; $userReviews++) {
          factory(App\UserReview::class)->create(['reviewer_id' => $u->id]);
        }
      });

    }
}
