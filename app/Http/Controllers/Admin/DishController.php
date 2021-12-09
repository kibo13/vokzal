<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
  public function index($continent)
  {
    return redirect()->back();
  }

  public function create(Continent $continent)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    return view('admin.pages.dishes.form', compact('title', 'continent'));
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('dishes');
    }

    Dish::create($params);

    return redirect()->route('continents.dishes.show', $request->continent_id);
  }

  public function show($continent)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // dishes
    $dishes = Dish::where('continent_id', $continent)->get();

    return view('admin.pages.dishes.index', compact('title', 'continent', 'dishes'));
  }

  public function edit(Dish $dish)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // continent
    $continent = Continent::where('id', $dish->continent_id)->first();

    return view('admin.pages.dishes.form', compact('title', 'continent', 'dish'));
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

    return redirect()->route('continents.dishes.show', $request->continent_id);
  }

  public function is_active(Request $request, Dish $dish)
  {
    $dish->update($request->all());

    return redirect()->route('continents.dishes.show', $request->continent_id);
  }

  public function destroy(Continent $continent, Dish $dish)
  {
    $dish->delete();
    Storage::delete($dish->image);
    return redirect()->back();
  }
}