<?php

namespace App\Http\Middleware;

use App\Models\Variable;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SetVariables
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {



        $variables = Variable::all()
            ->groupBy('section');

        if (isset($variables['general'])) {
            $var = $variables['general']
                ->mapWithKeys(function ($var) {
                    return [$var->key => optional($var->translate)->value];
                });
        }

        if (isset($variables['contacts'])) {
            $contacts = $variables['contacts']
                ->mapWithKeys(function ($var) {
                    return [$var->key => optional($var->translate)->value];
                });
        }

        View::share([
            'var' => $var ?? [],
            'contacts' => $contacts ?? []
        ]);

        return $next($request);
    }
}
