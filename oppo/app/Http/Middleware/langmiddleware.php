<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class langmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $lan = $request->session()->get('lang');
        /*  يعني روح هاتي لانج المتخزنة في السيشن  في كنرولير*/
        if($lan == null)
        {
            /*
             * $lang= $lang ?? "en"
             يعني لو مخترتش حاجة  خلي  الديفولت  انجليزي
             */
            $lan ="en";

        }

        App::setLocale($lan);
        /* يعني بعد ماتتخزن  اللغة في كنترول في سيشن   وتروح تطبق ميدلوير  روح بقي غيرها في App local*/
        return $next($request);
    }
}
