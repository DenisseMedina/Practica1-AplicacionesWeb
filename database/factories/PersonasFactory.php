<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Personas;
use Faker\Generator as Faker;

$factory->define(Personas::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->word(),
        'apellidoPaterno' => $faker->word(),
        'apellidoMaterno'=> $faker->word(),
        'edad'=>$faker->randomNumber(),
        'sexo'=>$faker->randomElement( ['Masculino', 'Femenino']),
        
    ];
});
