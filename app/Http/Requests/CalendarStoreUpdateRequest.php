<?php

namespace App\Http\Requests;

use App\Rules\IdPatternRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalendarStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'f_year' => 'integer|required|min:1900|max:2100',
            'f_month' => 'integer|required|min:1|max:12',
            'f_month_name' => 'string|max:20',
            'f_d1' => 'boolean',
            'f_d2' => 'boolean',
            'f_d3' => 'boolean',
            'f_d4' => 'boolean',
            'f_d5' => 'boolean',
            'f_d6' => 'boolean',
            'f_d7' => 'boolean',
            'f_d8' => 'boolean',
            'f_d9' => 'boolean',
            'f_d10' => 'boolean',
            'f_d11' => 'boolean',
            'f_d12' => 'boolean',
            'f_d13' => 'boolean',
            'f_d14' => 'boolean',
            'f_d15' => 'boolean',
            'f_d16' => 'boolean',
            'f_d17' => 'boolean',
            'f_d18' => 'boolean',
            'f_d19' => 'boolean',
            'f_d20' => 'boolean',
            'f_d21' => 'boolean',
            'f_d22' => 'boolean',
            'f_d23' => 'boolean',
            'f_d24' => 'boolean',
            'f_d25' => 'boolean',
            'f_d26' => 'boolean',
            'f_d27' => 'boolean',
            'f_d28' => 'boolean',
            'f_d29' => 'boolean',
            'f_d30' => 'boolean',
            'f_d31' => 'boolean',
        ];
    }
}
