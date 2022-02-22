<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionGroupRequest;
use App\Models\PermissionGroup;
use App\Repositories\PermissionGroupRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PermissionGroupController extends Controller
{

    private $permissionGroupRepository;

    public function __construct(PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionGroupRepository = $permissionGroupRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $permission_groups = $this->permissionGroupRepository->all();

        return view('admin.permission_group.index', compact('permission_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $permission_group = new PermissionGroup;

        return view('admin.permission_group.create', compact('permission_group'));
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

        $rules = (new StorePermissionGroupRequest())->rules();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect(route('admin.permission_group.create'))
                ->withErrors($validator)
                ->withInput();
        } else {
            PermissionGroup::create($data);

            return redirect()->route('admin.permission_group.index');
        }
    }
}
