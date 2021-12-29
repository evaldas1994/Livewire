<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FloatRule implements Rule
{
    private $decimal;
    private $allowNegatives;
    private $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($decimal = 2, $allowNegatives = false)
    {
        $this->decimal = $decimal;
        $this->allowNegatives = $allowNegatives;
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
        $allowNegatives = $this->allowNegatives ? '-?' : '';
        $pattern = '/^' . $allowNegatives . '[0-9]+(?:.[0-9]{1,' . $this->decimal . '})?$/';
        if (!$this->allowNegatives && $value < 0) {
            $this->message = trans('validation.no_negatives');
            return false;
        }
        return preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message ?: trans('validation.wrong_number_format');
    }
}
