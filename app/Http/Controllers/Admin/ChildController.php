<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Child;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChildController extends Controller
{
  public function main()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.children'));

    // category
    $category = getCategory(config('constants.slug.children'));

    // child
    $child = Child::first();

    return view('pages.children', compact('title', 'category', 'child'));
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.children'));

    // category
    $category = getCategory(config('constants.slug.children'));

    // child
    $child = Child::first();

    return view('admin.pages.children.index', compact('title', 'category', 'child'));
  }

  public function update(Request $request, Child $child)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($child->image);
      $params['image'] = $request->file('image')->store('children');
    }

    $child->update($params);
    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('children.index');
  }
}