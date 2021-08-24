<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeHall extends Model
{
  use HasFactory;

  protected $fillable = [
    'name_ru',
    'name_kk',
    'name_en'
  ];

  public function halls()
  {
    return $this->hasMany(Hall::class);
  }
}
