<?php

use App\Models\Continent;
use App\Models\Dish;

function getContinents()
{
  return Continent::get();
}