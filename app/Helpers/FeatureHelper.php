<?php

use App\Models\Feature;

function getFeatures()
{
  return Feature::get();
}