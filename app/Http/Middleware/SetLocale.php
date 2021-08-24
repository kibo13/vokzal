<?php

namespace App\Http\Middleware;

use Closure;
use App;

class SetLocale
{
  public function handle($request, Closure $next)
  {
    $locale = session('locale');
    App::setlocale($locale);
    return $next($request);
  }
}
