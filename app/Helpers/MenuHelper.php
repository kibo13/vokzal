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

function getAssortmentsByContinent($id)
{
  $assortments = DB::table('assortments')
    ->join(
      'assortment_continent',
      'assortments.id',
      '=',
      'assortment_continent.assortment_id'
    )
    ->join(
      'continents',
      'continents.id',
      '=',
      'assortment_continent.continent_id'
    )
    ->select(
      'assortments.id',
      'assortments.name_ru as assortment_ru',
      'assortments.name_kk as assortment_kk',
      'assortments.name_en as assortment_en',
      'assortment_continent.row',
      'assortment_continent.continent_id',
      'continents.name_ru as continents_ru',
      'continents.name_kk as continents_kk',
      'continents.name_en as continents_en'
    )
    ->where('assortment_continent.continent_id', $id)
    ->orderBy('row', 'asc')
    ->get();

  return $assortments;
}
