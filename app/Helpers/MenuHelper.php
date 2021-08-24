<?php

use Illuminate\Support\Facades\DB;

function getMenu()
{
  // continents
  $continents = DB::table('continents')
    ->select(
      'continents.id',
      'continents.name_ru',
      'continents.name_kk',
      'continents.name_en',
      'continents.image'
    )
    ->get();

  // bar
  $bar = DB::table('categories')
    ->select(
      'categories.id',
      'categories.name_ru',
      'categories.name_kk',
      'categories.name_en',
      'categories.image'
    )
    ->where('categories.slug', config('constants.slug.bars'))
    ->get();

  // menu
  $menu = $continents->merge($bar);

  return $menu->sortBy('id');;
}