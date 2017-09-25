<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::get('/v1/users/{user}', 'UsersController@show');

Route::post('/v1/users/{user}', 'UsersController@update');

// TODO fix
// For now, return the same json every time
Route::get('/v1/users/{user}/cme', function() {

  $data = [
    "aoa_id" =>  "269802",
    "general" =>  [
      "earned" =>  67.0,
      "cat1aEarned" =>  26.0
    ],
    "primaries" =>  [
      [
        "desc" =>  "Radiology",
        "earned" =>  25.5,
        "required" =>  50.0,
        "generalRequired" =>  96.0,
        "cat1aRequired" =>  0.0,
        "subs" =>  [
          [
            "desc" =>  "Radiation Therapy",
            "earned" =>  1.5,
            "required" =>  13.0
          ]
        ]
      ],
      [
        "desc" =>  "Family Medicine",
        "earned" =>  23.0,
        "required" =>  30.0,
        "generalRequired" =>  150.0,
        "cat1aRequired" =>  30.0,
        "subs" =>  []
      ]
    ]
  ];

  return response()->json($data);

});
