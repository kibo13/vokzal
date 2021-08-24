<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VipController extends Controller
{
  public function main()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.vips'));

    // category
    $category = getCategory(config('constants.slug.vips'));

    // vips
    $vips = Vip::get();

    return view('pages.vips', compact('title', 'category', 'vips'));
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.vips'));

    // vips
    $vips = Vip::get();

    return view('admin.pages.vips.index', compact('title', 'vips'));
  }

  public function create()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.vips'));

    // category
    $category = getCategory(config('constants.slug.vips'));

    return view('admin.pages.vips.form', compact('title', 'category'));
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('vips');
    }

    Vip::create($params);

    return redirect()->route('vips.index');
  }

  public function edit(Vip $vip)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.vips'));

    return view('admin.pages.vips.form', compact('vip', 'title'));
  }

  public function update(Request $request, Vip $vip)
  {

    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($vip->image);
      $params['image'] = $request->file('image')->store('vips');
    }

    $vip->update($params);

    return redirect()->route('vips.index');
  }

  public function destroy(Vip $vip)
  {
    $vip->delete();
    Storage::delete($vip->image);
    return redirect()->route('vips.index');
  }
}
