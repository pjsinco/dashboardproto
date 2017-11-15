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

$prefixes = [ '1st Lt', 'Adm', 'Atty', 'Brother', 'Capt', 'Chief', 'Cmdr', 
  'Col', 'Dean', 'Dr', 'Elder', 'Father', 'Gen', 'Gov', 'Hon', 'Lt Col', 
  'Maj', 'MSgt', 'Mr', 'Mrs', 'Prince', 'Prof', 'Rabbi', 'Rev', 'Sister' ];

$suffixes = [ 'II', 'III', 'IV', 'CPA', 'DDS', 'Esq', 'JD', 'Jr', 'LLD',
  'MD', 'PhD', 'Ret', 'RN', 'Sr', 'DO' ];

$factory->define(App\User::class, function (Faker $faker) use ($suffixes, $prefixes) {
  static $password;

  $firstName = $faker->firstName;
  $lastName = $faker->lastName;
  $domain = $faker->domainName;
  $status = ['A', 'A', 'I'][mt_rand(0, 2)];
  $safeLastName = preg_replace("/[^A-Za-z0-9 ]/", '', $lastName);

  return [

    'aoa_id' => $faker->unique()->numberBetween(100000, 350000),

    'user_name' => sprintf('%s.%s', 
                           strtolower($firstName), 
                           strtolower($safeLastName)),

    'password' => $password ?: $password = bcrypt('secret'),

    'remember_token' => str_random(10),

    'first_name' => $firstName,
    'middle_name' => $faker->optional()->firstName,
    'last_name' => $lastName,
    'suffix' => $suffixes[array_rand($suffixes)],
    'prefix' => $prefixes[array_rand($prefixes)],
    'designation' => 'DO',

    'email' => sprintf('%s%s@%s', 
                       substr($firstName, 0, 1),
                       $safeLastName,
                       $domain),
    'website' => function() use ($domain) {
      return (mt_rand(0, 1) == 0 ? 'https://www.'. $domain : null);
    },

    'preferred_contact' => ['home', 'business'][mt_rand(0, 1)],

    'status' => $status,

    'paid_thru' => function() use($status) {
      return ($status == 'A' ? '2018-05-31 00:00:00' : null);
    },

    'member_type' => function() {
      return ['DO-M', 'S', 'DO-NM', 'OTHER'][mt_rand(0, 3)];
    },

  ];
});
