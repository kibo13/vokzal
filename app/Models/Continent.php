<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
  use HasFactory;

  protected $fillable = [
    'category_id',
    'name_ru',
    'name_kk',
    'name_en',
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

  public function dishes()
  {
    return $this->hasMany(Dish::class);
  }

  public function assortments()
  {
    return $this->belongsToMany(Assortment::class);
  }
}