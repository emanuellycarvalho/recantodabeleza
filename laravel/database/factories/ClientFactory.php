<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ModelClient;
use Faker\Generator as Faker;

$factory->define(ModelClient::class, function (Faker $faker) {
    return [
        'nmCliente' => $faker->name,
        'telefone' => '(XX) XXXXX-XXXX',
        'email' => $faker->unique()->safeEmail,
        'senha' => '123456', // password
    ];
});
