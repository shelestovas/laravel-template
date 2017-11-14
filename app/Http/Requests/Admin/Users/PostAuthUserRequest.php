<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostAuthUserRequest extends FormRequest
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
            'auth_title'            => 'required',
            'auth_btn_login'        => 'required',
            'auth_btn_register'     => 'required',
            'auth_reset_link'       => 'required',
            /*'register_title'        => 'required',
            'register_btn_register' => 'required',
            'register_rule'         => 'required',
            'reset_title'           => 'required',
            'reset_btn_reset'       => 'required',
            'new_password_title'    => 'required',
            'new_password_btn'      => 'required',*/
        ];
    }

    public function messages()
    {
        return [
            'auth_title.required'            => 'Поле обязательно для заполнения.',
            'auth_btn_login.required'        => 'Поле обязательно для заполнения.',
            'auth_btn_register.required'     => 'Поле обязательно для заполнения.',
            'auth_reset_link.required'       => 'Поле обязательно для заполнения.',
            /*'register_title.required'        => 'Поле обязательно для заполнения.',
            'register_btn_register.required' => 'Поле обязательно для заполнения.',
            'register_rule.required'         => 'Поле обязательно для заполнения.',
            'reset_title.required'           => 'Поле обязательно для заполнения.',
            'reset_btn_reset.required'       => 'Поле обязательно для заполнения.',
            'new_password_title.required'    => 'Поле обязательно для заполнения.',
            'new_password_btn.required'      => 'Поле обязательно для заполнения.',*/
        ];
    }
}
