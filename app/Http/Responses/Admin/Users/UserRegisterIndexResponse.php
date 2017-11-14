<?php

namespace App\Http\Responses\Admin\Users;

use App\Option;
use App\Role;
use Illuminate\Contracts\Support\Responsable;

class UserRegisterIndexResponse implements Responsable
{
    protected $options;

    protected $roles;

    /**
     * UserRegisterIndexResponse constructor.
     * @param $options
     * @param $roles
     */
    public function __construct()
    {
        $this->getOptions();

        $this->getRoles();
    }


    public function toResponse($request)
    {
        \Assets::addJs('admin/ckeditor/ckeditor.js');

        return view('admin.users.settings.register', $this->toResponseParameters());
    }

    public function getOptions()
    {
        $this->options = Option::where('type', 'register')->pluck('value', 'key');
    }

    public function getRoles()
    {
        $this->roles = Role::where('id', '<>', 1)->pluck('name', 'slug');
    }

    public function toResponseParameters()
    {
        return [
            'title'      => 'Настройки регистрации',
            'page_title' => 'Настройки регистрации',
            'options'    => $this->options,
            'roles'      => $this->roles
        ];
    }

}