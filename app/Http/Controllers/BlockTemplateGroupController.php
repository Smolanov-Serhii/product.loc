<?php

namespace App\Http\Controllers;

use App\Models\BlockTemplateGroup;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlockTemplateGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $blockTemplateGroups = BlockTemplateGroup::all();

        return view('admin.block_template_groups.index', compact('blockTemplateGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blockTemplateGroup = new BlockTemplateGroup;

        return view('admin.block_template_groups.create', compact('blockTemplateGroup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        BlockTemplateGroup::create($request->all());

        return redirect(route('admin.template.groups.list'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlockTemplateGroup  $BlockTemplateGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlockTemplateGroup $BlockTemplateGroup)
    {
        //
    }
}
