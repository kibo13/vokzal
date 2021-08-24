<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Studio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudioController extends Controller
{
  public function main()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.studios'));

    // category
    $category = getCategory(config('constants.slug.studios'));

    // studio
    $studio = Studio::first();

    return view('pages.studios', compact('title', 'category', 'studio'));
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.studios'));

    // category
    $category = getCategory(config('constants.slug.studios'));

    // studio
    $studio = Studio::first();

    return view('admin.pages.studios.index', compact('title', 'category', 'studio'));
  }

  public function update(Request $request, Studio $studio)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($studio->image);
      $params['image'] = $request->file('image')->store('studios');
    }

    $studio->update($params);
    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('studios.index');
  }
}