<?php
namespace App\Helpers;

use App\Permission;

class PermissionsFormatHelper
{

    public static function permissionsFormat()
    {
        $permissionsResult = [];
        $permissions = Permission::all();
        foreach($permissions as $permission) {
            $groups = explode('.', $permission->slug);
            $permissionsResult[$groups[0]][$groups[1]][] = $permission;
        }
        return $permissionsResult;
    }

}