<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
  use HasFactory;

  protected $fillable = [
    'category_id',
    'desc_ru',
    'desc_en',
    'desc_kk',
    'note_ru',
    'note_en',
    'note_kk',
    'tip_ru',
    'tip_en',
    'tip_kk',
    'image',
    'note'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}