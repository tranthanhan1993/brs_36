<?php

use Carbon\Carbon;
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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->email,
        'name' => $faker->name,
        'password' => $faker->password,
        'image' => 'default.jpg',
        'gender' => $faker->numberBetween(0, 1),
        'role' => 0,
        'birthday' => Carbon::createFromFormat('Y-m-d', $faker->date($format = 'Y-m-d', $max = 'now')),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});

$factory->define(App\Models\Author::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Review::class, function (Faker\Generator $faker) {
    static $userIds;
    static $bookIds;
    
    return [
        'content' => $faker->paragraph(2),
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'book_id' => $faker->randomElement($bookIds ?: $bookIds = App\Models\Book::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    static $userIds;
    static $reviewIds;

    return [
        'content' => $faker->paragraph(1),
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'review_id' => $faker->randomElement($reviewIds ?: $reviewIds = App\Models\Review::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Rate::class, function (Faker\Generator $faker) {
    static $userIds;
    static $bookIds;

    return [
        'point' => rand(0, 5),
        'user_id' => $faker->randomElement($userIds ?: $userIds = App\Models\User::pluck('id')->toArray()),
        'book_id' => $faker->randomElement($bookIds ?: $bookIds = App\Models\Book::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    static $authorIds;
    static $categoryIds;

    return [
        'author_id' => $faker->randomElement($authorIds ?: $authorIds = App\Models\Author::pluck('id')->toArray()),
        'category_id' => $faker->randomElement($categoryIds ?: $categoryIds = App\Models\Category::pluck('id')->toArray()),
        'content' => $faker->paragraph,
        'tittle' => $faker->name,
        'num_pages' => $faker->numberBetween(100, 500),
        'public_date' => $faker->date('Y-m-d'),
        'rate_avg' => 1,
        'image' => 'default.jpg'        
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});
