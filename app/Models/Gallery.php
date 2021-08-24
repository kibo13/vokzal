<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  use HasFactory;

  protected $fillable = [
    'bar_id',
    'desc_ru',
    'desc_en',
    'desc_kk',
    'image',
    'note'
  ];

  public function bar()
  {
    return $this->belongsTo(Bar::class);
  }
}
