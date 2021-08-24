<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
  // features.index
  public function index()
  {
    // features
    $features = Feature::get();

    return view('admin.pages.features.index', compact('features'));
  }

  // features.create
  public function create()
  {
    return view('admin.pages.features.form');
  }

  // features.store
  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('features');
    }

    Feature::create($params);

    return redirect()->route('children.features.index');
  }

  // features.edit
  public function edit(Feature $feature)
  {
    return view('admin.pages.features.form', compact('feature'));
  }

  // features.update
  public function update(Request $request, Feature $feature)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($feature->image);
      $params['image'] = $request->file('image')->store('features');
    }

    $feature->update($params);

    return redirect()->route('children.features.index');
  }

  // features.destroy
  public function destroy(Feature $feature)
  {
    $feature->delete();
    Storage::delete($feature->image);
    return redirect()->route('children.features.index');
  }
}