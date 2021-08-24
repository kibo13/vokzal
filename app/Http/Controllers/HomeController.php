<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
  // home
  public function index()
  {
    // flag
    $isGallery = true;

    // category
    $category = Home::first();

    // continents
    $continents = Continent::where('id', '!=', 5)->get();

    return view('index', compact('isGallery', 'category', 'continents'));
  }

  // admin.home
  public function admin()
  {
    // home
    $home = Home::first();

    return view('admin.index', compact('home'));
  }

  // admin.update
  public function update(Request $request, Home $home)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($home->image);
      $params['image'] = $request->file('image')->store('home');
    }

    $home->update($params);
    $request->session()->flash('success', __('auth.save_data'));
    return redirect()->route('admin.home');
  }

  // locale
  public function changeLocale($locale)
  {
    $availableLocales = getArrayLang();

    if (!in_array($locale, $availableLocales)) {
      $locale = config('app.locale');
    }

    $test = session(['locale' => $locale]);
    App::setlocale($locale);
    return redirect()->back();
  }
}