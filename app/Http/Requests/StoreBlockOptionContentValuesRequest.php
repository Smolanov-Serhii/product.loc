<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlockOptionContentValuesRequest extends FormRequest
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
    public function rules()
    {
        return [
            'block_content_value_id' => 'exists:block_content_value,id',
            'value' => 'nullable|string:255',
            'type' => 'nullable|integer',
            'content' => 'nullable|string:255',
            'image' => 'nullable|mimes:jpeg,bmp,png'
        ];
    }
}
