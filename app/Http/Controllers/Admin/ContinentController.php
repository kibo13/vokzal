<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Models\Assortment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContinentController extends Controller
{
  public function main()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // category
    $category = getCategory(config('constants.slug.continents'));

    // continents
    $continents = Continent::where('id', '!=', 5)->get();

    return view('pages.continents', compact('title', 'category', 'continents'));
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // continents
    $continents = Continent::where('id', '!=', 5)->get();

    return view('admin.pages.continents.index', compact('title', 'continents'));
  }

  public function create()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // category
    $category = getCategory(config('constants.slug.continents'));

    // assortments
    $assortments = Assortment::orderBy('name_ru')->get();

    return view('admin.pages.continents.form', compact('title', 'category', 'assortments'));
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('continents');
    }

    $continent = Continent::create($params);

    if ($request->input('assortments')) :
      $continent->assortments()->attach($request->input('assortments'));
    endif;

    return redirect()->route('continents.index');
  }

  public function edit(Continent $continent)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // assortments
    $assortments = Assortment::orderBy('name_ru')->get();

    return view('admin.pages.continents.form', compact('continent', 'title', 'assortments'));
  }

  public function update(Request $request, Continent $continent)
  {

    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($continent->image);
      $params['image'] = $request->file('image')->store('continents');
    }


    $continent->assortments()->detach();
    if ($request->input('assortments')) :
      $continent->assortments()->attach($request->input('assortments'));
    endif;

    $continent->update($params);

    return redirect()->route('continents.index');
  }

  public function destroy(Continent $continent)
  {
    $continent->assortments()->detach();
    $continent->delete();
    Storage::delete($continent->image);
    return redirect()->route('continents.index');
  }
}