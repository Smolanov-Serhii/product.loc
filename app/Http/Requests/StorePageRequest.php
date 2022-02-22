<?php

namespace App\Http\Requests;

use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'parent_page_id' => 'exists:pages,id',

            'additions.*.title' => 'required|string|max:255',
            'additions.*.excerpt' => 'nullable|string',
            'additions.*.content' => 'nullable|string',
            'additions.*.thumbnail' => 'nullable|mimes:jpeg,bmp,png',

            'seo.*.title' => 'required|string|max:255',
            'seo.*.alias' => [
                'required',
                'string',
                'max:255',
                Rule::unique('seo', 'alias')
                    ->ignore( optional($this->page)->seo, 'alias' ),
            ],
            'seo.*.meta_keywords' => 'required|string|max:255',
            'seo.*.meta_description' => 'required|string|max:255',
            'seo.*.thumbnail' => 'nullable|mimes:jpeg,bmp,png'
        ];
    }
}
