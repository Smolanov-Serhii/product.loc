<?php

namespace App\Models;

use App\Traits\HasSystemFields;
use BeyondCode\Comments\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Menu_items extends Model
{
    use HasFactory, HasSystemFields, SoftDeletes;

    protected $fillable = [
        'alias',
        'link_text',
    ];


    protected $lang_id;

    public function __construct(array $attributes = [])
    {
        $this->lang_id = Languages::where('iso', App::getLocale())->first()->id;

        parent::__construct($attributes);
    }


//    Property model_addition
    public function addition($lang_id = null){

        $lang_id = $lang_id ?? $this->lang_id;

        return
            $this->hasOne(Model_additions::class, 'model_id', 'id')
                ->where('model', class_basename(self::class))
                ->where('lang_id', $lang_id);

    }

}
