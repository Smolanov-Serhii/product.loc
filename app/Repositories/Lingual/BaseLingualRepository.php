<?php

namespace App\Repositories\Lingual;

use App\Services\ImageUploader;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class BaseLingualRepository
{
    protected $imageUploader;

    public function __construct(ImageUploader $imageUploader)
    {
        $this->imageUploader = $imageUploader;
    }

    /**
     * @param array $data
     * @return array
     */
    public function getAttributesArrayTranslations(array $data): array
    {
        $translations = [];
        foreach ($data as $langIso => $translate) {
            $attributes = $translate;
            $attributes['lang_id'] = Cache::get('languages')->get($langIso);

            if(isset($attributes['thumbnail'])) {
                $attributes['thumbnail'] = $this
                    ->imageUploader
                    ->uploadImage(
                        config('thumbnail.uploadPathForRepository.'.class_basename($this)),
                        Arr::get($attributes, 'thumbnail'),
                        config('thumbnail.attributes.admin'),
                    );
            }
            $translations[] = $attributes;
        }

        return $translations;
    }
}