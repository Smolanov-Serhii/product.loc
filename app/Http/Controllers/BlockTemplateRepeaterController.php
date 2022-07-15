<?php

namespace App\Http\Controllers;

use App\Models\BlockTemplateRepeater;
use App\Models\Language;
use Illuminate\Http\JsonResponse;

class BlockTemplateRepeaterController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param BlockTemplateRepeater $blockTemplateRepeater
     * @param string $parent_type
     * @param string $parent_id
     * @param Language $language
     * @return JsonResponse
     */
    public function show(
        BlockTemplateRepeater $blockTemplateRepeater,
        string $parent_type,
        string $parent_id,
        Language $language ): JsonResponse
    {
        $className = "App\Models\\$parent_type";
        $model = (new $className);

        $isParentExist = $model->where('id', $parent_id)->exists();

        $parent_u_id = $isParentExist
            ? "{$parent_type}_{$parent_id}"
            : $parent_id;


        $u_id = rand(2e9, 2e12);

        return response()->json([
            'status' => true,
            'html' => view('admin.block_template_repeaters.includes.template', [
                'repeater' => $blockTemplateRepeater,
                'u_id' => $u_id,
                'parent_id' => $parent_id,
                'parent_type' => $parent_type,
                'parent_u_id' => $parent_u_id,
                'language' => $language
            ])->render(),
            'u_id' => $u_id,
            'repeater_id' => $blockTemplateRepeater->id
        ]);
    }

}
