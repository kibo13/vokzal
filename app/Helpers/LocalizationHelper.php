<?php

function getArrayLang()
{
  $locales = config('laravellocalization.supportedLocales');
  $langs = [];

  foreach ($locales as $lang => $locale) {
    array_push($langs, $lang);
  }

  return $langs;
}

function getCurrentLang()
{
  return app()->getLocale();
}
