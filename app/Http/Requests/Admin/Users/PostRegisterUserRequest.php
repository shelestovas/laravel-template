<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRegisterUserRequest extends FormRequest
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
            'register_title'        => 'required',
            'register_btn_register' => 'required',
            'register_rule'         => 'required',
            'register_role'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'register_title.required'        => 'Поле обязательно для заполнения.',
            'register_btn_register.required' => 'Поле обязательно для заполнения.',
            'register_rule.required'         => 'Поле обязательно для заполнения.',
            'register_role.required'         => 'Поле обязательно для заполнения.',
        ];
    }
}
