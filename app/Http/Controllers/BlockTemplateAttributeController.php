<?php

namespace App\Http\Controllers;

use App\Models\BlockTemplateAttribute;
use Illuminate\Http\JsonResponse;

class BlockTemplateAttributeController extends Controller
{
//    TODO make invokable
    /**
     * Render input template by type
     * @param  integer  $attribute_type_id
     * @param  integer  $parent_id
     * @return JsonResponse
     */
    public function template(int $attribute_type_id, int $parent_id): JsonResponse
    {
        $type_name = BlockTemplateAttribute::TYPE_LIST[$attribute_type_id] ?? 'default';
        $u_id = rand(2e9,2e12);

        return response()->json([
            'status' => true,
            'html' => view(
                'admin.block_template_attributes.templates.'.$type_name,
                compact('u_id','parent_id', 'type_name', 'attribute_type_id'))->render(),
            'u_id' => $u_id
        ]);
    }
}
