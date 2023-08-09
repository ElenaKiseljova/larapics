<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ImageController extends Controller
{
  public function index()
  {
    $images = Image::latest()->paginate(15); //published()->

    return view('image.index', compact('images'));
  }

  public function show(Image $image)
  {
    return view('image.show', compact('image'));
  }

  public function create(): View
  {
    return view('image.create');
  }

  public function store(ImageRequest $request)
  {
    Image::create($request->getData());

    // return redirect()->route('images.index')->with('message', 'Image has been uploaded successfully');
    return to_route('images.index')->with('message', 'Image has been uploaded successfully');
  }
}
