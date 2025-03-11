<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

        // $this->authorizeResource(Image::class, 'image');
        $this->authorizeResource(Image::class);
    }

    public function index()
    {
        // $images = request()->user()->images()->latest()->paginate(15)->withQueryString();
        $images = Image::visibleFor(request()->user())->latest()->paginate(15)->withQueryString();

        return view('image.index', compact('images'));
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
        // 1
        // if (!Gate::allows('update-image', $image)) {
        //     abort(403, 'Access denied');
        // }

        // 2
        // Gate::authorize('update-image', $image);

        // 3
        // $this->authorize('update-image', $image);

        // 4
        // $this->authorize('update', $image);

        // 5
        // if (request()->user()->cannot('update', $image)) {
        //     abort(403, 'Access denied');
        // }

        // can()
        // cannot()
        // forUser()
        // any()
        // none()

        return view('image.edit', compact('image'));
    }

    public function update(Image $image, ImageRequest $request)
    {
        // 4
        // $this->authorize('update', $image);

        $image->update($request->getData());

        // return redirect()->route('images.index')->with('message', 'Image has been uploaded successfully');
        return to_route('images.index')->with('message', 'Image has been updated successfully');
    }

    public function destroy(Image $image)
    {
        // 4
        // $this->authorize('delete', $image);

        $image->delete();

        // return redirect()->route('images.index')->with('message', 'Image has been uploaded successfully');
        return to_route('images.index')->with('message', 'Image has been removed successfully');
    }
}
