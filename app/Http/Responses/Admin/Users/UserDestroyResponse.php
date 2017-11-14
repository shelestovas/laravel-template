<?php

namespace App\Http\Responses\Admin\Users;

use Illuminate\Contracts\Support\Responsable;

class UserDestroyResponse implements Responsable
{

    protected $user;

    /**
     * ProfileIndexResponse constructor.
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }


    public function toResponse($request)
    {

        $this->checkAdministrator();

        $this->user->delete();

        if(request()->ajax())
        {
            return [
                'result' => true,
                'msg' => 'Пользователь успешно удален из базы.'
            ];
        }

        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Пользователь успешно удален из базы.'
        ]);

        return redirect()->to(route('admin.users.index'));
    }

    public function checkAdministrator()
    {
        if($this->user->id == 1)
        {
            if(request()->ajax())
            {
                return response()->json(array('result' => 'system_error', 'notify_title' => 'Ошибка', 'msg' => 'Администратора системы удалить невозможно.', 'notify_class' => 'bg-danger'), 422);
            }

            session()->flash('alert', [
                'type'    => 'danger',
                'message' => 'Администратора системы удалить невозможно.'
            ]);

            return redirect()->to(route('admin.users.index'));
        }
    }

}