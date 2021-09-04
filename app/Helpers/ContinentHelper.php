<?php

use App\Models\Continent;

function getContinents()
{
  return Continent::get();
}