<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Activation;

class ActivationController extends Controller
{
    //
    public function activate($email, $activation_code)
    {
        $user = User::whereEmail($email)->first();

        if (count($user) == 0)
            return redirect()->route('login')->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Аккаунт для активации не найден.'
                ]
            ]);

        if(Activation::complete($user, $activation_code)) {
            return redirect()->route('login')->with([
                'message' => [
                    'type' => 'success',
                    'msg'  => 'Аккаунт успешно активирован, для входа используйте E-mail и пароль указанные при регистрации.'
                ]
            ]);
        } else {
            return redirect()->route('login')->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Активировать аккаунт не удалось, вероятно не совпадает проверочный токен.'
                ]
            ]);
        }
    }
}
