<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostResetUserRequest extends FormRequest
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
            'reset_title'           => 'required',
            'reset_btn_reset'       => 'required',
            'new_password_title'    => 'required',
            'new_password_btn'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'reset_title.required'           => 'Поле обязательно для заполнения.',
            'reset_btn_reset.required'       => 'Поле обязательно для заполнения.',
            'new_password_title.required'    => 'Поле обязательно для заполнения.',
            'new_password_btn.required'      => 'Поле обязательно для заполнения.',
        ];
    }
}
