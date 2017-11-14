<?php

namespace App\Http\Responses\Admin\Profile;

use App\User;
use Illuminate\Contracts\Support\Responsable;

class ProfileIndexResponse implements Responsable
{

    protected $user;

    /**
     * ProfileIndexResponse constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function toResponse($request)
    {
        return view('admin.profile.index')
            ->with($this->toResponseParameters());
    }

    public function toResponseParameters()
    {
        return [
            'title'      => 'Настройка личного профиля',
            'page_title' => 'Настройка профиля',
            'user'       => $this->user
        ];
    }

}