<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $fillable = [
    'name_ru',
    'name_kk',
    'name_en',
    'slug',
    'image',
    'note'
  ];

  public function bars()
  {
    return $this->hasMany(Bar::class);
  }

  public function continents()
  {
    return $this->hasMany(Continent::class);
  }

  public function vips()
  {
    return $this->hasMany(Vip::class);
  }

  public function teams()
  {
    return $this->hasMany(Team::class);
  }

  public function contacts()
  {
    return $this->hasMany(Contact::class);
  }

  public function abouts()
  {
    return $this->hasMany(About::class);
  }

  public function children()
  {
    return $this->hasMany(Child::class);
  }

  public function studios()
  {
    return $this->hasMany(Studio::class);
  }

  public function deliveries()
  {
    return $this->hasMany(Delivery::class);
  }
}
