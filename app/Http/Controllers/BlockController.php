<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlocksRequest;
use App\Models\Block;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Page $page)
    {
        return view('admin.block.index', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     * @param string $model
     * @param int $model_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(string $model_name, int $model_id, Request $request)
    {
        $className = "App\Models\\$model_name";
        $model = (new $className)::find($model_id);

        $data = $request->all();
        $data['enabled'] = ($data['enabled'] == 'on');
        $rules = (new StoreBlocksRequest())->rules();
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()]);
        } else {
//            $model = new ("App\Models\\{$model}");
//            dd($model);
//            $data['model'] = $model_name;
            $block = $model->blocks()->create($data);

//            $block_list = $block
//                ->page()
//                ->first()
//                ->blocks()
//                ->with('contents');

            return response()->json([
                'status' => true,
                'html' => view('admin.block.block_item', compact('block'))->render(),
                'block_id' => $block->id,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Block $block)
    {

        return response()->json([
            'status' => true,
            'form' => view('admin.block.includes.update_form', compact('block'))->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Block $block)
    {
        $data = $request->all();

        $block->update($data);
        $model = $block->blockable;

        return response()->json([
            'status' => true,
            'html' => view('admin.block.block_list', compact('model'))->render(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Block  $block
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Block $block)
    {

        return response()
            ->json(['status' => $block->delete()]);
    }

    /**
     * Update child blocks orders.
     * @param string $model
     * @param int $model_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBlocksOrder(string $model_name, int $model_id, Request $request)
    {
        $className = "App\Models\\$model_name";
        $model = (new $className)::find($model_id);

        $data = $request->all();
        foreach ($data['sequence'] as $order => $id) {
            Block::where('id', $id)
                ->update(['order' => $order]);
        }

        return response()
            ->json([
                'status' => true,
                'html' => view('admin.block.block_list', compact('model'))->render(),
            ]);
    }
}
