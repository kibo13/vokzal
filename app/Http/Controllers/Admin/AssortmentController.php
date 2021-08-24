<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assortment;
use Illuminate\Http\Request;

class AssortmentController extends Controller
{
  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    // assortments
    $assortments = Assortment::get();

    return view('admin.pages.assortments.index', compact('title', 'assortments'));
  }

  public function create()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    return view('admin.pages.assortments.form', compact('title'));
  }

  public function store(Request $request)
  {
    Assortment::create($request->all());
    return redirect()->route('continents.assortments.index');
  }

  public function edit(Assortment $assortment)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.continents'));

    return view('admin.pages.assortments.form', compact('title', 'assortment'));
  }

  public function update(Request $request, Assortment $assortment)
  {
    $assortment->update($request->all());
    return redirect()->route('continents.assortments.index');
  }

  public function destroy(Assortment $assortment)
  {
    $assortment->delete();
    return redirect()->route('continents.assortments.index');
  }
}