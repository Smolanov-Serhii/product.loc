<?php

namespace App\Models\Forum;

use App\Models\ModuleItem;
use App\Scopes\TopicScope;


class Topic extends ModuleItem
{

    protected $table = 'module_items';

    protected static function booted()
    {
        static::addGlobalScope(new TopicScope);
    }

    public function getTitleAttribute($value)
    {
        return $this->properties['title'];
    }

    public function getThemeAttribute()
    {
        return $this->properties['theme'];
    }
}