@component('mail::message')
##{{$request->name}}, для вас создан аккаунт!

Данные для входа:

Логин - {{ $request->email }}<br />
Пароль - {{ $request->password }}

@component('mail::button', ['url' => url("login")])
Авторизоваться
@endcomponent
@endcomponent
