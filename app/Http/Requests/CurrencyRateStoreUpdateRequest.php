<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Foundation\Http\FormRequest;

class CurrencyRateStoreUpdateRequest extends FormRequest
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
            'f_from' => 'required|date',
            'f_rate' => ['required', 'numeric', new FloatRule(4)],
            'f_dim' => ['required', 'numeric', new FloatRule(4)],
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
