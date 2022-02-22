<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTaxonomyFormRequest;
use App\Models\Taxonomy;
use App\Models\TaxonomyAttribute;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaxonomyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $taxonomies = Taxonomy::all();

        return view('admin.taxonomy.index', compact('taxonomies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $taxonomy = new Taxonomy;

        return view('admin.taxonomy.create', compact('taxonomy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $taxonomy = Taxonomy::create($data);

        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $id => $attribute) {
                if (isset($attribute['name'])) {
                    $attribute_data = [
                        'type' => array_flip(TaxonomyAttribute::TYPE_LIST)[$attribute['type']],
                        'name' => $attribute['name'],
                        'key' => $attribute['key'],
                    ];

                    $taxonomy->attrs()->create($attribute_data);
                }
            }
        }

        return redirect()->route('admin.taxonomy.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Models\Taxonomy  $taxonomy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Taxonomy $taxonomy)
    {
        $data = $request->all();

        $taxonomy->update($data);

        if(isset($data['delete_attributes'])) {
            foreach ($data['delete_attributes'] as $id) {
                TaxonomyAttribute::find($id)->delete();
            }
        }

        if (isset($data['old_attributes'])) {
            foreach ($data['old_attributes'] as $id => $attribute_data) {
                $taxonomy_attribute = TaxonomyAttribute::find($id);
                $taxonomy_attribute->update($attribute_data);
            }
        }

        if (isset($data['attributes'])) {
            foreach ($data['attributes'] as $id => $attribute) {
                if (isset($attribute['name'])) {
                    $attribute_data = [
                        'type' => array_flip(TaxonomyAttribute::TYPE_LIST)[$attribute['type']],
                        'name' => $attribute['name'],
                        'key' => $attribute['key'],
                    ];

                    $taxonomy->attrs()->create($attribute_data);
                }
            }
        }

        return redirect()->route('admin.taxonomy.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxonomy  $taxonomy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Taxonomy $taxonomy)
    {
        if($taxonomy->delete()){
            return redirect()->route('admin.taxonomy.list');
        }
        return back();
    }
}
