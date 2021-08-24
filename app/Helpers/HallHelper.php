<?php

use App\Models\Hall;

function getChildHalls()
{
  return Hall::where('type_hall_id', 2)->get();
}

function getStudioHalls()
{
  return Hall::where('type_hall_id', 3)->get();
}