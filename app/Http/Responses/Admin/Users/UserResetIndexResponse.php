<?php

namespace App\Http\Responses\Admin\Users;

use App\Option;
use Illuminate\Contracts\Support\Responsable;

class UserResetIndexResponse implements Responsable
{
    protected $options;

    public function toResponse($request)
    {
        $this->getOptions();

        return view('admin.users.settings.reset', $this->toResponseParameters());
    }

    public function getOptions()
    {
        $this->options = Option::where('type', 'reset')->pluck('value', 'key');
    }

    public function toResponseParameters()
    {
        return [
            'title'      => 'Настройки сброса пароля',
            'page_title' => 'Настройки сброса пароля',
            'options'    => $this->options
        ];
    }

}