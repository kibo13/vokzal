<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assortment extends Model
{
  use HasFactory;

  protected $fillable = [
    'name_ru',
    'name_kk',
    'name_en'
  ];

  public function dishes()
  {
    return $this->hasMany(Dish::class);
  }

  public function continents()
  {
    return $this->belongsToMany(Continent::class);
  }
}
