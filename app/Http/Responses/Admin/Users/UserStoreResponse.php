<?php

namespace App\Http\Responses\Admin\Users;

use App\Mail\UserCreated;
use App\User;
use Illuminate\Contracts\Support\Responsable;
use Sentinel;

class UserStoreResponse implements Responsable
{

    public function toResponse($request)
    {
        $user = $this->create($request);

        if ($request->send_data) {
            \Mail::to($user->email)->send(new UserCreated($request));
        }

        $this->sessionAlert();

        return redirect()->route('admin.users.edit', ['user' => $user->id]);
    }

    public function create($request)
    {
        $credentials = [
            'name'        => $request['name'],
            'email'       => $request['email'],
            'password'    => $request['password']
        ];

        if(isset($request['permissions'])) {
            $permissions = [];
            foreach($request['permissions'] as $item) {
                $permissions[$item] = true;
            }

            $credentials['permissions'] = $permissions;
        }

        $user = Sentinel::registerAndActivate($credentials);

        $user->roles()->attach($request['roles']);

        return $user;
    }

    public function sessionAlert()
    {
        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Новый пользователь успешно создан.'
        ]);
    }

}