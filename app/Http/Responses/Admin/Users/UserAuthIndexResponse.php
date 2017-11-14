<?php

namespace App\Http\Responses\Admin\Users;

use App\Option;
use Illuminate\Contracts\Support\Responsable;

class UserAuthIndexResponse implements Responsable
{
    protected $options;

    public function toResponse($request)
    {
        $this->getOptions();

        return view('admin.users.settings.auth', $this->toResponseParameters());
    }

    public function getOptions()
    {
        $this->options = Option::where('type', 'auth')->pluck('value', 'key');
    }

    public function toResponseParameters()
    {
        return [
            'title'      => 'Настройки авторизации',
            'page_title' => 'Настройки авторизации',
            'options'    => $this->options
        ];
    }

}