<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlockTemplatesRequest;
use App\Models\BlockTemplate;
use App\Models\BlockTemplateAttribute;
use App\Models\BlockTemplateGroup;
use App\Models\BlockTemplateRepeater;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use ZanySoft\Zip\Zip;

class BlockTemplateController extends Controller
{
    private $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.block_templates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $block_template = new BlockTemplate;
        $block_template_groups = BlockTemplateGroup::all();

        return view('admin.block_templates.create', compact('block_template', 'block_template_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (
            $request->hasFile('image')
            && $request->file('image')->isValid()
        ) {
            $imageURL = request()->file('image')->store('block_templates');
            $path_ar = explode('/', $imageURL);
            $data['image_path'] = end($path_ar);
            Image::make(public_path('uploads/block_templates/') . $data['image_path'])
                ->resize(320, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/block_templates/') . '/thumbs/' . $data['image_path']);
        }

        $rules = (new StoreBlockTemplatesRequest)->rules();
        $data['enabled'] = isset($data['enabled']);
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return redirect(route('admin.block_templates.create'))
                ->withErrors($validator)
                ->withInput();
        } else {
            $block_template = BlockTemplate::create($data);

            $block_template->groups()->sync($data['groups'] ?? []);

            $models = [$data['id'] => $block_template];

            if (isset($data['repeater'])) {
                foreach ($data['repeater'] as $id => $model_data) {
                    $model = $models[$model_data['parent_id']]
                        ->repeaters()
                        ->create($model_data);

                    $models = Arr::add($models, $id, $model);
                }
            }

            if (isset($data['attribute'])) {
                foreach ($data['attribute'] as $id => $model_data) {

                    switch ($model_data['type']) {
                        case(0):
                            if (isset($request->file('attribute')[$id])) {
                                $image = $request->file('attribute')[$id]['default_value'];
//                                if ($image->isValid()) {

                                $model_data['default_value'] = $this
                                    ->imageRepository
                                    ->uploadImage($image, 'block_template_attributes');

//                                    $imageURL = $image->store('block_template_attributes');
//                                    $path_ar = explode('/', $imageURL);
//                                    $model_data['default_value'] = end($path_ar);
//
//                                    $image_instance = Image::make($image);
//                                    $encoded_image_instance = Image::make($image)->encode('webp');
//
//
//                                    $image_name = explode('.',$model_data['default_value'])[0];
//
//                                    $encoded_image_instance->save(public_path('uploads/block_template_attributes/') . $image_name . '.webp');
//
//                                    switch (true) {
//                                        case ($image_instance->width() >= 1024) :
//
//                                            $image_instance->resize(1024, null, function ($constraint) {
//                                                $constraint->aspectRatio();
//                                            })
//                                                ->save(public_path('uploads/block_template_attributes/') . '/1024/' . $model_data['default_value']);
//
//                                            $encoded_image_instance
//                                                ->resize(1024, null, function ($constraint) {
//                                                    $constraint->aspectRatio();
//                                                })
//                                                ->save(public_path('uploads/block_template_attributes/') . '/1024/' . $image_name . '.webp');
//
//                                        case ($image_instance->width() >= 768) :
//
//                                            $image_instance->resize(768, null, function ($constraint) {
//                                                $constraint->aspectRatio();
//                                            })
//                                                ->save(public_path('uploads/block_template_attributes/') . '/768/' . $model_data['default_value']);
//
//                                            $encoded_image_instance
//                                                ->resize(768, null, function ($constraint) {
//                                                    $constraint->aspectRatio();
//                                                })
//                                                ->save(public_path('uploads/block_template_attributes/') . '/768/' . $image_name . '.webp');
//
//                                        case ($image_instance->width() >= 480) :
//
//                                            $image_instance->resize(480, null, function ($constraint) {
//                                                $constraint->aspectRatio();
//                                            })
//                                                ->save(public_path('uploads/block_template_attributes/') . '/480/' . $model_data['default_value']);
//
//                                            $encoded_image_instance
//                                                ->resize(480, null, function ($constraint) {
//                                                    $constraint->aspectRatio();
//                                                })
//                                                ->save(public_path('uploads/block_template_attributes/') . '/480/' . $image_name . '.webp');
//
//                                            break;
//                                    }
//                                }
                                $model = $models[$model_data['parent_id']]
                                    ->attrs()
                                    ->create($model_data);
                            }
                            break;
                        case(1):
                            $model = $models[$model_data['parent_id']]
                                ->attrs()
                                ->create($model_data);
                            break;
                        case(2):
                            $model = $models[$model_data['parent_id']]
                                ->attrs()
                                ->create($model_data);
                            break;
                        case(3):
                            $model = $models[$model_data['parent_id']]
                                ->attrs()
                                ->create($model_data);
                            break;
                        case(5):
                            $file = $request->file('attribute')[$id]['default_value'];
                            if ($file->isValid()) {
                                $fileURL = $file->store('block_template_attributes');
                                $path_ar = explode('/', $fileURL);
                                $model_data['default_value'] = end($path_ar);
                            }

                            $model = $models[$model_data['parent_id']]
                                ->attrs()
                                ->create($model_data);
                            break;

                        case(6):
                            $model = $models[$model_data['parent_id']]
                                ->attrs()
                                ->create($model_data);
                            break;

                        case(8):
                            $model = $models[$model_data['parent_id']]
                                ->attrs()
                                ->create($model_data);
                            break;
                        case(9):
                            $model = $models[$model_data['parent_id']]
                                ->attrs()
                                ->create($model_data);
                            break;


                        default:
                            break;
                    }
                    $models = Arr::add($models, $id, $model);


                }
            }
            return redirect(route('admin.block_templates.list'));

        }
    }

