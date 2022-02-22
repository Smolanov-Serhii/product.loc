<?php

namespace App\Http\Controllers;

use App\Models\Taxonomy;
use App\Models\TaxonomyAttribute;
use App\Models\TaxonomyItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TaxonomyItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Taxonomy $taxonomy)
    {
        return view('admin.taxonomy_items.index', compact('taxonomy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Taxonomy $taxonomy)
    {
        $taxonomy_item = new TaxonomyItem;
        $taxonomy_item->taxonomy = $taxonomy;

        return view('admin.taxonomy_items.create', compact('taxonomy', 'taxonomy_item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Taxonomy $taxonomy)
    {
        $data = $request->all();

        $taxonomy_item = $taxonomy->items()->create($data);

        if (isset($data['properties'])) {

            foreach ($data['properties'] as $attribute_id => $property) {
                $taxonomy_attribute = TaxonomyAttribute::find($attribute_id);

                switch ($taxonomy_attribute->type) {
                    case 0:
                        $fileURL = $property->store('taxonomy_item_property');
                        $path_ar = explode('/', $fileURL);
                        $value = end($path_ar);
                        break;
                    case 5:
                        $fileURL = $property->store('taxonomy_item_property');
                        $path_ar = explode('/', $fileURL);
                        $value = end($path_ar);
                        break;
                    default:
                        $value = $property;
                        break;
                }

                $property_data = [
                    'value' => $value,
                    'taxonomy_attribute_id' => $attribute_id
                ];


                $taxonomy_item->props()->create($property_data);
            }
        }

        return redirect()->route('admin.taxonomy.items.list', ['taxonomy' => $taxonomy]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TaxonomyItem $taxonomy_item
     * @return View
     */
    public function edit(TaxonomyItem $taxonomy_item)
    {
        $props_mapped_by_attribute_id = $taxonomy_item->props->mapWithKeys(function ($item) {
            return [$item->taxonomy_attribute_id => $item];
        });
        return view('admin.taxonomy_items.update', compact('taxonomy_item', 'props_mapped_by_attribute_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param TaxonomyItem $taxonomy_item
     * @return Redirect
     */
    public function update(Request $request, TaxonomyItem $taxonomy_item)
    {
        $data = $request->all();

        $taxonomy_item->update($data);

        if (isset($data['properties'])) {

            $props_mapped_by_attribute_id = $taxonomy_item->props->mapWithKeys(function ($item) {
                return [$item->taxonomy_attribute_id => $item];
            });

            foreach ($data['properties'] as $attribute_id => $property) {
                $taxonomy_attribute = TaxonomyAttribute::find($attribute_id);

                switch ($taxonomy_attribute->type) {
                    case 0:
                        $fileURL = $property->store('taxonomy_item_property');
                        $path_ar = explode('/', $fileURL);
                        $value = end($path_ar);
                        break;
                    case 5:
                        $fileURL = $property->store('taxonomy_item_property');
                        $path_ar = explode('/', $fileURL);
                        $value = end($path_ar);
                        break;
                    default:
                        $value = $property;
                        break;
                }

                $property_data = [
                    'value' => $value,
                    'taxonomy_attribute_id' => $attribute_id
                ];

                if (isset($props_mapped_by_attribute_id[$attribute_id])) {
                    $props_mapped_by_attribute_id[$attribute_id]->update($property_data);
                } else {
                    $taxonomy_item->props()->create($property_data);
                }
            }
        }

        return redirect()->route('admin.taxonomy.items.list', ['taxonomy' => $taxonomy_item->taxonomy]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TaxonomyItem $taxonomy_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxonomyItem $taxonomy_item)
    {
        if ($taxonomy_item->delete()) {
            return redirect()->route('admin.taxonomy.items.list', ['taxonomy' => $taxonomy_item->taxonomy]);
        }
        return back();
    }
}
