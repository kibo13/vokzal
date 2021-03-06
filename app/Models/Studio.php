<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
  use HasFactory;

  protected $fillable = [
    'category_id',
    'intro_ru',
    'intro_kk',
    'intro_en',
    'desc_ru',
    'desc_en',
    'desc_kk',
    'image',
    'note'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}