    /**
     * Load zip file
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function load(Request $request)
    {

        if (
            $request->hasFile('template')
            && $request->file('template')->isValid()
        ) {
            $template_name = pathinfo($request->file('template')->getClientOriginalName(), PATHINFO_FILENAME);
            $zip = Zip::open($request->file('template'));
            $zip->extract(public_path('uploads/templates/') . $template_name);

            $block_template_key = explode(';', file(public_path('uploads/templates/') . $template_name . '/block_templates.csv')[0]);
            $block_template_values = explode(';', file(public_path('uploads/templates/') . $template_name . '/block_templates.csv')[1]);
            $block_template_data = array_combine($block_template_key, $block_template_values);

            Storage::move(
                'templates/' . $template_name . '/' . $block_template_data['image_path'],
                'block_templates/' . $block_template_data['image_path']);

            $block_template = BlockTemplate::create([
                'image_path' => $block_template_data['image_path'],
                'path' => $block_template_data['path'],
                'name' => $block_template_data['name'],
                'enabled' => (int)$block_template_data['enabled'],
            ]);

            $block_template_attribute_file = file(public_path('uploads/templates/') . $template_name . '/block_template_attributes.csv');
            $block_template_attribute_key = explode(';', $block_template_attribute_file[0]);
            $block_template_data = array_slice($block_template_attribute_file, 1);

            foreach ($block_template_data as $str) {
                $block_template_attribute_value = explode(';', $str);
                $block_template_attribute_data = array_combine($block_template_attribute_key, $block_template_attribute_value);

                if (BlockTemplateAttribute::TYPE_LIST[(int)$block_template_attribute_data['type']] == 'image') {
                    Storage::move(
                        'templates/' . $template_name . '/' . $block_template_attribute_data['default_value'],
                        'block_template_attributes/' . $block_template_attribute_data['default_value']);
                }

                $attribute_data = [
                    'name' => $block_template_attribute_data['name'],
                    'default_value' => $block_template_attribute_data['default_value'],
                    'type' => (int)$block_template_attribute_data['type']
                ];
                $block_template->attributes()->create($attribute_data);
            }
        }

        return response()->json([
            'status' => true,
            'toasts' => [
                'title' => 'Шаблон "' . $template_name . '" Успешно создан',
                'body' => 'Созданный шаблон можно использовать для создания блоков на страницах.',
                'class' => 'bg-primary'
            ],
        ]);
//        die;
//        dd($attrs);
//        $block_template = array_combine(explode(';',$data[0][0]), explode(';',$data[1][0]));
//        dd($block_template);
//
//        $data = $request->all();
//
//        if(
//            $request->hasFile('template')
//            && $request->file('template')->isValid()
//        ) {
//            $imageURL = request()->file('image')->store('block_templates');
//            $path_ar = explode('/', $imageURL);
//            $data['image_path'] = end($path_ar);
//            Image::make(public_path('uploads/block_templates/') . $data['image_path'])
//                ->resize(320, 240)
//                ->save(public_path('uploads/block_templates/'). '/thumbs/'. $data['image_path']);
//        }
//
//        $rules = (new StoreBlockTemplatesRequest)->rules();
//        $data['enabled'] = isset($data['enabled']);
//        $validator = Validator::make($data, $rules);
//        if ($validator->fails()) {
//            return redirect(route('admin.block_templates.create'))
//                ->withErrors($validator)
//                ->withInput();
//        } else {
//            Block_templates::create($data);
//
//            return redirect(route('admin.block_templates.list'));
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BlockTemplate $block_template
     * @return \Illuminate\Http\Response
     */
    public function edit(BlockTemplate $block_template)
    {
        $block_template_groups = BlockTemplateGroup::all();

        return view('admin.block_templates.update', compact('block_template', 'block_template_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BlockTemplate $block_template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlockTemplate $block_template)
    {
        $data = $request->all();

        $models = [$data['id'] => $block_template];

        $block_template->groups()->sync($data['groups'] ?? []);

        $rules = (new StoreBlockTemplatesRequest)->rules();

        if (
            $request->hasFile('image')
            && $request->file('image')->isValid()
        ) {
            $imageURL = request()->file('image')->store('block_templates');

            $path_ar = explode('/', $imageURL);
            $data['image_path'] = end($path_ar);
            Image::make(public_path('uploads/block_templates/') . $data['image_path'])
                ->resize(320, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/block_templates/') . '/thumbs/' . $data['image_path']);

//            Remove old images
            Storage::delete('block_templates/' . $block_template->image_path);
            Storage::delete('block_templates/thumbs/' . $block_template->image_path);

        } else {
            unset($rules['image'], $rules['image_path']);
        }

        $block_template->update($data);

        if (isset($data['old_repeater'])) {
            foreach ($data['old_repeater'] as $id => $repeater_data) {
                $repeater_model = BlockTemplateRepeater::find($id);

                $repeater_model->update($repeater_data);

                $models[$repeater_model->id] = $repeater_model;
            }
        }

        if (isset($data['old_attribute'])) {
            foreach ($data['old_attribute'] as $id => $attribute_data) {
                $Block_template_attribute = BlockTemplateAttribute::find($id);

                if (isset($attribute_data['default_value'])) {
                    if ($Block_template_attribute->type == 0) {
                        $image = $attribute_data['default_value'];

                        $attribute_data['default_value'] = $this
                            ->imageRepository
                            ->uploadImage($image, 'block_template_attributes');

                    } elseif ($Block_template_attribute->type == 5) {
                        $file = $attribute_data['default_value'];
                        if ($file->isValid()) {
                            $fileURL = $file->store('block_template_attributes');
                            $path_ar = explode('/', $fileURL);
                            $attribute_data['default_value'] = end($path_ar);
                        }
                    }
                }

                if (isset($attribute_data['setting_properties'])) {
                        $Block_template_attribute->setting->update([
                            'properties' => $attribute_data['setting_properties']
                        ]);
                }

                $Block_template_attribute->update($attribute_data);
            }
        }

        if (isset($data['repeater'])) {
            foreach ($data['repeater'] as $id => $attribute_data) {
                $model = $models[$attribute_data['parent_id']]
                    ->repeaters()
                    ->create($attribute_data);

                $models = Arr::add($models, $id, $model);
            }
        }

        if (isset($data['attribute'])) {
            foreach ($data['attribute'] as $id => $attribute_data) {
                switch ($attribute_data['type']) {
                    case(0):
                        if ($request->hasFile("attribute.{$id}.default_value")) {
                            $image = $request->file('attribute')[$id]['default_value'];

                            $attribute_data['default_value'] = $this
                                ->imageRepository
                                ->uploadImage($image, 'block_template_attributes');

                            $model = $models[$attribute_data['parent_id']]
                                ->attrs()
                                ->create($attribute_data);
                            break;
                        }

                    case(1):
                        $model = $models[$attribute_data['parent_id']]
                            ->attrs()
                            ->create($attribute_data);
                        break;

                    case(2):
                        $model = $models[$attribute_data['parent_id']]
                            ->attrs()
                            ->create($attribute_data);
                        break;

                    case(3):
                        $model = $models[$attribute_data['parent_id']]
                            ->attrs()
                            ->create($attribute_data);
                        break;

                    case(4):
                        $model = $models[$attribute_data['parent_id']]
                            ->repeaters()
                            ->create($attribute_data);
                        break;

                    case(5):
                        if ($request->hasFile("attribute.{$id}.default_value")) {
                            $file = $request->file('attribute')[$id]['default_value'];
                            if ($file->isValid()) {
                                $fileURL = $file->store('block_template_attributes');
                                $path_ar = explode('/', $fileURL);
                                $attribute_data['default_value'] = end($path_ar);
                            }
                            $model = $models[$attribute_data['parent_id']]
                                ->attrs()
                                ->create($attribute_data);
                            break;
                        }

                    case(6):
                        $model = $models[$attribute_data['parent_id']]
                            ->attrs()
                            ->create($attribute_data);
                        break;

                    case(7):
                        $model = $models[$attribute_data['parent_id']]
                            ->attrs()
                            ->create($attribute_data);
                        break;

                    case(8):
                        $model = $models[$attribute_data['parent_id']]
                            ->attrs()
                            ->create($attribute_data);
                        break;
                    case(9):
                        $model = $models[$attribute_data['parent_id']]
                            ->attrs()
                            ->create($attribute_data);
                        break;

                    case(10):
                        $model = $models[$attribute_data['parent_id']]
                            ->attrs()
                            ->create($attribute_data);
                        break;

                    default:
                        break;
                }

                if (isset($attribute_data['setting_properties'])) {
                    $model->setting()->create([
                        'properties' => $attribute_data['setting_properties']
                    ]);
                }

                $models = Arr::add($models, $id, $model);
            }
        }

        if (isset($data['delete_repeater'])) {
            foreach ($data['delete_repeater'] as $id) {
                if ($model = BlockTemplateRepeater::find($id)) {
                    $model->delete();
                };
            }
        }

        if (isset($data['delete_attribute'])) {
            foreach ($data['delete_attribute'] as $id) {
                if ($model = BlockTemplateAttribute::find($id)) {
                    $model->delete();
                }
            }
        }

        return redirect(route('admin.block_templates.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BlockTemplate $block_templates
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlockTemplate $block_template)
    {
        $block_template->delete();
//        if ($block_template->delete()) {
        return redirect(route('admin.block_templates.list'));
//        }

    }
}
