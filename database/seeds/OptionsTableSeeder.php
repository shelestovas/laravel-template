<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $options = [
            [
                'key'   => 'auth_title',
                'value' => 'Авторизация в системе',
                'type'  => 'auth',
            ],
            [
                'key'   => 'auth_subtitle',
                'value' => null,
                'type'  => 'auth',
            ],
            [
                'key'   => 'auth_btn_login',
                'value' => 'Вход <i class="icon-arrow-right14 position-right"></i>',
                'type'  => 'auth',
            ],
            [
                'key'   => 'auth_btn_register',
                'value' => 'Зарегистрироваться',
                'type'  => 'auth',
            ],
            [
                'key'   => 'auth_reset_link',
                'value' => 'Забыли пароль?',
                'type'  => 'auth',
            ],
            [
                'key'   => 'auth_policy',
                'value' => '1',
                'type'  => 'auth',
            ],
            [
                'key'   => 'reset_title',
                'value' => 'Восстановление пароля',
                'type'  => 'reset',
            ],
            [
                'key'   => 'reset_subtitle',
                'value' => 'На указанный E-mail будут отправлены инструкции по восстановлению пароля',
                'type'  => 'reset',
            ],
            [
                'key'   => 'reset_btn_reset',
                'value' => 'Восстановить <i class="icon-arrow-right14 position-right"></i>',
                'type'  => 'reset',
            ],
            [
                'key'   => 'new_password_title',
                'value' => 'Смена пароля',
                'type'  => 'reset',
            ],
            [
                'key'   => 'new_password_subtitle',
                'value' => 'Укажите новый пароль для аккаунта.',
                'type'  => 'reset',
            ],
            [
                'key'   => 'new_password_btn',
                'value' => 'Сменить пароль',
                'type'  => 'reset',
            ],
            [
                'key'   => 'register_enable',
                'value' => '1',
                'type'  => 'register',
            ],
            [
                'key'   => 'register_role',
                'value' => 'editor',
                'type'  => 'register',
            ],
            [
                'key'   => 'register_title',
                'value' => 'Регистрация',
                'type'  => 'register',
            ],
            [
                'key'   => 'register_subtitle',
                'value' => 'Все поля обязательны для заполнения',
                'type'  => 'register',
            ],
            [
                'key'   => 'register_btn_register',
                'value' => 'Регистрация <i class="icon-circle-right2 position-right"></i>',
                'type'  => 'register',
            ],
            [
                'key'   => 'register_rule',
                'value' => '<p>Текст политики</p>',
                'type'  => 'register',
            ]
        ];

        foreach ($options as $option) {
            $opt = new \App\Option();
            $opt->key = $option['key'];
            $opt->value = $option['value'];
            $opt->type = $option['type'];
            $opt->save();
        }
    }
}
