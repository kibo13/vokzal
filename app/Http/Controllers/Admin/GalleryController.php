<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bar;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.bars'));

    // galleries
    $galleries = Gallery::get();

    return view('admin.pages.galleries.index', compact('title', 'galleries'));
  }

  public function create()
  {
    // bars
    $bars = Bar::get();

    return view('admin.pages.galleries.form', compact('bars'));
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('galleries');
    }

    Gallery::create($params);

    return redirect()->route('bars.galleries.index');
  }

  public function edit(Gallery $gallery)
  {
    // bars
    $bars = Bar::get();

    return view('admin.pages.galleries.form', compact('gallery', 'bars'));
  }

  public function update(Request $request, Gallery $gallery)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($gallery->image);
      $params['image'] = $request->file('image')->store('galleries');
    }

    $gallery->update($params);

    return redirect()->route('bars.galleries.index');
  }

  public function destroy(Gallery $gallery)
  {
    $gallery->delete();
    Storage::delete($gallery->image);
    return redirect()->route('bars.galleries.index');
  }
}