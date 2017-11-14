<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Option;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        \Assets::add('admin_assets');

        $options = Option::whereIn('type', ['auth', 'register'])->pluck('value', 'key');

        return view('auth.login', [
            'title'   => 'Авторизация',
            'options' => $options
        ]);
    }

    public function postLogin(Request $request)
    {
        $this->validateLogin($request);


        try {
            $rememberMe = false;

            if (isset($request->remember))
                $rememberMe = true;

            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with([
                    'message' => [
                        'type' => 'danger',
                        'msg'  => 'Пользователя с такими данными в системе не найден. Либо аккаунт еще не активирован.'
                    ]
                ]);
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();

            return redirect()->back()->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Слишком много попыток авторизации. Попробуйте через ' . $delay . ' секунд.'
                ]
            ]);
        } catch (NotActivatedException $e) {
            return redirect()->back()->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Вы не активировали свой аккаунт, ссылка для активации была отправлена на почту после регистрации аккаунта.'
                ]
            ]);
        }

    }

    public function logout()
    {
        Sentinel::logout();

        return redirect()->route('login');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|string',
        ], [
            'email.required'    => 'Укажите Ваш E-mail для авторизации.',
            'email.email'       => 'Вы указали не корректный E-mail.',
            'password.required' => 'Вы забыли указать пароль.',
            'password.string'   => 'Пароль должен быть строкой.',
        ]);
    }

}
