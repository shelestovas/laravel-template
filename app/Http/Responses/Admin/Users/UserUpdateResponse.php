<?php

namespace App\Http\Responses\Admin\Users;

use App\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;

class UserUpdateResponse implements Responsable
{

    protected $user;

    /**
     * UserUpdateResponse constructor.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function toResponse($request)
    {
        $this->update($request);

        $this->sessionAlert();

        return redirect()->route('admin.users.edit', ['user' => $this->user->id]);
    }

    public function update($request)
    {

        $this->user->name = $request['name'];
        $this->user->email = $request['email'];
        $this->user->password = bcrypt($request['password']);
        $this->user->permissions = [];

        if(isset($request['permissions'])) {
            $permissions = [];
            foreach($request['permissions'] as $item) {
                $permissions[$item] = true;
            }
            $this->user->permissions = $permissions;
        }

        $this->user->roles()->detach();
        $this->user->roles()->attach($request['roles']);

        $this->user->save();
    }

    public function sessionAlert()
    {
        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Данные пользователя успешно обновлены.'
        ]);
    }

}