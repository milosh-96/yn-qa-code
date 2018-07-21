<?php

use Faker\Generator as Faker;
use App\User;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Question::class, function (Faker $faker) {
    $title = $faker->sentence;
    $slug_title = &$title;
    $hash = substr(md5($slug_title . '-'. date("Y-m-d H:i:s")),0,8);
    $slug = str_slug($slug_title);
    return [
        'title' => $title,
        'hash'=>$hash,
        'slug'=>$slug,
        'question_text' => $faker->paragraph,
        'answer1' => $faker->word,
        'answer2' => $faker->word,
        'user_id' => User::all()->random()->id,
        'ip_address' => $faker->ipv4,
        'discussion_enabled'=>rand(0,1),
        'answers_enabled'=>rand(0,1),
        'likes_count'=>rand(0,99999),
        'dislikes_count'=>rand(0,99999)
    ];
});
