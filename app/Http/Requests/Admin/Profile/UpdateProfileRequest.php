<?php

namespace App\Http\Requests\Admin\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'         => 'required',
            'old_password' => 'nullable|current_password|required_with:password',
            'password'     => 'nullable|required_with:old_password|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => 'Имя пользователя обязательно для заполнения.',
            'old_password.current_password' => 'Указанный пароль не совпадает с текущим.',
            'old_password.required_with'    => 'Для смены пароля укажите текущий пароль.',
            'password.required_with'        => 'Пароль обязателен для заполнения.',
            'password.min'                  => 'Минимальная длина пароля 6 символов.',
            'password.confirmed'            => 'Пароли не совпадают.',
        ];
    }

}
