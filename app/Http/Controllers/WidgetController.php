<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWidgetRequest;
use App\Models\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $widgets = Widget::all();

        return view('admin.widget.index', compact('widgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $widget = new Widget;

        return view('admin.widget.create', compact('widget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = (new StoreWidgetRequest)->rules();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect(route('admin.widget.create'))
                ->withErrors($validator)
                ->withInput();
        } else {
            Widget::create($data);

            return redirect()->route('admin.widget.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Widget  $widget
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Widget $widget)
    {
        return view('admin.widget.update', compact('widget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Widget  $widget
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Widget $widget)
    {
        $data = $request->all();

        $rules = (new StoreWidgetRequest)->rules($widget);

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect(route('admin.widget.edit', ['widget' => $widget]))
                ->withErrors($validator)
                ->withInput();
        } else {
            $widget->update($data);

            return redirect()->route('admin.widget.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Widget  $widget
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Widget $widget)
    {
        if($widget->delete()){
            return redirect()->route('admin.widget.index');
        }
        return back();
    }
}
