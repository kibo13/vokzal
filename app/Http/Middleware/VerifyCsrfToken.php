<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
  /**
   * The URIs that should be excluded from CSRF verification.
   *
   * @var array
   */
  protected $except = [
    'https://vokzal.test/ru/payment/',
    'https://vokzal.softdeco.kz/ru/payment/',
    'https://www.baikonur-gupzhkh.ru/ru/payment/',
  ];
}