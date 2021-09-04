<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
  public function index()
  {
    $option = Option::first();

    return view('admin.pages.options.form', compact('option'));
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function show(Option $option)
  {
    //
  }

  public function edit(Option $option)
  {
    //
  }

  public function update(Request $request, Option $option)
  {
    $option->update($request->all());

    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('options.index');
  }

  public function destroy(Option $option)
  {
    //
  }
}