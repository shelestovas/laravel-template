<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Permissions\PermissionsDataTable;
use App\Http\Requests\Admin\Permissions\StorePermissionRequest;
use App\Http\Requests\Admin\Permissions\UpdatePermissionRequest;
use App\Http\Responses\Admin\Permissions\PermissionsIndexResponse;
use App\Http\Responses\Admin\Permissions\PermissionStoreResponse;
use App\Http\Responses\Admin\Permissions\PermissionDestroyResponse;
use App\Http\Responses\Admin\Permissions\PermissionUpdateResponse;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * @param PermissionsDataTable $dataTable
     * @return PermissionsIndexResponse
     */
    public function index(PermissionsDataTable $dataTable)
    {
        //
        \Assets::add('admin_datatables');

        return new PermissionsIndexResponse($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.permissions.create', [
            'title'      => 'Создание разрешения',
            'page_title' => 'Создание нового разрешения',
        ]);
    }

    /**
     * @param StorePermissionRequest $request
     * @return PermissionStoreResponse
     */
    public function store(StorePermissionRequest $request)
    {
        //
        return new PermissionStoreResponse();
    }


    /**
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', [
            'title'      => 'Редактирование разрешения',
            'page_title' => 'Редактирование разрешения - ' . $permission->slug,
            'permission' => $permission,
        ]);
    }


    /**
     * @param UpdatePermissionRequest $request
     * @param Permission $permission
     * @return PermissionUpdateResponse
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        return new PermissionUpdateResponse($permission);
    }


    /**
     * @param Permission $permission
     * @return PermissionDestroyResponse
     */
    public function destroy(Permission $permission)
    {
        return new PermissionDestroyResponse($permission);
    }
}
