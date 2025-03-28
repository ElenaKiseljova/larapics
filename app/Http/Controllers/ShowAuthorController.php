<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShowAuthorController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request, User $user)
  {
    $user->load('images');
    $images = $user->images()->paginate(2)->withQueryString();

    return view('author-show', compact('user', 'images'));
  }
}
