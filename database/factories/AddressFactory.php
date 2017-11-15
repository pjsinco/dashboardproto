<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
  return [
    //'id' => function() {
      //$user = factory(App\User::class)->create();
      //return $user->aoa_id;
    //},
    'aoa_id' => 123456,

    'home_addr_1' => sprintf('%s %s', 
                             $faker->buildingNumber,
                             $faker->streetName),
    'home_addr_2' => $faker->optional()->secondaryAddress,
    'home_city' => $faker->city,
    'home_state' => $faker->stateAbbr,
    'home_zip' => $faker->postcode,
    'home_phone' => $faker->phoneNumber,

    'bus_addr_1' => sprintf('%s %s', 
                             $faker->buildingNumber,
                             $faker->streetName),
    'bus_addr_2' => $faker->optional()->secondaryAddress,
    'bus_city' => $faker->city,
    'bus_state' => $faker->stateAbbr,
    'bus_zip' => $faker->postcode,
    'bus_phone' => $faker->phoneNumber,
  
  ];
});
