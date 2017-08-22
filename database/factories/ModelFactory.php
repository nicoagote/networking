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
        'profile_picture_file_location' => NULL #!!! randomize
    ];
});

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
