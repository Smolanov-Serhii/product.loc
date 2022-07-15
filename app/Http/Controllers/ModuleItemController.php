<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleItemsRequest;
use App\Models\Language;
use App\Models\ModelSeo;
use App\Models\Module;
use App\Models\ModuleAttribute;
use App\Models\ModuleItem;
use App\Models\ModuleItemProperty;
use App\Models\ModuleRepeaterIteration;
use App\Models\Page;
use App\Models\TaxonomyItem;
use App\Repositories\ModuleItemsRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ModuleItemController extends Controller
{
    private $moduleItemsRepository;

    public function __construct(ModuleItemsRepository $moduleItemsRepository)
    {
        $this->moduleItemsRepository = $moduleItemsRepository;
    }

    /**
     * Display a listing of the resource.
     * @param Module $module
     * @return View
     */
    public function index(Module $module): View
    {
        return view('admin.module_items.index', compact('module'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Module $module
     * @return View
     */
    public function create(Module $module): View
    {
        $module_item = new ModuleItem();
        $module_item->module = $module;
        $aliases = ModelSeo::all()->pluck('alias')->toArray();
        return view('admin.module_items.create', compact('module', 'aliases', 'module_item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Module $module
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Module $module)
    {
        $attributes_mapped_by_id = $module
            ->attrs
            ->mapWithKeys(function ($attr) {
                return [$attr->id => $attr];
            });

//        $module_item_props_mapped_by_attr_id = $module_item
//            ->props
//            ->mapWithKeys(function ($prop){
//                return [$prop->module_attribute_id => $prop];
//            });

        $data = $request->all();
//dd($data);
        $rules = (new StoreModuleItemsRequest)->rules();

        $validator = Validator::make($data, $rules);

//        if ($validator->fails()) {
//            return redirect('admin/pages/create')
//                ->withErrors($validator)
//                ->withInput();
//        } else {

        $module_item = $module->items()->create($data);

        if (isset($data['item'])) {

            foreach ($data['item'] as $attr_id => $value) {

                $module_attribute = ModuleAttribute::find($attr_id);
                if (isset($module_attribute)) //                    && $module_attribute->type == 0)
                {

                    switch ($attributes_mapped_by_id[$attr_id]->type) {
                        case (0):
                            $imageURL = $value->store('module_items');
                            $path_ar = explode('/', $imageURL);
                            $value = end($path_ar);
                            break;
                        case (6):
                            $fileURL = $value->store('module_items');
                            $path_ar = explode('/', $fileURL);
                            $value = end($path_ar);
                            break;
                    }
//                    $imageURL = $value->store('module_items');
//                    $path_ar = explode('/', $imageURL);
//                    $value = end($path_ar);
                }

                $module_item->props()->create([
                    'value' => $value,
                    'module_attribute_id' => $attr_id,
//                    'model' => 'Module_items',
                ]);
            }
        }

//        if(isset($data['old_iterations'])) {
//            foreach ($data['old_iterations'] as $repeater_id => $iterations_data) {
//                foreach ($iterations_data as $iteration_id => $iteration_attributes_data) {
////                    $iteration_model = Module_repeater_iterations::find($iteration_id);
//
//                    foreach ($iteration_attributes_data as $prop_id => $value) {
//                        $prop_model = Module_item_properties::find($prop_id);
////                        dd($prop_model);
//                        if($value){
//                            $prop_model->update(['value' => $value]);
//                        }
////                        $iteration_model->props()->create([
////                            'model' => class_basename($iteration_model),
////                            'model_attribute_id' => $attribute_id,
////                            'value' => $value,
////                        ]);
//                    }
//                }
//            }
//        }

        if (isset($data['iterations'])) {
            $iteration_models = [];
            foreach ($data['iterations'] as $parent => $iterations) {
                foreach ($iterations as $repeater_id => $iterations_data) {
                    foreach ($iterations_data as $iteration_id => $iteration_attributes_data) {
                        $parent_model = $parent == 'Module_items' ? $module_item : $iteration_models[$parent];


                        $iteration_model = $parent_model
                            ->iterable()
                            ->create(['module_repeater_id' => $repeater_id]);
//                        $iteration_model = Module_repeater_iterations::create(
//                            [
////                                'model' => class_basename($parent_model),
////                                'model_id' => $parent_model->id,
//                                'module_repeater_id' => $repeater_id,
//                            ]);
                        $iteration_models = Arr::add($iteration_models, $iteration_id, $iteration_model);

                        foreach ($iteration_attributes_data as $attribute_id => $value) {
                            $prop = $iteration_model->props()->create([
//                                'model' => class_basename($iteration_model),
                                'module_attribute_id' => $attribute_id,
                                'value' => $value,
                            ]);
                        }
                    }
                }
            }
        }

        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $attr_id => $value) {
//            $prop = $module_item_props_mapped_by_attr_id[$attr_id] ?? null;
//            $prop = $module_item->props()->where('module_attribute_id', $attr_id)->first();

//            if is image
                switch ($attributes_mapped_by_id[$attr_id]->type) {
                    case (0):
                        $imageURL = $value->store('module_items');
                        $path_ar = explode('/', $imageURL);
                        $value = end($path_ar);
                        break;
                    case (6):
                        $fileURL = $value->store('module_items');
                        $path_ar = explode('/', $fileURL);
                        $value = end($path_ar);
                        break;
                }
//                if ($attributes_mapped_by_id[$attr_id]->type == 0) {
////                dd(Module_attributes::find($attr_id));
//                    $imageURL = $value->store('module_items');
//                    $path_ar = explode('/', $imageURL);
//                    $value = end($path_ar);
////                dd($value);
//                }

//            if($prop) {
//                $prop
//                    ->update([
//                        'value' => $value,
//                        'model' => class_basename($module_item),
//                        'module_attribute_id' => $attr_id
//                    ]);
//            } else {
                $prop = $module_item
                    ->props()
                    ->create([
                        'value' => $value,
                        'module_attribute_id' => $attr_id,
//                        'model' => 'Module_items',
                    ]);
//            }
//            if($attributes_mapped_by_id[$attr_id]->type == 0){
//                dd($prop);
//            }
            }
        }


//        $module = $module_item->module;

        foreach ($data['additions'] as $lang => $addition) {
            if (
                request()->hasFile("additions.$lang.thumbnail")
                && request()->file("additions.$lang.thumbnail")->isValid()
            ) {
                $imageURL = request()->file("additions.$lang.thumbnail")->store('additions');
                $path_ar = explode('/', $imageURL);
                $addition['thumbnail'] = end($path_ar);
                Image::make(public_path('uploads/additions/') . $addition['thumbnail'])
                    ->resize(320, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/additions/') . '/thumbs/' . $addition['thumbnail']);

//            Remove old images
//                    Storage::delete('additions/'. $addition->thumbnail);
//                    Storage::delete('additions/thumbs/'. $addition->thumbnail);

            }
//            if(isset($data['properties'][$lang])) {
            $lang_id = Language::where('iso', $lang)->first()->id;

//            $model_addition = $module_item->addition($lang_id)->first();


                $addition['lang_id'] = $lang_id;
//                $addition['model'] = 'Module_items';
//                $addition['model_id'] = $module_item->id;
                $module_item->addition()->create($addition);
//            }
        }

        foreach ($data['seo'] as $lang => $seo) {
            if (
                request()->hasFile("seo.$lang.thumbnail")
                && request()->file("seo.$lang.thumbnail")->isValid()
            ) {
                $imageURL = request()->file("seo.$lang.thumbnail")->store('seo');
                $path_ar = explode('/', $imageURL);
                $seo['thumbnail'] = end($path_ar);
                Image::make(public_path('uploads/seo/') . $seo['thumbnail'])
                    ->resize(320, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/seo/') . '/thumbs/' . $seo['thumbnail']);

//            Remove old images
//                    Storage::delete('seo/'. $seo->thumbnail);
//                    Storage::delete('seo/thumbs/'. $seo->thumbnail);

            }
//            if(isset($data['properties'][$lang])) {
            $lang_id = Language::where('iso', $lang)->first()->id;

            $model_seo = $module_item->seo($lang_id)->first();

//                dd($model_seo);
            if ($model_seo) {
                $model_seo->update($seo);
            } else {
                $seo['lang_id'] = $lang_id;
//                $seo['model'] = 'Module_items';
                $module_item->seo()->create($seo);
            }
//            }
        }

//        $module_item_update_link = route('admin.modules.items.update', ['module_item' => $module_item]);
//        $module_list_link = route('admin.modules.items.update', ['module' => $module_item->module]);
//            "<a href = '{$module_item_update_link}' >Редактировать</a><br><a href = '{$module_item_update_link}' >Список записей</a>";

        return response()->json([
            'status' => true,
            'redirectTo' => route('admin.modules.items.list', compact('module'))
        ]);

//        return redirect();


//        return redirect(route('admin.modules.items.list', compact('module')));
    }


    public function item($alias)
    {
        if ($model = ModelSeo::where('alias', $alias)->first()) {
            $module_item = $model->seoable;
            $page = new Page;
            $page->seo = $model;
//            $alias = $module_item->module->name;
//            dd($alias);
//            $page = Page::whereHas('seo', function (Builder $query) use ($alias) {
//                $query
//                    ->where('alias', $alias)
//                    ->orWhere('alias', 404);
//            })
//                ->with(['seo', 'addition'])
//                ->first();

            return view("client.module_items.{$module_item->module->name}.item", compact('module_item', 'model', 'page'));
        } elseif ($taxonomy_item = TaxonomyItem::where('key', $alias)->first()) {

            $module_name = Str::of(request()->route()->getPrefix())->ltrim('/');

            $model = ModelSeo::where('alias', $module_name)->first();

            return view("client.module_items.{$module_name}.category", compact('model'));
        }
    }


    public function site()
    {
        dd(request()->getHttpHost());
        if ($model = ModelSeo::where('alias', $alias)->first()) {
            $module_item = $model->seoable;
            $page = new Page;
            $page->seo = $model;
//            $alias = $module_item->module->name;
//            dd($alias);
//            $page = Page::whereHas('seo', function (Builder $query) use ($alias) {
//                $query
//                    ->where('alias', $alias)
//                    ->orWhere('alias', 404);
//            })
//                ->with(['seo', 'addition'])
//                ->first();

            return view("client.module_items.{$module_item->module->name}.item", compact('module_item', 'model', 'page'));
        } elseif ($taxonomy_item = TaxonomyItem::where('key', $alias)->first()) {

            $module_name = Str::of(request()->route()->getPrefix())->ltrim('/');

            $model = ModelSeo::where('alias', $module_name)->first();

            return view("client.module_items.{$module_name}.category", compact('model'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ModuleItem $module_item
     * @return \Illuminate\Http\Response
     */
    public function edit(ModuleItem $module_item)
    {
        $aliases = ModelSeo::where('alias', '!=', $module_item->seo ? $module_item->seo->alias : '')->pluck('alias')->toArray();
        $module_item_props_mapped_by_attr = $module_item
            ->props
            ->mapWithKeys(function ($prop) {
                return [$prop->module_attribute_id => $prop];
            });


        return view('admin.module_items.update', compact('module_item', 'module_item_props_mapped_by_attr', 'aliases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ModuleItem $module_item
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ModuleItem $module_item)
    {

        $attributes_mapped_by_id = $module_item
            ->module
            ->attrs
            ->mapWithKeys(function ($attr) {
                return [$attr->id => $attr];
            });

        $module_item_props_mapped_by_attr_id = $module_item
            ->props
            ->mapWithKeys(function ($prop) {
                return [$prop->module_attribute_id => $prop];
            });

        $data = request()->all();

//        dd($data['taxonomy_items']);
        $module_item->taxonomy_items()->sync($data['taxonomy_items'] ?? []);
        $module_item->module_items()->sync($data['module_items'] ?? []);

        if (isset($data['clear_value'])) {
            foreach ($data['clear_value'] as $property_id) {
                $property_model = ModuleItemProperty::find($property_id);
                $property_model->delete();

                $storagePath = Storage::disk('public')->path('module_items');
                if (file_exists("{$storagePath}/{$property_model->value}")) {
                    Storage::delete("{$storagePath}/{$property_model->value}");
                }
            }
        }


        if (isset($data['remove_iterations'])) {
            foreach ($data['remove_iterations'] as $iteration_id) {
                ModuleRepeaterIteration::find($iteration_id)->delete();
            }
        }

        if (isset($data['old_iterations'])) {
            $iteration_models = [];
            foreach ($data['old_iterations'] as $parent => $iterations) {
                foreach ($iterations as $repeater_id => $iterations_data) {
                    foreach ($iterations_data as $iteration_id => $iteration_attributes_data) {
                        $iteration_model = ModuleRepeaterIteration::find($iteration_id);
                        $iteration_models = Arr::add($iteration_models, $iteration_id, $iteration_model);
                        foreach ($iteration_attributes_data as $prop_id => $value) {
                            $prop_model = ModuleItemProperty::find($prop_id);
                            //                        dd($prop_model);
                            if ($value) {
                                $prop_model->update(['value' => $value]);
                            }
                            //                        $iteration_model->props()->create([
                            //                            'model' => class_basename($iteration_model),
                            //                            'model_attribute_id' => $attribute_id,
                            //                            'value' => $value,
                            //                        ]);
                        }
                    }
                }
            }
        }

        if (isset($data['iterations'])) {
            foreach ($data['iterations'] as $parent => $iterations) {
                foreach ($iterations as $repeater_id => $iterations_data) {
                    foreach ($iterations_data as $iteration_id => $iteration_attributes_data) {
                        $parent_model = $parent == 'Module_items' ? $module_item : $iteration_models[$parent];

                        $iteration_model = ModuleRepeaterIteration::create(
                            [
//                                'model' => class_basename($parent_model),
//                                'model_id' => $parent_model->id,
                                'module_repeater_id' => $repeater_id,
                            ]);
                        $iteration_models = Arr::add($iteration_models, $iteration_id, $iteration_model);

                        foreach ($iteration_attributes_data as $attribute_id => $value) {
                            $prop = $iteration_model->props()->create([
//                                'model' => class_basename($iteration_model),
                                'module_attribute_id' => $attribute_id,
                                'value' => $value,
                            ]);
                        }
                    }
                }
            }
        }
//
//        dd($data);
        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $attr_id => $value) {
                $prop = $module_item_props_mapped_by_attr_id[$attr_id] ?? null;
//            $prop = $module_item->props()->where('module_attribute_id', $attr_id)->first();

//            if is image

                switch ($attributes_mapped_by_id[$attr_id]->type) {
                    case (0):
                        $imageURL = $value->store('module_items');
                        $path_ar = explode('/', $imageURL);
                        $value = end($path_ar);
                        break;
                    case (6):
                        $fileURL = $value->store('module_items');
                        $path_ar = explode('/', $fileURL);
                        $value = end($path_ar);
                        break;
                }
//                if ($attributes_mapped_by_id[$attr_id]->type == 0) {
//
//                }

                if ($prop) {
                    $prop
                        ->update([
                            'value' => $value,
//                            'model' => class_basename($module_item),
                            'module_attribute_id' => $attr_id
                        ]);
                } else {
                    $prop = $module_item
                        ->props()
                        ->create([
                            'value' => $value,
                            'module_attribute_id' => $attr_id,
//                            'model' => 'Module_items',
                        ]);
                }
//            if($attributes_mapped_by_id[$attr_id]->type == 0){
//                dd($prop);
//            }
            }
        }

        $module = $module_item->module;

        foreach ($data['additions'] as $lang => $addition) {
            if (
                request()->hasFile("additions.$lang.thumbnail")
                && request()->file("additions.$lang.thumbnail")->isValid()
            ) {
                $imageURL = request()->file("additions.$lang.thumbnail")->store('additions');
                $path_ar = explode('/', $imageURL);
                $addition['thumbnail'] = end($path_ar);
                Image::make(public_path('uploads/additions/') . $addition['thumbnail'])
                    ->resize(320, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/additions/') . '/thumbs/' . $addition['thumbnail']);

//            Remove old images
//                    Storage::delete('additions/'. $addition->thumbnail);
//                    Storage::delete('additions/thumbs/'. $addition->thumbnail);

            }
//            if(isset($data['properties'][$lang])) {
            $lang_id = Language::where('iso', $lang)->first()->id;

            $model_addition = $module_item->addition($lang_id)->first();

//                dd($model_addition);
            if ($model_addition) {
                $model_addition->update($addition);
            } else {
                $addition['lang_id'] = $lang_id;
//                $addition['model'] = 'Module_items';
                $module_item->addition()->create($addition);
            }
//            }
        }

        foreach ($data['seo'] as $lang => $seo) {
            if (
                request()->hasFile("seo.$lang.thumbnail")
                && request()->file("seo.$lang.thumbnail")->isValid()
            ) {
                $imageURL = request()->file("seo.$lang.thumbnail")->store('seo');
                $path_ar = explode('/', $imageURL);
                $seo['thumbnail'] = end($path_ar);
                Image::make(public_path('uploads/seo/') . $seo['thumbnail'])
                    ->resize(320, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/seo/') . '/thumbs/' . $seo['thumbnail']);

//            Remove old images
//                    Storage::delete('seo/'. $seo->thumbnail);
//                    Storage::delete('seo/thumbs/'. $seo->thumbnail);

            }
//            if(isset($data['properties'][$lang])) {
            $lang_id = Language::where('iso', $lang)->first()->id;

            $model_seo = $module_item->seo($lang_id)->first();

            if ($model_seo) {
                $model_seo->update($seo);
            } else {
                $seo['lang_id'] = $lang_id;
//                $seo['model'] = 'Module_items';
                $module_item->seo()->create($seo);
            }
//            }
        }

        return response()->json([
            'status' => true,
            'redirectTo' => route('admin.modules.items.list', compact('module'))
        ]);

//            return redirect(route('admin.modules.items.list', compact('module')));
//        return redirect(route('admin.modules.items.list',compact('module')));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter (Request $request, string $params = null)
    {
        $items = $this
            ->moduleItemsRepository
            ->filter( $request->all() );

        return response()->json([
            'status' => true,
            'view' => view('client.block_templates.includes.category_result', compact('items'))->render()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ModuleItem $module_item
     * @return RedirectResponse
     */
    public function destroy(ModuleItem $module_item)
    {
        if ($module_item->delete()) {
            return redirect()->route('admin.modules.items.list', ['module' => $module_item->module]);
        }
        return back();
    }
}
