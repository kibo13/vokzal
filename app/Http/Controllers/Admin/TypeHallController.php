<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeHall;
use Illuminate\Http\Request;

class TypeHallController extends Controller
{
  // hall-types.index
  public function index()
  {
    $hall_types = TypeHall::get();
    return view('admin.pages.hall-types.index', compact('hall_types'));
  }

  // hall-types.create
  public function create()
  {
    return view('admin.pages.hall-types.form');
  }

  // hall-types.store
  public function store(Request $request)
  {
    TypeHall::create($request->all());
    return redirect()->route('hall-types.index');
  }

  // hall-types.edit
  public function edit(TypeHall $hall_type)
  {
    return view('admin.pages.hall-types.form', compact('hall_type'));
  }

  // hall-types.update
  public function update(Request $request, TypeHall $hall_type)
  {
    $hall_type->update($request->all());
    return redirect()->route('hall-types.index');
  }

  // hall-types.destroy
  public function destroy(TypeHall $hall_type)
  {
    $hall_type->delete();
    return redirect()->route('hall-types.index');
  }
}
