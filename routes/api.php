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

//Route::get('/v1/users/{user}', 'UsersController@show')->middleware('auth:api');
Route::get('/v1/users/{user}', 'UsersController@show');

Route::post('/v1/users/{user}', 'UsersController@update');

Route::get('/v1/users/{id}/cme', function($id) {

  $data = [
    [
      "aoa_id" => "269803", // 0
      "general" => [
        "earned" => 17.0,
        "cat1aEarned" => 2.5
      ],
      "primaries" => [
        [
          "desc" => "Pediatrics",
          "earned" => 5.5,
          "required" => 50.0,
          "generalRequired" => 120.0,
          "cat1aRequired" => 0.0,
        ]
      ]
    ],
    [
      "aoa_id" => "269804", // 1
      "general" => [
        "earned" => 17.0,
        "cat1aEarned" => 2.5
      ],
      "primaries" => [
        [
          "desc" => "Pediatrics",
          "earned" => 5.5,
          "required" => 50.0,
          "generalRequired" => 120.0,
          "cat1aRequired" => 0.0,
          "subs" => [
            [
              "desc" => "Pediatric Neurology",
              "earned" => 1.5,
              "required" => 13.0
            ]
          ]
        ],
      ]
    ],
    [
      "aoa_id" => "269805", // 2
      "general" => [
        "earned" => 97.0,
        "cat1aEarned" => 22.5
      ],
      "primaries" => [
        [
          "desc" => "Pediatrics",
          "earned" => 65.5,
          "required" => 50.0,
          "generalRequired" => 120.0,
          "cat1aRequired" => 0.0,
          "subs" => [
            [
              "desc" => "Pediatric Neurology",
              "earned" => 11.5,
              "required" => 13.0
            ]
          ]
        ],
        [
          "desc" => "Family Medicine",
          "earned" => 23.0,
          "required" => 30.0,
          "generalRequired" => 150.0,
          "cat1aRequired" => 30.0,
          "subs" => []
        ]
      ]
    ],
    [
      "aoa_id" => "269806", // 3
      "general" => [
        "earned" => 52.5,
        "cat1aEarned" => 14.0
      ],
      "primaries" => [],
    ],
    [
      "aoa_id" => "269807", // 4
      "general" => [
        "earned" => 92.0,
        "cat1aEarned" => 22.5
      ],
      "primaries" => [
        [
          "desc" => "Family Medicine",
          "earned" => 73.5,
          "required" => 30.0,
          "generalRequired" => 150.0,
          "cat1aRequired" => 30.0,
          "subs" => []
        ]
      ]
    ],
    [
      "aoa_id" => "269808", // 5
      "general" => [
        "earned" => 63.0,
        "cat1aEarned" => 12.5
      ],
      "primaries" => [
        [
          "desc" => "Internal Medicine",
          "earned" => 42.0,
          "required" => 30.0,
          "generalRequired" => 120.0,
          "cat1aRequired" => 0.0,
          "subs" => [
            "desc" => "Interventional Cardiology",
            "earned" => 11.5,
            "required" => 15.0
          ]
        ]
      ]
    ],
    [
      "aoa_id" => "269809", // 6
      "general" => [
        "earned" => 123.0,
        "cat1aEarned" => 23.5
      ],
      "primaries" => [
        [
          "desc" => "Internal Medicine",
          "earned" => 22.0,
          "required" => 30.0,
          "generalRequired" => 120.0,
          "cat1aRequired" => 0.0,
          "subs" => []
        ]
      ]
    ],
    [
      "aoa_id" => "269810", // 7
      "general" => [
        "earned" => 67.0,
        "cat1aEarned" => 26.0
      ],
      "primaries" => [
        [
          "desc" => "Pediatrics",
          "earned" => 25.5,
          "required" => 50.0,
          "generalRequired" => 96.0,
          "cat1aRequired" => 0.0,
          "subs" => [
            [
              "desc" => "Pediatric Neurology",
              "earned" => 1.5,
              "required" => 13.0
            ]
          ]
        ],
        [
          "desc" => "Family Medicine",
          "earned" => 3.0,
          "required" => 30.0,
          "generalRequired" => 150.0,
          "cat1aRequired" => 30.0,
          "subs" => []
        ]
      ]
    ]
  ];


  return response()->json($data[$id % count($data)]);

});
