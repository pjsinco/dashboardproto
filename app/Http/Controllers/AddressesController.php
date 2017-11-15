<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressesController extends Controller
{
  public function show($id) 
  {
    return \App\Address::findOrFail($id);
  }
}
