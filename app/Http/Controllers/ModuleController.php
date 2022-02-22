<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleAttribute;
use App\Models\ModuleRepeater;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $modules = Module::all();

        return view('admin.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View | Factory
     */
    public function create(): ?View
    {
        $modules = new Module();

        return view('admin.modules.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Redirector | RedirectResponse
     */
    public function store(Request $request): ?RedirectResponse
    {

        $data = $request->all();

        $module = Module::create($data);

        $module->taxonomies()->sync($data['taxonomies'] ?? []);
        $module->modules()->sync($data['modules'] ?? []);

        $models = [$data['id'] => $module];

        if (isset($data['repeaters'])) {
            foreach ($data['repeaters'] as $id => $repeater) {
                $repeater = $models[$repeater['parent_id']]->repeaters()->create([
                    'name' => $repeater['name'],
                    'key' => $repeater['key'],
                ]);
                $models = Arr::add($models, $id, $repeater);
            }
        }

        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $id => $attribute) {
                if (isset($attribute['name'])) {
                    $attribute_data = [
                        'type' => array_flip(ModuleAttribute::TYPE_LIST)[$attribute['type']],
                        'name' => $attribute['name'],
                        'key' => $attribute['key'],
                    ];

                    $models[$attribute['parent_id']]->attrs()->create($attribute_data);
                }
            }
        }

        return redirect(route('admin.modules.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Module $moudules
     * @return \Illuminate\Http\Response
     */
//    public function show(Module $moudules)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Module $module
     * @return View| Factory
     */
    public function edit(Module $module): ?View
    {
        $taxonomies = Taxonomy::all();
        $modules = Module::all();

        return view('admin.modules.update', compact('module', 'taxonomies', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Module $moudules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $data = $request->all();

        $module->update($data);

        $module->taxonomies()->sync($data['taxonomies'] ?? []);
        $module->modules()->sync($data['modules'] ?? []);

        if (isset($data['old_attributes'])) {
            foreach ($data['old_attributes'] as $id => $attribute_data) {
                ModuleAttribute::find($id)->update($attribute_data);
            }
        }

        $models = [$module->id => $module];

        if (isset($data['old_repeaters'])) {
            foreach ($data['old_repeaters'] as $id => $repeater) {
                $repeater_model = ModuleRepeater::find($id);
                $repeater_model->update($repeater);

                $models = Arr::add($models, $id, $repeater_model);
            }
        }

        if (isset($data['repeaters'])) {
            foreach ($data['repeaters'] as $id => $repeater) {
                $repeater = $models[$repeater['parent_id']]->repeaters()->create([
                    'name' => $repeater['name'],
                    'key' => $repeater['key'],
                ]);
                $models = Arr::add($models, $id, $repeater);
            }
        }

        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $id => $attribute) {
                if (isset($attribute['name'])) {
                    $attribute_data = [
                        'type' => array_flip(ModuleAttribute::TYPE_LIST)[$attribute['type']],
                        'name' => $attribute['name'],
                        'key' => $attribute['key'],
                    ];

                    $models[$attribute['parent_id']]->attrs()->create($attribute_data);
                }
            }
        }

        if (isset($data['delete_attributes'])) {
            foreach ($data['delete_attributes'] as $id => $name) {
                ModuleAttribute::find($id)->delete();
            }
        }

        if (isset($data['delete_repeaters'])) {
            foreach ($data['delete_repeaters'] as $id => $name) {
                ModuleRepeater::find($id)->delete();
            }
        }

        return redirect(route('admin.modules.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Module $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        if ($module->delete()) {
            return redirect()->route('admin.modules.list');
        }
        return back();
    }
}
