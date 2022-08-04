<?php

use Illuminate\Contracts\Routing\UrlGenerator;

if (! function_exists('local_url')) {
    /**
     * Generate a url for the application.
     *
     * @param  string|null  $path
     * @param  mixed  $parameters
     * @param  bool|null  $secure
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function local_url($path = null, $parameters = [], $secure = null)
    {
        if (config('app.fallback_locale') != app()->getLocale()) {
            $path = '/'.app()->getLocale().'/'.$path.'/';
        } else {
            if ($path != '/') {
                $path = '/'.$path;
            }
        }

        if (is_null($path)) {
            return app(UrlGenerator::class);
        }

        return app(UrlGenerator::class)->to($path, $parameters, $secure);
    }
}