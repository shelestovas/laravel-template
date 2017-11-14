<?php

namespace App\Http\Responses\Admin\Roles;

use App\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;

class RoleUpdateResponse implements Responsable
{

    protected $role;

    /**
     * UserUpdateResponse constructor.
     */
    public function __construct($role)
    {
        $this->role = $role;
    }

    public function toResponse($request)
    {
        $this->update($request);

        $this->sessionAlert();

        return redirect()->route('admin.role.edit', ['role' => $this->role->id]);
    }

    public function update($request)
    {
        $this->role->slug = $request['slug'];
        $this->role->name = $request['name'];
        $this->role->permissions = [];

        if(isset($request['permissions'])) {
            $permissions = [];
            foreach($request['permissions'] as $item) {
                $permissions[$item] = true;
            }

            $this->role->permissions = $permissions;
        }

        $this->role->save();
    }

    public function sessionAlert()
    {
        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Данные роли успешно обновлены.'
        ]);
    }

}