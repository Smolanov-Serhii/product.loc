<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Role;
use App\Repositories\PermissionGroupRepository;
use App\Repositories\RoleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{

    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $roles = $this->roleRepository->all();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $role = new Role;
        $permission_groups = (new PermissionGroupRepository)->all();

        return view('admin.role.create', compact('role', 'permission_groups'));
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

        $rules = (new StoreRoleRequest)->rules();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect(route('admin.role.create'))
                ->withErrors($validator)
                ->withInput();
        } else {
            Role::create($data);

            return redirect()->route('admin.role.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return View
     */
    public function edit(Role $role)
    {
        $permission_groups = (new PermissionGroupRepository)->all();

        return view('admin.role.update', compact('role', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->all();

        $rules = (new StoreRoleRequest)->rules($role);

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect(route('admin.role.edit', ['role' => $role]))
                ->withErrors($validator)
                ->withInput();
        } else {
            $role->update($data);
            $role->permissions()->sync($data['permissions'] ?? null);

            return redirect()->route('admin.role.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return RedirectResponse
     */
    public function destroy(Role $role)
    {
        if($role->delete()){
            return redirect()->route('admin.role.index');
        }
        return back();
    }
}
