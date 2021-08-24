<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  use HasFactory;

  protected $fillable = [
    'category_id',
    'desc_ru',
    'desc_en',
    'desc_kk'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}