<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlockContentValuesRequest extends FormRequest
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
            'block_content_id' => 'exists:blocks,id',
            'lang_id' => 'exists:languages,id',
            'title' => 'nullable|string:255',
            'sub_title' => 'nullable|string:255',
            'content' => 'nullable|string:255',
            'link' => 'nullable|string:255',
            'image_path' => 'nullable|string:255',
            'image' => 'nullable|mimes:jpeg,bmp,png',
            'enabled' => 'nullable|boolean'
        ];
    }
}
