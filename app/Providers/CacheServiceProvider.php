<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Cache::rememberForever('languages', function () {
            return DB::table('languages')
                ->select('id', 'iso')
                ->where('enabled', true)
                ->get()
                ->map(function ($language) {
                    return [$language->iso => $language->id];
                })
                ->collapse();
        });
    }

    public function register()
    {

    }
}
