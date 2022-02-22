<?php

namespace App\Http\Middleware;

use App\Models\Page_properties;
use Closure;
use Illuminate\Http\Request;

class SetPage
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
        return $next($request);
//        if($request->alias && $page_property = Page_properties::where('alias', $request->alias)->first()){
//        } elseif( !$request->alias ) {
//            $page_property = Page_properties::where('alias', '/')->first();
////            dd($page_property);
//            return $next($request, $page_property->id);
//        }
//        return redirect(route('page',['alias' => '/']));
    }
}
