<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Users\PostAuthUserRequest;
use App\Http\Requests\Admin\Users\PostRegisterUserRequest;
use App\Http\Requests\Admin\Users\PostResetUserRequest;
use App\Http\Responses\Admin\Users\UserAuthIndexResponse;
use App\Http\Responses\Admin\Users\UserPostAuthResponse;
use App\Http\Responses\Admin\Users\UserPostRegisterResponse;
use App\Http\Responses\Admin\Users\UserPostResetResponse;
use App\Http\Responses\Admin\Users\UserRegisterIndexResponse;
use App\Http\Responses\Admin\Users\UserResetIndexResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserSettingsController extends Controller
{
    //
    public function __construct()
    {

        \Menu::make('AdminAuthSettings', function ($menu) {
            $menu->add('Авторизация', ['route' => 'admin.users.settings.auth']);
            $menu->add('Регистрация', ['route' => 'admin.users.settings.register']);
            $menu->add('Сброс пароля', ['route' => 'admin.users.settings.reset']);
        });

    }


    public function authIndex()
    {
        return new UserAuthIndexResponse();
    }

    public function postAuth(PostAuthUserRequest $request)
    {
        return new UserPostAuthResponse($request);
    }


    public function registerIndex()
    {
        return new UserRegisterIndexResponse();
    }

    public function postRegister(PostRegisterUserRequest $request)
    {
        return new UserPostRegisterResponse($request);
    }


    public function resetIndex()
    {
        return new UserResetIndexResponse();
    }

    public function postReset(PostResetUserRequest $request)
    {
        return new UserPostResetResponse($request);
    }

}
