<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
  // positions.index
  public function index()
  {
    $positions = Position::get();
    return view('admin.pages.positions.index', compact('positions'));
  }

  // positions.create
  public function create()
  {
    return view('admin.pages.positions.form');
  }

  // positions.store
  public function store(Request $request)
  {
    Position::create($request->all());
    return redirect()->route('teams.positions.index');
  }

  // positions.edit
  public function edit(Position $position)
  {
    return view('admin.pages.positions.form', compact('position'));
  }

  // positions.update
  public function update(Request $request, Position $position)
  {
    $position->update($request->all());
    return redirect()->route('teams.positions.index');
  }

  // positions.destroy
  public function destroy(Position $position)
  {
    $position->delete();
    return redirect()->route('teams.positions.index');
  }
}