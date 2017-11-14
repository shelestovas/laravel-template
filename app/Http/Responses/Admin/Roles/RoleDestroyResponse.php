<?php

namespace App\Http\Responses\Admin\Roles;

use Illuminate\Contracts\Support\Responsable;

class RoleDestroyResponse implements Responsable
{

    protected $role;

    /**
     * ProfileIndexResponse constructor.
     * @param $user
     */
    public function __construct($role)
    {
        $this->role = $role;
    }


    public function toResponse($request)
    {

        $this->role->delete();

        if(request()->ajax())
        {
            return [
                'result' => true,
                'msg' => 'Роль успешно удалена из базы.'
            ];
        }

        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Роль успешно удалена из базы.'
        ]);

        return redirect()->to(route('admin.roles.index'));
    }

}