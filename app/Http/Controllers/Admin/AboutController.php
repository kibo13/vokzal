<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function main()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.about'));

    // category
    $category = getCategory(config('constants.slug.about'));

    // about
    $about = About::first();

    return view('pages.about', compact('title', 'category', 'about'));
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.about'));

    // category
    $category = getCategory(config('constants.slug.about'));

    // about
    $about = About::first();

    return view('admin.pages.about.index', compact('title', 'category', 'about'));
  }

  public function update(Request $request, About $about)
  {
    $about->update($request->all());

    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('about.index');
  }
}
