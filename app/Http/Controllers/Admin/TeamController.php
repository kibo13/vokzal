<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
  public function main()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.teams'));

    // category
    $category = getCategory(config('constants.slug.teams'));

    // teams
    $teams = Team::get();

    return view('pages.teams', compact('title', 'category', 'teams'));
  }

  public function index()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.teams'));

    // teams
    $teams = Team::get();

    return view('admin.pages.teams.index', compact('title', 'teams'));
  }

  public function create()
  {
    // title
    $title = getCategoryTitle(config('constants.slug.teams'));

    // category
    $category = getCategory(config('constants.slug.teams'));

    // positions
    $positions = Position::get();

    return view('admin.pages.teams.form', compact('title', 'category', 'positions'));
  }

  public function store(Request $request)
  {
    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('teams');
    }

    Team::create($params);

    return redirect()->route('teams.index');
  }

  public function edit(Team $team)
  {
    // title
    $title = getCategoryTitle(config('constants.slug.teams'));

    // positions
    $positions = Position::get();

    return view('admin.pages.teams.form', compact('team', 'title', 'positions'));
  }

  public function update(Request $request, Team $team)
  {

    $params = $request->all();

    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($team->image);
      $params['image'] = $request->file('image')->store('teams');
    }

    $team->update($params);

    return redirect()->route('teams.index');
  }

  public function destroy(Team $team)
  {
    $team->delete();
    Storage::delete($team->image);
    return redirect()->route('teams.index');
  }
}