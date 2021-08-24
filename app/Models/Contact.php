<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  use HasFactory;

  protected $fillable = [
    'category_id',
    'desc_ru',
    'desc_kk',
    'desc_en',
    'name_ru',
    'name_kk',
    'name_en',
    'address_ru',
    'address_kk',
    'address_en',
    'adm_phone',
    'ds_phone',
    'phone',
    'email',
    'site',
    'day_from',
    'day_to',
    'time_from',
    'time_to'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}