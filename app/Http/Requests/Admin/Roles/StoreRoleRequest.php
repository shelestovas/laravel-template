<?php

namespace App\Http\Requests\Admin\Roles;

use App\Rules\isRoute;
use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'slug' => [
                'required',
                'unique:roles',
            ],
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Название роли обязательно для заполнения.',
            'slug.required' => 'Системное имя роли обязательно для заполнения.',
            'slug.unique'   => 'Указанная роль уже существует в системе.',
        ];
    }
}
