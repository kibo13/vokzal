<?php

use App\Models\Bar;

function getBars()
{
  return Bar::get();
}