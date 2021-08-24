<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
  public function index()
  {
    // news
    $news = News::get();

    return view('admin.pages.news.index', compact('news'));
  }

  public function create()
  {
    return view('admin.pages.news.form');
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('news');
    }

    News::create($params);

    return redirect()->route('news.index');
  }

  public function edit(News $news)
  {
    return view('admin.pages.news.form', compact('news'));
  }

  public function update(Request $request, News $news)
  {

    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($news->image);
      $params['image'] = $request->file('image')->store('news');
    }

    $news->update($params);

    return redirect()->route('news.index');
  }

  public function destroy(News $news)
  {
    $news->delete();
    Storage::delete($news->image);
    return redirect()->route('news.index');
  }
}
