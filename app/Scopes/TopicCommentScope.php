<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TopicCommentScope implements Scope
{
    /**
     * Применить диапазон к переданному построителю запросов.
     *
     * @param  Builder  $builder
     * @param  Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model): void
    {
//        $builder->whereHas('commentable', function (Builder $query) {
////            $query->whereHas('module', function (Builder $query) {
////                $query->where('name', config('modules.topic_module_name'));
////            });
//        });
//
//        $builder->whereHas('commentable', function (Builder $query) {
//            $query->where('commentable_type', config('modules.topic_comment_commentable_type'));
//        });
    }
}