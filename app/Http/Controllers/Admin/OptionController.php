<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
  // general settings
  public function allOptions()
  {
    $options = config('constants.options');

    return view('admin.pages.options.index', compact('options'));
  }

  public function update(Request $request, Option $option)
  {
    $option->update($request->all());

    $request->session()->flash('success', __('auth.save_data'));

    if ($option->slug == 'age') return redirect()->route('settings.agelimit');
    if ($option->slug == 'thx') return redirect()->route('settings.thanks');
  }

  // thanks settings
  public function thanks()
  {
    $option = Option::where('slug', 'thx')->first();

    return view('admin.pages.options.form', compact('option'));
  }

  // age settings
  public function ageLimit()
  {
    $option = Option::where('slug', 'age')->first();

    return view('admin.pages.options.form', compact('option'));
  }
}
