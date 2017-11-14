<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Users\UsersDataTable;
use App\Helpers\PermissionsFormatHelper;
use App\Http\Requests\Admin\Users\StoreUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Http\Responses\Admin\Users\UserDestroyResponse;
use App\Http\Responses\Admin\Users\UserIndexResponse;
use App\Http\Responses\Admin\Users\UserStoreResponse;
use App\Http\Responses\Admin\Users\UserUpdateResponse;
use App\Permission;
use Sentinel;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index(UsersDataTable $dataTable)
    {
        \Assets::add('admin_datatables');

        return new UserIndexResponse($dataTable);
    }


    public function show(User $user)
    {
        $permissions = Permission::whereIn('slug', $user->permissions)
            ->get();

        return view('admin.users.show', [
            'title'       => 'Информация о пользователе',
            'page_title'  => 'Информация о пользователе - ' . $user->name,
            'user'        => $user,
            'permissions' => $permissions
        ]);
    }

    public function create()
    {
        \Assets::add('admin/assets/js/plugins/forms/inputs/passy.js');

        $roles = Sentinel::getRoleRepository()->pluck('name', 'id')->toArray();
        $permissions = PermissionsFormatHelper::permissionsFormat();

        return view('admin.users.create', [
            'title'       => 'Создание пользователя',
            'page_title'  => 'Создание нового пользователя',
            'roles'       => $roles,
            'permissions' => $permissions
        ]);

    }

    public function edit(User $user)
    {
        \Assets::add('admin/assets/js/plugins/forms/inputs/passy.js');

        $roles = Sentinel::getRoleRepository()->pluck('name', 'id')->toArray();
        $permissions = PermissionsFormatHelper::permissionsFormat();

        return view('admin.users.edit', [
            'title'       => 'Редактирование пользователя',
            'page_title'  => 'Редактирование пользователя - ' . $user->name,
            'user'        => $user,
            'roles'       => $roles,
            'permissions' => $permissions
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        return new UserStoreResponse();
    }

    public function update(UpdateUserRequest $request, User $user)
    {

        return new UserUpdateResponse($user);
    }

    public function destroy(User $user)
    {
        return new UserDestroyResponse($user);
    }

}
