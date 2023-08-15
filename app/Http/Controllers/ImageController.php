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
    $images = Image::published()->latest()->paginate(15);

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

  public function edit(Image $image): View
  {
    return view('image.edit', compact('image'));
  }

  public function update(Image $image, ImageRequest $request)
  {
    $image->update($request->getData());

    // return redirect()->route('images.index')->with('message', 'Image has been uploaded successfully');
    return to_route('images.index')->with('message', 'Image has been updated successfully');
  }

  public function destroy(Image $image)
  {
    $image->delete();

    // return redirect()->route('images.index')->with('message', 'Image has been uploaded successfully');
    return to_route('images.index')->with('message', 'Image has been removed successfully');
  }
}
