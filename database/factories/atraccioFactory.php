<?php

use Faker\Generator as Faker;

$factory->define(App\Atraccion::class, function (Faker $faker) {
    return [
    
    'nom_atraccio'=> $faker->name,
    'tipus_atraccio'=> 1,
    'data_inauguracio'=> $faker->date,
    'altura_min'=> rand (  150 ,  220 ),
    'altura_max'=> rand (  150 ,  220 ),
    'accessibilitat'=> 1,
    'acces_express'=> 1,
    'descripcio'=> $faker->name,
    'votacions'=> $faker->name,
    'path'=> $faker->name
    
    ];
});
