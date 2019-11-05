<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Session;

class ChangeLanguage
{
    public function handle($request, Closure $next)
    {
        $language = Session::get('language');
        dump($language);
        App::setLocale($language);
        return $next($request);
    }
}
