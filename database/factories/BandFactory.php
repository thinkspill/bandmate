<?php

$factory->define(App\Band::class, function (Faker\Generator $faker) {
    $generator = new \Nubs\RandomNameGenerator\All(
        [
            new \Nubs\RandomNameGenerator\Vgng(),
        ]
    );
    $name = $generator->getName();

    return [
        'name'         => $name,
        'start_date'   => $faker->date(),
        'website'      => 'http://'.$faker->domainName,
        'slug'         => str_slug($name),
        'still_active' => $faker->randomElement(['yes', 'no']),
    ];
});
