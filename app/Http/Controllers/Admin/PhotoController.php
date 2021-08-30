<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Vip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.vips'));

    // photos
    $photos = Photo::get();

    return view('admin.pages.photos.index', compact('title', 'photos'));
  }

  public function create()
  {
    // vips
    $vips = Vip::get();

    return view('admin.pages.photos.form', compact('vips'));
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('photos');
    }

    Photo::create($params);

    return redirect()->route('vips.photos.index');
  }

  public function edit(Photo $photo)
  {
    // vips
    $vips = Vip::get();

    return view('admin.pages.photos.form', compact('photo', 'vips'));
  }

  public function update(Request $request, Photo $photo)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($photo->image);
      $params['image'] = $request->file('image')->store('photos');
    }

    $photo->update($params);

    return redirect()->route('vips.photos.index');
  }

  public function destroy(Photo $photo)
  {
    $photo->delete();
    Storage::delete($photo->image);
    return redirect()->route('vips.photos.index');
  }
}