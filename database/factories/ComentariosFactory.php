<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentarios;
use Faker\Generator as Faker;

$factory->define(Comentarios::class, function (Faker $faker) {
    return [
        'comentario'=> $faker->word(),
        'persona_id' => $faker->numberBetween(1,7),
        'publicacion_id'=> $faker->numberBetween(1,7),
    ];
});
