<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // dishes
    $dishes = Dish::get();

    return view('admin.pages.dishes.index', compact('title', 'dishes'));
  }

  public function create()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // continents
    $continents = Continent::get();

    return view('admin.pages.dishes.form', compact('title', 'continents'));
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('dishes');
    }

    Dish::create($params);

    return redirect()->route('continents.dishes.index');
  }

  public function edit(Dish $dish)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // continents
    $continents = Continent::get();

    return view('admin.pages.dishes.form', compact('title', 'continents', 'dish'));
  }

  public function update(Request $request, Dish $dish)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($dish->image);
      $params['image'] = $request->file('image')->store('dishes');
    }

    $dish->update($params);

    return redirect()->route('continents.dishes.index');
  }

  public function destroy(Dish $dish)
  {
    $dish->delete();
    Storage::delete($dish->image);
    return redirect()->route('continents.dishes.index');
  }
}