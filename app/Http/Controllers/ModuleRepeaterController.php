<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleRepeater;

class ModuleRepeaterController extends Controller
{

//    TODO make invokable
    /**
     * Display the specified resource.
     *
     * @param ModuleRepeater $moduleRepeater
     * @param $parent_iteration_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ModuleRepeater $moduleRepeater, $parent_iteration_id)
    {
        $data = request()->all();

        if ($moduleRepeater->repeatable instanceof Module) {
            $module = $moduleRepeater->repeatable;
        } elseif ($moduleRepeater->repeatable instanceof ModuleRepeater) {
            $parent = $moduleRepeater->repeatable;
//            $parent = Module_repeaters::find($moduleRepeater->model_id);
            $module = $parent->repeatable;
//            $module = Modules::find($parent->model_id);
        }
        $iteration_id = $data['iteration_id'] ?? 'i'.rand(2e9, 2e12);
        $parent = $parent_iteration_id;
        return response()->json([
            'status' => true,
            'html' => view(
                'admin.module_items.includes.repeater',
                compact('moduleRepeater', 'module', 'iteration_id', 'parent')
            )->render(),
        ]);
    }
}
