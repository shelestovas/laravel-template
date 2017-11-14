<?php

namespace App\Http\Responses\Admin\Roles;

use Illuminate\Contracts\Support\Responsable;
use Sentinel;

class RoleStoreResponse implements Responsable
{

    public function toResponse($request)
    {

        $args = [
            'name' => $request->name,
            'slug' => $request->slug,
            'permissions' => $request->permissions
        ];

        if(isset($request['permissions'])) {
            $permissions = [];
            foreach($request['permissions'] as $item) {
                $permissions[$item] = true;
            }

            $args['permissions'] = $permissions;
        }

        $role = Sentinel::getRoleRepository()->createModel()->create($args);

        return redirect()->route('admin.role.edit', ['permission' => $role->id]);
    }



}