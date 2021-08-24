<?php

use App\Models\Category;

function getCategories()
{
  return Category::get();
}

function getCategory($param)
{
  return Category::where('slug', $param)->first();
}

function getCategoryTitle($param)
{
  // category
  $category = Category::where('slug', $param)->first();

  // title
  $title = '';

  switch (getCurrentLang()) {
    case 'ru':
      $title = $category->name_ru;
      break;
    case 'en':
      $title = $category->name_en;
      break;
    case 'kk':
      $title = $category->name_kk;
      break;
  }

  return $title;
}

function getCategoriesCount()
{
  return Category::count();
}