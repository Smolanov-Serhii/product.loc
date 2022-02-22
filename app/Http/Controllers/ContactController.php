<?php

namespace App\Http\Controllers;

use App\Models\Variable;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private static $section = 'contacts';
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Variable::where('section', $this::$section)->get();

        return view('admin.contacts.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variable = new Variable;
        return view('admin.contacts.create', compact('variable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['type'] = array_flip(Variable::TYPE_LIST)[$data['type']];
        $data['section'] = $this::$section;

        if($data['type'] == 0) {
            $imageURL = $data['value']->store('variables');
            $path_ar = explode('/', $imageURL);
            $data['value'] = end($path_ar);
        }

        $var = Variable::create($data);
        $var->translations()->create([
           'lang_id' => 3,
            'value' => $data['value'],
        ]);

        return redirect(route('admin.contacts.list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Variable $variable
     * @return \Illuminate\Http\Response
     */
    public function edit(Variable $variable)
    {
        return view('admin.contacts.update', compact('variable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variable $variable)
    {
        $data = $request->all();

        $data['type'] = array_flip(Variable::TYPE_LIST)[$data['type']];
        $data['section'] = $this::$section;

        $variable->update($data);

        if( $data['value'] && $data['type'] == 0 ) {
            $imageURL = $data['value']->store('variables');
            $path_ar = explode('/', $imageURL);
            $data['value'] = end($path_ar);
        }


        if($data['value']) {
            $variable->translate()->update([
                'lang_id' => 3,
                'value' => $data['value'],
            ]);
        }

        return redirect(route('admin.contacts.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Variable  $variable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variable $variable)
    {
        if($variable->delete()){
            return redirect()->route('admin.contacts.list');
        }

        return back();
    }
}
