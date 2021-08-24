<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
  // categories.index
  public function index()
  {
    // categories
    $categories = Category::get();

    return view('admin.pages.categories.index', compact('categories'));
  }

  // categories.create
  public function create()
  {
    return view('admin.pages.categories.form');
  }

  // categories.store
  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('categories');
    }

    Category::create($params);

    return redirect()->route('categories.index');
  }

  // categories.edit
  public function edit(Category $category)
  {
    return view('admin.pages.categories.form', compact('category'));
  }

  // categories.update
  public function update(Request $request, Category $category)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($category->image);
      $params['image'] = $request->file('image')->store('categories');
    }

    $category->update($params);

    return redirect()->route('categories.index');
  }

  // categories.destroy
  public function destroy(Category $category)
  {
    $category->delete();
    Storage::delete($category->image);
    return redirect()->route('categories.index');
  }
}