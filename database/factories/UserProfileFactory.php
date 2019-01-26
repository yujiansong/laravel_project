<?php

use Faker\Generator as Faker;

$factory->define(App\UserProfile::class, function (Faker $faker) {
    return [
        'user_id' => mt_rand(119, 131),
        'bio' => $faker->text(),
        'city' => $faker->city,
        'hobby' => json_encode([
            'company' => $faker->company,
            'address' => $faker->address,
            'phonenumber' => $faker->phoneNumber,
        ]),
    ];
});
