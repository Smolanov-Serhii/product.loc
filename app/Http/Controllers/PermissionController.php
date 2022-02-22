<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Models\Permission;
use App\Repositories\PermissionGroupRepository;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PermissionController extends Controller
{

    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $permissions = $this->permissionRepository->all();

        return view('admin.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $permission = new Permission;
        $permission_groups = (new PermissionGroupRepository)->all();

        return view('admin.permission.create', compact('permission', 'permission_groups'));
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

        $rules = (new StorePermissionRequest())->rules();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect(route('admin.permission.create'))
                ->withErrors($validator)
                ->withInput();
        } else {
            Permission::create($data);

            return redirect()->route('admin.permission.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission $permission
     * @return View
     */
    public function edit(Permission $permission)
    {
        $permission_groups = PermissionGroupRepository::all();

        return view('admin.permission.update', compact('permission', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->all();

        $rules = (new StorePermissionRequest())->rules($permission);

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect(route('admin.permission.edit', ['permission' => $permission]))
                ->withErrors($valid/forgot-passworator)
                ->withInput();
        } else {
            $permission->update($data);

            return redirect()->route('admin.permission.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
