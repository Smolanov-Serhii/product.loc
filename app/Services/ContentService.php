<?php

namespace App\Services;

use App\Models\Block;
use App\Models\BlockContent;
use App\Models\BlockTemplateAttribute;
use App\Models\BlockTemplateRepeaterIteration;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;

class ContentService
{
    /**
     * @param array $data // request()->all()
     * @param Block $block
     * create user
     * @return Block
     */
    public function update(array $data, Block $block): Block
    {
        try {
            $image_repository = new ImageRepository;

            $contents = $block->contents->mapWithKeys(function ($content) {
                return [$content->block_template_attribute_id => $content];
            });


            if (isset($data['content'])) {
                foreach ($data['content'] as $block_template_attribute_id => $value) {
                    $block_template_attribute_model = BlockTemplateAttribute::find($block_template_attribute_id);

                    if ($block_template_attribute_model->type == 0) {

                        $value = $image_repository
                            ->uploadImage($value, 'contents');

                    } elseif ($block_template_attribute_model->type == 5) {

                        $fileURL = $value->store('contents');
                        $path_ar = explode('/', $fileURL);
                        $value = end($path_ar);
                    }

                    if ($block_content = $contents[$block_template_attribute_id] ?? null) {
                        $block_content->translate->update([
                            'value' => $value
                        ]);
                    } else {
                        $block_content = $block->contents()->create([
                            'block_template_attribute_id' => $block_template_attribute_id
                        ]);

                        $block_content->translations()->create([
                            'value' => $value,
                            'lang_id' => 3,
                        ]);
                    }
                }
            }

            $models = [$data['id'] => $block];

            if (isset($data['old_iterations'])) {
                foreach ($data['old_iterations'] as $iteration_key => $iteration_data) {

                    $iteration_model = BlockTemplateRepeaterIteration::find($iteration_data['iteration_id']);
                    $iteration_model->update(['order' => $iteration_data['order']]);

                    $models[$iteration_key] = $iteration_model;

                    if (isset($iteration_data['old_attributes'])) {
                        foreach ($iteration_data['old_attributes'] as $content_id => $value) {
                            $block_content = BlockContent::find($content_id);

                            if ($block_content->attr->type == 0) {

                                $value = $image_repository
                                    ->uploadImage($value, 'contents');

                            } elseif ($block_content->attr->type == 5) {

                                $fileURL = $value->store('contents');
                                $path_ar = explode('/', $fileURL);
                                $value = end($path_ar);
                            }

                            $block_content->translate->update([
                                'value' => $value
                            ]);
                        }
                    }

                    if (isset($iteration_data['attributes'])) {
                        foreach ($iteration_data['attributes'] as $attribute_id => $value) {

                            $block_content = $iteration_model->contents()->create([
//                                'block_id' => $block->id,
                                'block_template_attribute_id' => $attribute_id,
                            ]);

                            if ($block_content->attr->type == 0) {

                                $value = $image_repository
                                    ->uploadImage($value, 'contents');

                            } elseif ($block_content->attr->type == 5) {

                                $fileURL = $value->store('contents');
                                $path_ar = explode('/', $fileURL);
                                $value = end($path_ar);
                            }

                            $block_content->translations()->create([
                                'value' => $value,
                                'lang_id' => 3
                            ]);
                        }
                    }
                }
            }

            if (isset($data['iterations'])) {
//                print_r($data['iterations']);
                foreach ($data['iterations'] as $iteration_id => $iteration_data) {
//                    print_r($iteration_data);

                    $parent_key = $iteration_data['parent_id'];

                    $parent_model = $models[$parent_key];


                    $iteration = $parent_model->iterations()->create([
                        'block_template_repeater_id' => $iteration_data['repeater_id'],
                        'order' => $iteration_data['order']
                    ]);

                    $models[$iteration_id] = $iteration;

                    if (isset($iteration_data['attributes'])) {

                        foreach ($iteration_data['attributes'] as $block_template_attribute_id => $value) {
                            $block_template_attribute_model = BlockTemplateAttribute::find($block_template_attribute_id);
//                        dd($block_template_attribute_model);

                            $iteration_content_model = $iteration->contents()->create([
                                'block_template_attribute_id' => $block_template_attribute_id,
//                                'block_id' => $block->id,
                            ]);
//                        dd($iteration_content_model);

                            if ($block_template_attribute_model->type == 0) {

                                $value = $image_repository
                                    ->uploadImage($value, 'contents');

                            } elseif ($block_template_attribute_model->type == 5) {

                                $fileURL = $value->store('contents');
                                $path_ar = explode('/', $fileURL);
                                $value = end($path_ar);
                            }

                            $iteration_content_model->translate()->create([
                                'value' => $value,
                                'lang_id' => 3,
                            ]);
//                            dd($value);
                        }
                    }

                }
            }

            if (isset($data['clear_value'])) {
                foreach ($data['clear_value'] as $property_id) {
                    $property_model = BlockContent::find($property_id);
                    $property_model
                        ->translate
                        ->update(['value' => '']);
//                $property_model->delete();

                    $storagePath = Storage::disk('public')->path('module_items');
                    if (file_exists("{$storagePath}/{$property_model->translate->value}")) {
                        Storage::delete("{$storagePath}/{$property_model->translate->value}");
                    }
                }
            }

            return $block;
        } catch (\Exception $exception) {
            if(App::environment('local')) {
                dd($exception->getMessage(), $data);
            }
        }

    }
}
