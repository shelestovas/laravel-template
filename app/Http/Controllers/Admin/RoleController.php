<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Roles\RoleDataTable;
use App\Helpers\PermissionsFormatHelper;
use App\Http\Requests\Admin\Roles\StoreRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;
use App\Http\Responses\Admin\Roles\RoleDestroyResponse;
use App\Http\Responses\Admin\Roles\RoleIndexResponse;
use App\Http\Responses\Admin\Roles\RoleStoreResponse;
use App\Http\Responses\Admin\Roles\RoleUpdateResponse;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    /**
     * @param RoleDataTable $dataTable
     * @return RoleIndexResponse
     */
    public function index(RoleDataTable $dataTable)
    {
        //
        \Assets::add('admin_datatables');

        return new RoleIndexResponse($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = PermissionsFormatHelper::permissionsFormat();

        return view('admin.roles.create', [
            'title'       => 'Создание роли',
            'page_title'  => 'Создание новой роли',
            'permissions' => $permissions
        ]);
    }


    /**
     * @param StoreRoleRequest $request
     * @return RoleStoreResponse
     */
    public function store(StoreRoleRequest $request)
    {
        return new RoleStoreResponse();
    }


    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        $permissions = Permission::whereIn('slug', array_keys($role->permissions))
            ->get();

        return view('admin.roles.show', [
            'title'       => 'Информация о роли',
            'page_title'  => 'Информация о роли - ' . $role->name,
            'role'        => $role,
            'permissions' => $permissions
        ]);
    }


    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $permissions = PermissionsFormatHelper::permissionsFormat();

        return view('admin.roles.edit', [
            'title'       => 'Редактирование роли',
            'page_title'  => 'Редактирование роли - ' . $role->name,
            'role'        => $role,
            'permissions' => $permissions
        ]);
    }


    /**
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return RoleUpdateResponse
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        return new RoleUpdateResponse($role);
    }


    /**
     * @param Role $role
     * @return RoleDestroyResponse
     */
    public function destroy(Role $role)
    {
        return new RoleDestroyResponse($role);
    }
}
