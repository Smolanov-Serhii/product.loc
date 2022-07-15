<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Variable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VariableController extends Controller
{
    private static $section = 'general';

    /**
     * Display a listing of the resource.
     * @param Variable $var
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model = Variable::where('section', $this::$section)->get();

        return view('admin.variables.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variable = new Variable;
        return view('admin.variables.create', compact('variable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['type'] = array_flip(Variable::TYPE_LIST)[$data['type']];
        $data['section'] = $this::$section;

        $var = Variable::create($data);

        foreach ($data['value'] as $iso => $value) {
            if ($data['type'] == 0) {
                $imageURL = $value->store('contents');
                $path_ar = explode('/', $imageURL);
                $value = end($path_ar);
            }


            $var->translations()->create([
                'lang_id' => Cache::get('languages')->get($iso),
                'value' => $value,
            ]);
        }

        return redirect(route('admin.variables.list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Variable $variable
     * @return \Illuminate\Http\Response
     */
    public function edit(Variable $variable)
    {
        return view('admin.variables.update', compact('variable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Variable $variable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variable $variable)
    {
        $data = $request->all();

        $data['type'] = array_flip(Variable::TYPE_LIST)[$data['type']];
        $data['section'] = $this::$section;

        $variable->update($data);

        foreach ($data['value'] as $iso => $value) {
            if ($value && $data['type'] == 0) {
                $imageURL = $value->store('variables');
                $path_ar = explode('/', $imageURL);
                $value = end($path_ar);
            }

            if ($value) {
                $translation = $variable
                    ->translations()
                    ->where('lang_id', Cache::get('languages')->get($iso))
                    ->first();

                if($translation) {
                    $translation->update([
                        'value' => $value,
                    ]);
                } else {
                    $variable->translations()->create([
                        'lang_id' => Cache::get('languages')->get($iso),
                        'value' => $value,
                    ]);
                }
            }
        }

        return redirect(route('admin.variables.list', ['groupBy' => 'general']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Variable $variable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variable $variable)
    {
        if ($variable->delete()) {
            return redirect()->route('admin.variables.list');
        }

        return back();
    }
}
