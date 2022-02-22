<?php

namespace App\Models;

use App\Traits\HasSoftDeletedRelation;
use BeyondCode\Comments\Traits\HasComments;
use Illuminate\Database\Eloquent\SoftDeletes;
use BeyondCode\Comments\Comment as CommonComment;

class Comment extends CommonComment
{
    use SoftDeletes, HasComments, HasSoftDeletedRelation;

    protected $softDelete_relations = [
        'comments',
    ];

    public function scopeFirstLevel()
    {
        return $this->where(
            'commentable_type',
            '<>',
            config('comments.comment_class')
        )
            ->with('comments');
    }
}
