<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\TypeHall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HallController extends Controller
{
  // halls.index
  public function index()
  {
    // halls
    $halls = Hall::get();

    return view('admin.pages.halls.index', compact('halls'));
  }

  // halls.create
  public function create()
  {
    // hall types
    $hall_types = TypeHall::get();

    return view('admin.pages.halls.form', compact('hall_types'));
  }

  // halls.store
  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('halls');
    }

    Hall::create($params);

    return redirect()->route('halls.index');
  }

  // halls.edit
  public function edit(Hall $hall)
  {
    // hall types
    $hall_types = TypeHall::get();

    return view('admin.pages.halls.form', compact('hall', 'hall_types'));
  }

  // halls.update
  public function update(Request $request, Hall $hall)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($hall->image);
      $params['image'] = $request->file('image')->store('halls');
    }

    $hall->update($params);

    return redirect()->route('halls.index');
  }

  // halls.destroy
  public function destroy(Hall $hall)
  {
    $hall->delete();
    Storage::delete($hall->image);
    return redirect()->route('halls.index');
  }
}
