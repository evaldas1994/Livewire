<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PriceByTypeRule implements Rule
{
    private $type;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->type == 1 && $value != '0.0000') {
            $this->message = trans('validation.wrong_price_by_type');
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message ?: trans('validation.wrong_price_by_type');
    }
}
