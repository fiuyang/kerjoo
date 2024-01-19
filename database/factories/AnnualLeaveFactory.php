<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\AnnualLeave;
use Faker\Generator as Faker;

$factory->define(AnnualLeave::class, function (Faker $faker) {
    $status = $faker->randomElement(['submitted', 'rejected', 'approved']);
    return [
        'user_id' => factory(User::class)->create()->id,
        'start_date' => $faker->date(),
        'end_date' =>  $faker->date(),
        'approval_date' => $status === 'approved' ? $faker->date() : null,
        'status' => $status,
        'reason' => $faker->realText(100),
    ];
});
