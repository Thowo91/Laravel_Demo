<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\UrlGenerator;

class SetLocale
{
    private $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->url->defaults([
            'locale' => $request->segment(1),
        ]);

        app()->setLocale($request->segment(1));
        return $next($request);
    }
}
