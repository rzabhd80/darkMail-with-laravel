<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class phoneNum implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
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
        return count_chars($value)<=10 && str_starts_with($value,"9");
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'phone number miss mach form';
    }
}
