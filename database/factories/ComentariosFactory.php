<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentarios;
use Faker\Generator as Faker;

$factory->define(Comentarios::class, function (Faker $faker) {
    return [
        'comentario'=> $faker->word(),
        'usuario_id' => $faker->numberBetween(1,20),
        'publicacion_id'=> $faker->numberBetween(1,20),
    ];
});
