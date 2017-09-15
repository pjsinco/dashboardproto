<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
  static $password;

  $firstName = $faker->firstName;
  $lastName = $faker->lastName;
  $domain = $faker->domainName;
  $status = ['A', 'A', 'I'][mt_rand(0, 2)];
  $safeLastName = preg_replace("/[^A-Za-z0-9 ]/", '', $lastName);

  return [
    'name' => sprintf('%s.%s', 
                      strtolower($firstName), 
                      strtolower($safeLastName)),
    'password' => $password ?: $password = bcrypt('secret'),
    'remember_token' => str_random(10),

    'first_name' => $firstName,
    'middle_name' => $faker->optional()->firstName,
    'last_name' => $lastName,
    'suffix' => $faker->optional()->suffix,
    'designation' => 'DO',
    'email' => sprintf('%s%s@%s', 
                       substr($firstName, 0, 1),
                       $safeLastName,
                       $domain),
    'website' => function() use ($domain) {
      return (mt_rand(0, 1) == 0 ? 'https://www.'. $domain : null);
    },

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
    
    'aoa_id' => $faker->unique()->numberBetween(100000, 350000),
    'status' => $status,
    'paid_thru' => function() use($status) {
      return ($status == 'A' ? '2018-05-31 00:00:00' : null);
    },
    'member_type' => function() {
      return ['DO-M', 'DO-M', 'DO-NM'][mt_rand(0, 2)];
    },

  ];
});
