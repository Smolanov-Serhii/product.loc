<?php

namespace App\Http\Requests;

use App\Models\Widget;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWidgetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Widget $widget = null)
    {
        return [
            'enable' => 'boolean',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('widgets')->ignore($widget->id ?? null),
            ]
        ];
    }
}
