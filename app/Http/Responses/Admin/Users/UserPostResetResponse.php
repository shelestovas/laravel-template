<?php

namespace App\Http\Responses\Admin\Users;

use App\Option;
use Illuminate\Contracts\Support\Responsable;

class UserPostResetResponse implements Responsable
{

    public function toResponse($request)
    {

        Option::where('type', 'reset')->delete();

        foreach($request->except(['_token']) as $key => $value) {
            $new_option = new Option();
            $new_option->key = $key;
            $new_option->value = $value;
            $new_option->type = 'reset';
            $new_option->save();
        }

        $this->sessionAlert();
        return redirect()->route('admin.users.settings.reset');
    }

    public function sessionAlert()
    {
        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Настройки сброса пароля обновлены.'
        ]);
    }


}