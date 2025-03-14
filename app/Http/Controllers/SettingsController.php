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

    $request->user()->updateSettings($request->getData());

    return back()->with('message', 'Your changes have been saved');
  }
}
