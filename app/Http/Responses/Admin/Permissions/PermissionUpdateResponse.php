<?php

namespace App\Http\Responses\Admin\Permissions;

use App\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;

class PermissionUpdateResponse implements Responsable
{

    protected $permission;

    /**
     * UserUpdateResponse constructor.
     */
    public function __construct($permission)
    {
        $this->permission = $permission;
    }

    public function toResponse($request)
    {
        $this->update($request);

        $this->sessionAlert();

        return redirect()->route('admin.permissions.edit', ['permission' => $this->permission->id]);
    }

    public function update($request)
    {
        $this->permission->slug = $request['slug'];
        $this->permission->name = $request['name'];
        $this->permission->description = $request['description'];

        $this->permission->save();
    }

    public function sessionAlert()
    {
        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Данные разрешения успешно обновлены.'
        ]);
    }

}