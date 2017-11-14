<?php

namespace App\Http\Responses\Admin\Users;

use App\Option;
use Illuminate\Contracts\Support\Responsable;

class UserPostRegisterResponse implements Responsable
{

    public function toResponse($request)
    {

        Option::where('type', 'register')->delete();

        foreach($request->except(['_token']) as $key => $value) {
            $new_option = new Option();
            $new_option->key = $key;
            $new_option->value = $value;
            $new_option->type = 'register';
            $new_option->save();
        }

        $this->sessionAlert();
        return redirect()->route('admin.users.settings.register');
    }

    public function sessionAlert()
    {
        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Настройки регистрации обновлены.'
        ]);
    }


}