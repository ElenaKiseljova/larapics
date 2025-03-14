<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth']);
  }

  public function edit()
  {
    return view('settings', ['user' => auth()->user()]);
  }

  public function update(Request $request)
  {
    dd($request->all());

    // return view('settings', ['user' => auth()->user()]);
  }
}
