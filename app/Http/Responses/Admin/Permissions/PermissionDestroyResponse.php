<?php

namespace App\Http\Responses\Admin\Permissions;

use Illuminate\Contracts\Support\Responsable;

class PermissionDestroyResponse implements Responsable
{

    protected $permission;

    /**
     * ProfileIndexResponse constructor.
     * @param $user
     */
    public function __construct($permission)
    {
        $this->permission = $permission;
    }


    public function toResponse($request)
    {

        $this->permission->delete();

        if(request()->ajax())
        {
            return [
                'result' => true,
                'msg' => 'Разрешение успешно удалено из базы.'
            ];
        }

        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Разрешение успешно удалено из базы.'
        ]);

        return redirect()->to(route('admin.permissions.index'));
    }

}