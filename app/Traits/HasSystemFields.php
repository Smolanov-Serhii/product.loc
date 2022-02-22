<?php

namespace App\Traits;

//use App\Observers\ModelObserver;
use Illuminate\Support\Facades\Auth;

trait HasSystemFields {

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->admin_updated_id =Auth::id();
        });

        static::creating(function ($model) {
            $model->admin_created_id = Auth::id();
        });

    }
}
