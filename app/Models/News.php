<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  use HasFactory;

  protected $fillable = [
    'date_public',
    'name_ru',
    'name_kk',
    'name_en',
    'desc_ru',
    'desc_en',
    'desc_kk',
    'image',
    'note'
  ];
}
