<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  use HasFactory;

  protected $fillable = [
    'name_ru',
    'name_kk',
    'name_en',
    'margin',
    'is_active',
  ];

  public function orders()
  {
    return $this->hasMany(Order::class);
  }
}
