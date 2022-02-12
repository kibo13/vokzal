<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
  public function allOptions()
  {
    return view('admin.pages.options.index');
  }

  public function ageLimit()
  {
    $option = Option::first();

    return view('admin.pages.options.form', compact('option'));
  }

  public function ageLimitUpdate(Request $request, Option $option)
  {
    $option->update($request->all());

    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('settings.agelimit.index');
  }
}