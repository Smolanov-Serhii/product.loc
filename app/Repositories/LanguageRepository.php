<?php

namespace App\Repositories;

use App\Models\Language;
use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class LanguageRepository
{

    /**
     * @param array $input
     * @return Language
     */
    public function create(array $input): ?Language
    {

        if(isset($input['image'])) {
            $imgUrl = request()->file('image')->store('languages');

            $input['image'] = array_reverse(explode('/',$imgUrl))[0];
        }

        return Language::create($input);
    }

    /**
     * @param Language $language
     * @param array $input
     * @return Language|null
     */
    public function update(Language $language, array $input): ?Language
    {
        if(isset($input['image'])) {
            $imgUrl = request()->file('image')->store('languages');

            $input['image'] = array_reverse(explode('/',$imgUrl))[0];
        }

        $language->update($input);

        return $language;
    }
}