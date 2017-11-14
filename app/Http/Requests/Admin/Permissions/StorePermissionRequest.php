<?php

namespace App\Http\Requests\Admin\Permissions;

use App\Rules\isRoute;
use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
                'unique:permissions',
                //new isRoute
            ],
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя разрешения обязательно для заполнения.',
            'slug.required' => 'Системное имя разрешения обязательно для заполнения.',
            'slug.unique'   => 'Указанное системное имя уже добавлено в систему.',
        ];
    }
}
