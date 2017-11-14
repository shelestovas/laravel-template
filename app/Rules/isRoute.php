<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class isRoute implements Rule
{
    protected $custom = [
        'admin.panel'
    ];

    /**
     * isRoute constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(in_array($value, $this->custom))
            return true;

        return \Route::has($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Указан не существующий роут.';
    }
}
