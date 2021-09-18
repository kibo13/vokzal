<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'code',
    'date_in',
    'time_in',
    'status',
    'step',
    'first_name',
    'last_name',
    'phone',
    'city',
    'street',
    'dom',
    'corp',
    'flat',
    'pay',
    'total',
    'check'
  ];

  public function dishes()
  {
    return $this->belongsToMany(Dish::class)->withPivot('count')->withTimestamps();
  }

  public function getFullPrice()
  {
    $sum = 0;
    foreach ($this->dishes as $dish) {
      $sum += $dish->getPriceForCount();
    }

    return $sum;
  }
}