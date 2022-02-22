<?php

namespace App\Http\Middleware;

use App\Models\Languages;
use App\Models\Page_properties;
use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  Languages  $iso
     * @param  Page_properties  $alias
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd();
//        $isLocale = Languages::where([
//            'iso' => $request->segment(1),
//        ])->enabled()->exists();

        App::setLocale(config('app.fallback_locale'));
//        dd($request->alias);
//        dd($request->segment(1));

//        App::setLocale($isLocale ? $request->segment(1) : config('app.fallback_locale'));

//        if (!$isLocale) return redirect(App::getLocale());
//dd($request->alias);
        return $next($request, $request->alias);
    }
}
