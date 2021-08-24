<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
  public function assortments(Request $request)
  {
    $assortments = DB::table('continents')
      ->join(
        'assortment_continent',
        'continents.id',
        '=',
        'assortment_continent.continent_id'
      )
      ->join(
        'assortments',
        'assortments.id',
        '=',
        'assortment_continent.assortment_id'
      )
      ->select(
        'continents.id as continent_id',
        'assortments.id as assortment_id',
        'assortments.name_ru',
        'assortments.name_en',
        'assortments.name_kk'
      )
      ->orderBy('continent_id')
      ->orderBy('name_ru')
      ->get();

    return $assortments;
  }
}