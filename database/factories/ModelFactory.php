<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*
MODELO DE FACTORY
$factory->define(App\ClassName::class, function (Faker\Generator $faker) {
    return [
      'key' => 'value',
      ];
});
*/
// --------------------------- User Factory ----------------------------- //
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $genders = array(
      'Male',
      'Female',
    );
    $key = array_rand($genders);
    $gender = $genders[$key];
    $sex = $gender == 'Male' ? 'm' : 'f';
    $available = $faker->boolean ? 'Y' : 'N';
    $username = $faker->userName();

    $default_profile_picture = 'default_profile_picture.jpg';

    return [
        'name' => $faker->firstName($gender),
        'surname' => $faker->lastName(),
        'username' => $username,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('12345678'),
        'remember_token' => str_random(10),
        'sex' => $sex,
        'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'available' => $available,
        'country' => NULL, #!!! randomize
        'phone' => $faker->phoneNumber,
        'git' => 'https://github.com/' . $username,
        'linkedin' => 'https://linkedin.com/' . $username,
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', #!!! randomize
        'curriculum_file_location' => NULL, #!!! randomize
        'profile_picture_file_location' => "/profile_pictures/" . $default_profile_picture,
    ];
});
// --------------------------- UserSkill Factory ----------------------------- //
$factory->define(App\UserSkills::class, function (Faker\Generator $faker, $user_id) {
    $seniority_levels = ['trainee', 'junior', 'semi_senior', 'senior'];
    $key = array_rand($seniority_levels);
    $seniority_level = $seniority_levels[$key];
    // $skills = App\Skill::all();
    $skills = DB::select(
      'SELECT *
      FROM skills
      WHERE id NOT IN (SELECT skill_id
      FROM users_skills
      WHERE user_id = ' . $user_id['user_id'] . ');'
    );
    $skills = collect($skills);
    $randSkills = $skills->shuffle();
    $skill = $randSkills->first();
    return [
      'user_id' => $user_id,
      'skill_id' => $skill->id,
      'seniority_level' => $seniority_level,
    ];
});
// --------------------------- Project Factory ----------------------------- //
$factory->define(App\Project::class, function (Faker\Generator $faker, $user_id) {
    $activeStates = ['Y', 'N'];
    $key = array_rand($activeStates);
    $active = $activeStates[$key];
    $titleString = $faker->sentence(floor(rand(1, 8)));
    $title = substr($titleString,0 ,strlen($titleString) - 1);
    return [
      'title' => $title,
      'short_description' => $faker->text(140),
      'long_description' => $faker->text(1400),
      'active' => $active,
    ];
});
// ------------------------ ProjectSkills Factory -------------------------- //
$factory->define(App\ProjectSkill::class, function (Faker\Generator $faker, $project_id) {
  $seniority_levels = ['trainee', 'junior', 'semi_senior', 'senior', NULL];
  $key = array_rand($seniority_levels);
  $seniority_level = $seniority_levels[$key];
  $skills = DB::select(
    'SELECT *
    FROM skills
    WHERE id NOT IN (SELECT skill_id
    FROM projects_skills
    WHERE project_id = ' . $project_id['project_id'] . ');'
  );
  // var_dump($skills);
  $skills = collect($skills);
  // var_dump($skills);
  $randSkills = $skills->shuffle();
  // var_dump($randSkills);
  $skill_id = $randSkills->first()->id;
  // var_dump($skill_id);
  return [
    'skill_id' => $skill_id,
    'seniority_level' => $seniority_level,
    ];
});
// ----------------------- ProjectUser Factory ----------------------------- //
$factory->define(App\ProjectUser::class, function (Faker\Generator $faker, $project_id) {
  $users = DB::select(
    'SELECT *
    FROM users
    WHERE id NOT IN (SELECT user_id
    FROM projects_users
    WHERE project_id = ' . $project_id['project_id'] . ');'
  );
  $users = collect($users);
  $randUsers = $users->shuffle();
  $user_id = $randUsers->first()->id;
  $statesBaseArray = [
    #state => percentage ratio,
    'part_of' => 80,
    'request' => 19,
    'blocked' =>  1,
  ];
  $statesArray = [];
  foreach ($statesBaseArray as $state => $distribution) {
    for ($i=0; $i < $distribution; $i++) {
      $statesArray[] = $state;
    }
  }
  $key = array_rand($statesArray);
  $state = $statesArray[$key];
  return [
    'user_id' => $user_id,
    'state' => $state,
    ];
});
// -------------------- UserRelationship Factory --------------------------- //
$factory->define(App\UserRelationship::class, function (Faker\Generator $faker, $relating_user_id) {
  $relatedUsers = DB::select(
    'SELECT *
    FROM users
    WHERE id NOT IN (SELECT related_user_id
    FROM user_relationships
    WHERE relating_user_id = ' . $relating_user_id['relating_user_id'] . ')
    AND id NOT IN (SELECT relating_user_id
    FROM user_relationships
    WHERE related_user_id = ' . $relating_user_id['relating_user_id'] . ')
    AND id != '. $relating_user_id['relating_user_id'] .';'
  );
  $relatedUsers = collect($relatedUsers);
  $randRelatedUsers = $relatedUsers->shuffle();
  $related_user_id = $randRelatedUsers->first()->id;
  $statesBaseArray = [
    #state => percentage ratio,
    'contact' => 80,
    'request' => 19,
    'blocked' =>  1,
  ];
  $statesArray = [];
  foreach ($statesBaseArray as $state => $distribution) {
    for ($i=0; $i < $distribution; $i++) {
      $statesArray[] = $state;
    }
  }
  $key = array_rand($statesArray);
  $state = $statesArray[$key];
  return [
    'related_user_id' => $related_user_id,
    'state' => $state,
    ];
});
// ----------------------- UserReview Factory ------------------------------ //
$factory->define(App\UserReview::class, function (Faker\Generator $faker, $reviewer_id) {
  $projects = App\Project::all();
  $projects = collect($projects);
  $randProject = $projects->shuffle();
  $project_id = $randProject->first()->id;
  $users = DB::select(
      'SELECT *
      FROM users
      WHERE id NOT IN (SELECT user_id
      FROM projects_users
      WHERE project_id = ' . $project_id . ')
      AND id != ' . $reviewer_id['reviewer_id'] . ';'
    );
  $users = collect($users);
  $randUser = $users->shuffle();
  $user_id = $randUser->first()->id;
  $overall = [
    'P', 'N',
  ];
  $key = array_rand($overall);
  $overall = $overall[$key];
  return [
    'user_id' => $user_id,
    'project_id' => $project_id,
    'overall' => $overall,
    'review' => $faker->text(512),
    ];
});
// ---------------------- EndorseSkill Factory ----------------------------- //
$factory->define(App\EndorseSkill::class, function (Faker\Generator $faker, $endorser_id) {
  $users = App\User::find($endorser_id['endorser_id'])->relationships;
  // DB::select(
  //     'SELECT *
  //     FROM users
  //     WHERE id != ' . $endorser_id['endorser_id'] . ';'
  //   );
  // $users = collect($users);
  $randUser = $users->shuffle();
  $user_id = $randUser->first()->id;
  $skills = DB::select(
      'SELECT *
      FROM skills
      WHERE id IN (SELECT skill_id
      FROM users_skills
      WHERE user_id = ' . $user_id . ');'
    );
  $skills = collect($skills);
  $randSkill = $skills->shuffle();
  $skill_id = $randSkill->first()->id;
  return [
    'user_id' => $user_id,
    'skill_id' => $skill_id,
    ];
});
