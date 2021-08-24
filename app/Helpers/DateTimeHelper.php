<?php

use App\Models\Day;

function getDMY($date)
{
  return date('d.m.Y', strtotime($date));
}

function getHI($time)
{
  return date('H:i', strtotime($time));
}

function getDays()
{
  return Day::get();
}

function getDayLocale($num, $type)
{
  // day
  $day = Day::where('id', $num)->first();

  // response
  $response = '';

  // get long names of days
  if ($type === 'long') {
    switch (getCurrentLang()) {
      case 'ru':
        $response = $day->long_ru;
        break;
      case 'en':
        $response = $day->long_en;
        break;
      case 'kk':
        $response = $day->long_kk;
        break;
    }
  }

  // get short names of days
  if ($type === 'short') {
    switch (getCurrentLang()) {
      case 'ru':
        $response = $day->short_ru;
        break;
      case 'en':
        $response = $day->short_en;
        break;
      case 'kk':
        $response = $day->short_kk;
        break;
    }
  }

  return $response;
}
