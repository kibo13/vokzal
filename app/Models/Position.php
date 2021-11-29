<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
  use HasFactory;

  protected $fillable = [
    'name_ru',
    'name_kk',
    'name_en'
  ];

  public function teams()
  {
    return $this->belongsTo(Team::class);
  }
}