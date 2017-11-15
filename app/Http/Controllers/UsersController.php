<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UsersController extends Controller
{

  public function show(User $user)
  {
    return $user;
  }

  public function index()
  {
    return User::all()->pluck('aoa_id');
  }

  public function update(User $user, Request $request)
  {

    /**
     * For email rule, see:
     * https://laracasts.com/discuss/channels/requests/ 
     *         laravel-5-validation-request-how-to-
     *         handle-validation-on-update
     */
    $this->validate($request, [
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required|unique:users,email,' . $user->id,
    ]);

    $updated =  $user->update($request->input()); 

    return $updated ? $request->input() : false;
  }
}
