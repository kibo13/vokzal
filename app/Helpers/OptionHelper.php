<?php

use App\Models\Option;

function getMessage()
{
  // flag
  $isRecord = Option::count();

  // output
  $output = '';

  // table isn't empty
  if ($isRecord) {
    // record
    $record = Option::first();

    switch (getCurrentLang()) {
      case 'ru':
        $output = $record->desc_ru;
        break;
      case 'en':
        $output = $record->desc_en;
        break;
      case 'kk':
        $output = $record->desc_kk;
        break;
    }

    return $output;
  }
  // table is empty
  else {
    echo '<div class="bk-loader"></div>';
    return;
  }
}