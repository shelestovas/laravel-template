@component('mail::message')
##Спасибо за регистрацию, {{$user->name}}!

Перейдите по ссылке чтобы завершить регистрацию!

@component('mail::button', ['url' => url("activate/{$user->email}/{$activation->code}")])
Активировать аккаунт
@endcomponent
@endcomponent
