<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
//     * @param  Language  $iso
//     * @param  Page_properties  $alias
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        if($request->segment(1) == config('app.fallback_locale')){
//            return redirect('/');
//        };
//
//        dd(1);
        $isLocale = Language::where([
            'iso' => $request->segment(1),
        ])->enabled()->exists();

//        dd($request->segments());
//
//        App::setLocale();
////        dd($request->alias);
////        dd($request->segment(1));

        App::setLocale($isLocale ? $request->segment(1) : config('app.fallback_locale'));
//dd(App::getLocale());
//        if (!$isLocale) return redirect(App::getLocale());
//dd($request->alias);
        return $next($request, $request->alias);
    }
}
