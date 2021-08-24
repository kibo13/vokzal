<?php

use App\Models\Gallery;

function getGalleries()
{
  return Gallery::get();
}