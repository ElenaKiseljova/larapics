<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSettingsRequest;

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

  public function update(UpdateSettingsRequest $request)
  {
    dd($request->all());

    // return view('settings', ['user' => auth()->user()]);
  }
}
