<?php

namespace App\Http\Controllers;


use App\Models\ModelAddition;
use App\Models\ModelSeo;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('query');

        $page = Page::whereHas('seo', function (Builder $query) {
            $query->where('alias', 'search');
        })
            ->with(['seo', 'addition'])
            ->first();

        $module_item_props = ModelAddition::where('content', 'like', "%$query%")
            ->orWhere('excerpt', 'like', "%$query%")
            ->orWhere('title', 'like', "%$query%")
            ->get();
//        dd($module_item_props);

        return view('client.search.list', compact('module_item_props', 'query', 'page'));
    }
}
