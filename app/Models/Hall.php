<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
  use HasFactory;

  protected $fillable = [
    'type_hall_id',
    'name_ru',
    'name_kk',
    'name_en',
    'desc_ru',
    'desc_en',
    'desc_kk',
    'image',
    'note',
  ];

  public function type_hall()
  {
    return $this->belongsTo(TypeHall::class);
  }
}
