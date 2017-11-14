<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'password' => 'nullable|min:6',
            'roles'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Имя пользователя обязательно для заполнения.',
            'email.required' => 'E-mail обязателен для заполнения.',
            'email.email'    => 'Указан не корректный E-mail адрес.',
            'email.unique'   => 'Указанный E-mail уже используется в системе.',
            'password.min'   => 'Минимальная длина пароля 6 символов.',
            'roles.required' => 'Добавьте роли для пользователя.',
        ];
    }
}
