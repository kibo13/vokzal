<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
  public function index()
  {
    $areas = Area::get();

    return view('admin.pages.areas.index', compact('areas'));
  }

  public function create()
  {
    return view('admin.pages.areas.form');
  }

  public function store(Request $request)
  {
    Area::create($request->all());

    return redirect()->route('settings.areas.index');
  }

  public function show(Request $request, Area $area)
  {
    $area->update($request->all());

    return redirect()->route('settings.areas.index');
  }

  public function edit(Area $area)
  {
    return view('admin.pages.areas.form', compact('area'));
  }

  public function update(Request $request, Area $area)
  {
    $area->update($request->all());

    return redirect()->route('settings.areas.index');
  }

  public function destroy(Area $area)
  {
    $area->delete();

    return redirect()->route('settings.areas.index');
  }
}
