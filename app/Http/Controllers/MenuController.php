<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Menu_items;
use App\Models\Pages;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages = Pages::all();
        $menu_items = Menu_items::all();

        $mapped_menu = Menu::all()->mapWithKeys(function ($model) {
            $key = $model->model .'-'. $model->model_id;

            return [$key => $model];
        });

        $concated_items = $pages->concat($menu_items)->mapWithKeys(function ($model) use ($mapped_menu) {
            $key = class_basename($model) .'-'. $model->id;

            switch (class_basename($model)) {
                case 'Pages':
                    $title = $model->seo->title;
                    $alias = $model->seo->alias;
                    break;
                case 'Menu_items':
                    $title = $model->link_text;
                    $alias = $model->alias;
                    break;
            }

            if(isset($mapped_menu[$key])) {
                $data = [
                    'id' => $model->id,
                    'class_name' => class_basename($model),
                    'order' => $mapped_menu[$key]->order,
                    'checked' => true,

                ];
            } else {
                $data = [
                    'id' => $model->id,
                    'class_name' => class_basename($model),
                    'order' => 999999,
                    'checked' => false,
                ];
            }

            $data['title'] = $title;
            $data['alias'] = $alias;
            $data['type'] = class_basename($model);


//            $value = $mapped_menu[$key] ?? $model;

            return [$key => $data];
        });

        $sorted_items = $concated_items->sort(function ($a, $b) {
            return $a['order'] <=> $b['order'];
        });
//
//dd($sorted_items);

        return view('admin.menu.index', compact('sorted_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all('model');
//dd($data);
        foreach ($data as $class) {
            foreach ($class as $class_name => $items) {
                foreach ($items as $id => $item) {
                    if($class_name == 'Menu_items' && is_array($item)) {
//                        dd($item);
                        $menu_item = Menu_items::create($item);
                        $menu = Menu::firstOrCreate([
                            'model' => 'Menu_items',
                            'model_id' => $menu_item->id,
                            'section' => 'header',
                        ]);
                    } else {
                        if($item === 'true') {
                            $menu = Menu::firstOrCreate([
                                'model' => $class_name,
                                'model_id' => $id,
                                'section' => 'header',
                            ]);
                        } else {
                            Menu::where([
                                ['model', '=', $class_name],
                                ['model_id','=', $id],
                                ['section','=', 'header']
                            ])
                                ->delete();
                        }
                    }

                }
            }
        }

//        $models = Pages::all();

        return redirect(route('admin.menu.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    /**
     * Update child blocks orders.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateOrder(Request $request)
    {
        $data = $request->all();
//        dd($data);

        foreach ($data['sequence'] as $order => $model) {
//            dd($id, Menu::all());
            list($model_name, $id) = explode('-', $model);


            Menu::firstOrCreate([
                'model' => $model_name,
                'model_id' => $id
            ],[
                'section' => 'header',
                'order' => $order
            ]);
        }

        return response()
            ->json(['status' => true]);
    }
}
