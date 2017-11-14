<?php

namespace App\Http\Responses\Admin\Permissions;

use App\Mail\UserCreated;
use App\Permission;
use App\User;
use Illuminate\Contracts\Support\Responsable;
use Sentinel;

class PermissionStoreResponse implements Responsable
{

    public function toResponse($request)
    {
        $permission = $this->create($request);

        $this->sessionAlert();

        return redirect()->route('admin.permissions.edit', ['permission' => $permission->id]);
    }

    public function create($request)
    {

        $permission = new Permission();

        $permission->slug = $request->slug;
        $permission->name = $request->name;
        $permission->description = $request->description;

        $permission->save();

        return $permission;
    }

    public function sessionAlert()
    {
        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Новое разрешение успешно создано.'
        ]);
    }

}