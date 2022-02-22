<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, HasSystemFields;

    protected $table = 'menu';

    protected $fillable = [
        'model',
        'model_id',
        'order',
        'section'
    ];

    public function item() {
        return $this
            ->hasOne($this->model, 'id', 'model_id');
    }
}
