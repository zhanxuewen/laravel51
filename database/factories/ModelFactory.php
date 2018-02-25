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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'avatar' => $faker->imageUrl(256,256),
        'confirm_code'=> str_random(48),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Discussion::class, function (Faker\Generator $faker) {
    $user_ids = \App\User::lists('id')->toArray();
    // 5.3  废弃 lists $user_ids = \App\User::pluck('id')->toArray();
    // 5.4  $user_ids = \App\User::pluck('id')->toArray();
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => $faker->randomElement($user_ids),
        'last_user_id' => $faker->randomElement($user_ids),
//      randomElements 是两个方法,

    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $user_ids = \App\User::lists('id')->toArray();
    $discussion_ids = \App\Discussion::lists('id')->toArray();
    return [
        'body' => $faker->paragraph,
        'user_id' => $faker->randomElement($user_ids),
        'discussion_id' => $faker->randomElement($discussion_ids),
    ];
});


$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $user_ids = \App\User::lists('id')->toArray();
    // 5.3  废弃 lists $user_ids = \App\User::pluck('id')->toArray();
    // 5.4  $user_ids = \App\User::pluck('id')->toArray();
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'intro' => $faker->paragraph,
        'user_id' => $faker->randomElement($user_ids),
        'published_at' => $faker->date(),
//        'published_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});