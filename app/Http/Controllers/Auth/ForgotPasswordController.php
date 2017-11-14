<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Option;
use App\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        \Assets::add('admin_assets');

        $options = Option::where('type', 'reset')->pluck('value', 'key');

        return view('auth.passwords.email', [
            'title'   => 'Восстановление пароля',
            'options' => $options
        ]);
    }

    public function postForgotPassword(Request $request)
    {
        $this->validateEmail($request);

        $user = User::whereEmail($request->email)->first();

        if (count($user) == 0)
            return redirect()->back()->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Указанный логин не найден в системе.'
                ]
            ]);

        $reminder = \Reminder::exists($user) ?: \Reminder::create($user);

        $this->sendEmail($user, $reminder->code);

        return redirect()->back()->with([
            'message' => [
                'type' => 'success',
                'msg'  => 'На указанный адрес было отправленно письмо с ссылкой для смены пароля.'
            ]
        ]);
    }

    public function resetPassword($email, $code)
    {
        $user = User::whereEmail($email)->first();

        if (count($user) == 0)
            return redirect()->route('forgot-password')->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Указанный логин не найден в системе.'
                ]
            ]);

        if ($reminder = \Reminder::exists($user)) {
            if ($code == $reminder->code) {
                $options = Option::where('type', 'reset')->pluck('value', 'key');
                return view('auth.passwords.reset', [
                    'title'   => 'Восстановление пароля',
                    'options' => $options
                ]);
            } else {
                return redirect()->route('forgot-password')->with([
                    'message' => [
                        'type' => 'danger',
                        'msg'  => 'Проверочный токен не прошел проверку.'
                    ]
                ]);
            }
        } else {
            return redirect()->route('forgot-password')->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Такой проверочный токен не существует.'
                ]
            ]);
        }

    }

    public function postResetPassword(Request $request, $email, $code)
    {
        $this->validate($request, [
            'password'              => 'confirmed|required|min:6',
            'password_confirmation' => 'required|min:6'
        ], [
            'password.confirmed'             => 'Пароли не совпадают',
            'password.required'              => 'Пароль обязателен для заполнения',
            'password.min'                   => 'Минимальная длина пароля 6 символов',
            'password_confirmation.required' => 'Повторите пароль',
            'password_confirmation.min'      => 'Минимальная длина пароля 6 символов',
        ]);

        $user = User::whereEmail($email)->first();

        if (count($user) == 0)
            return redirect()->route('forgot-password')->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Указанный логин не найден в системе.'
                ]
            ]);

        if ($reminder = \Reminder::exists($user)) {
            if ($code == $reminder->code) {
                \Reminder::complete($user, $code, $request->password);

                return redirect()->route('login')->with([
                    'message' => [
                        'type' => 'success',
                        'msg'  => 'Новый пароль установлен! Используйте его для входа в систему.'
                    ]
                ]);
            } else {
                return redirect()->route('forgot-password')->with([
                    'message' => [
                        'type' => 'danger',
                        'msg'  => 'Проверочный токен не прошел проверку.'
                    ]
                ]);
            }
        } else {
            return redirect()->route('forgot-password')->with([
                'message' => [
                    'type' => 'danger',
                    'msg'  => 'Такой проверочный токен не существует.'
                ]
            ]);
        }

    }

    private function sendEmail($user, $code)
    {
        \Mail::to($user)->send(new ResetPassword($user, $code));
    }

    /**
     * Переопределение функции валидации.
     * Добавление сообщение об ошибках.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email'], [
            'email.required' => 'E-mail обязателен для заполнения',
            'email.email'    => 'Указанный E-mail не корректный'
        ]);
    }
}
