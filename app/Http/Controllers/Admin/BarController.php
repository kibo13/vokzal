<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarController extends Controller
{
  public function main()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.bars'));

    // category
    $category = getCategory(config('constants.slug.bars'));

    // flag
    $isBar = true;

    // bars
    $bars = Bar::get();

    return view('pages.bars', compact('title', 'category', 'isBar', 'bars'));
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.bars'));

    // bars
    $bars = Bar::get();

    return view('admin.pages.bars.index', compact('title', 'bars'));
  }

  public function create()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.bars'));

    // category
    $category = getCategory(config('constants.slug.bars'));

    return view('admin.pages.bars.form', compact('title', 'category'));
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('bars');
    }

    Bar::create($params);

    return redirect()->route('bars.index');
  }

  public function edit(Bar $bar)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.bars'));

    return view('admin.pages.bars.form', compact('bar', 'title'));
  }

  public function update(Request $request, Bar $bar)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($bar->image);
      $params['image'] = $request->file('image')->store('bars');
    }

    $bar->update($params);

    return redirect()->route('bars.index');
  }

  public function destroy(Bar $bar)
  {
    $bar->delete();
    Storage::delete($bar->image);
    return redirect()->route('bars.index');
  }
}