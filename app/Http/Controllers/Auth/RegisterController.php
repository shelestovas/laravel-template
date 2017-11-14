<?php

namespace App\Http\Controllers\Auth;

use App\Mail\UserRegistered;
use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Sentinel;
use Activation;

class RegisterController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'terms'    => 'required'
        ], [
            'email.required'     => 'E-mail обязателен для заполнения',
            'email.string'       => 'E-mail не соответсвует формату',
            'email.email'        => 'Указан не корректный E-mail',
            'email.max'          => 'Максимальная длина E-mail адреса :max символов',
            'email.unique'       => 'Указанный E-mail адрес уже используется в системе',
            'password.required'  => 'Пароль обязателен для заполнение',
            'password.string'    => 'Пароль не соответсвует формату',
            'password.min'       => 'Минимальаня длина пароля :min символов',
            'password.confirmed' => 'Указанные пароли не совпадают',
            'terms.required'     => 'Необходимо принять правила.',
        ]);
    }


    public function showRegistrationForm()
    {
        \Assets::add('admin_assets');

        $options = Option::where('type', 'register')->pluck('value', 'key');

        if(!isset($options['register_enable'])) {
            abort(404);
        } else if($options['register_enable'] == 0) {
            abort(404);
        }

        return view('auth.register', [
            'title'   => 'Регистрация',
            'options' => $options
        ]);
    }

    public function postRegister(Request $request)
    {

        $options = Option::where('type', 'register')->pluck('value', 'key');

        if(!isset($options['register_enable'])) {
            abort(404);
        } else if($options['register_enable'] == 0) {
            abort(404);
        }

        $this->validator($request->all())->validate();

        $request->merge(['name' => $request->email]);

        //$user = Sentinel::registerAndActivate($request->all());
        $user = Sentinel::register($request->all());

        $activation = Activation::create($user);

        $defaultRole = Option::where('key', 'register_role')
            ->where('type', 'register')
            ->value('value');

        $role = Sentinel::findRoleBySlug($defaultRole);

        $role->users()->attach($user);

        Mail::to($user)->send(new UserRegistered($user, $activation));

        return redirect()->route('login')->with([
            'message' => [
                'type' => 'success',
                'msg'  => 'Спасибо за регистрацию! На указанную почту было отправленно письмо с ссылкой для активации аккаунта.'
            ]
        ]);
    }

}
