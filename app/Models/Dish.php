<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  use HasFactory;

  protected $fillable = [
    'continent_id',
    'assortment_id',
    'name_ru',
    'name_kk',
    'name_en',
    'desc_ru',
    'desc_en',
    'desc_kk',
    'price',
    'is_active',
    'image',
    'note'
  ];

  public function continent()
  {
    return $this->belongsTo(Continent::class);
  }

  public function assortment()
  {
    return $this->belongsTo(Assortment::class);
  }

  public function orders()
  {
    return $this->belongsToMany(Order::class);
  }

  public function getPriceForCount()
  {
    if (!is_null($this->pivot)) {
      return $this->pivot->count * $this->price;
    }

    return $this->price;
  }
}