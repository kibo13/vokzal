<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  use HasFactory;

  protected $fillable = [
    'vip_id',
    'image',
    'note'
  ];

  public function vip()
  {
    return $this->belongsTo(Vip::class);
  }
}