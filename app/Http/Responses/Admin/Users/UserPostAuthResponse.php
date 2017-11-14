<?php

namespace App\Http\Responses\Admin\Users;

use App\Option;
use Illuminate\Contracts\Support\Responsable;

class UserPostAuthResponse implements Responsable
{

    public function toResponse($request)
    {

        Option::where('type', 'auth')->delete();

        foreach($request->except(['_token']) as $key => $value) {
            $new_option = new Option();
            $new_option->key = $key;
            $new_option->value = $value;
            $new_option->type = 'auth';
            $new_option->save();
        }

        $this->sessionAlert();
        return redirect()->route('admin.users.settings.auth');
    }

    public function sessionAlert()
    {
        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Настройки авторизации обновлены.'
        ]);
    }


}