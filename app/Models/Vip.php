<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vip extends Model
{
  use HasFactory;

  protected $fillable = [
    'name_ru',
    'name_kk',
    'name_en',
    'desc_ru',
    'desc_kk',
    'desc_en',
    'image',
    'note'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}