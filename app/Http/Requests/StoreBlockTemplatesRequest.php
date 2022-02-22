<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlockTemplatesRequest extends FormRequest
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
            'enabled' => 'boolean',
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:255',
            'image_path' => 'required|string:255',
            'image' => 'required|mimes:jpeg,bmp,png',
        ];
    }
}
