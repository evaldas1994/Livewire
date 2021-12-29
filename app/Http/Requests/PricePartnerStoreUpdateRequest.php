<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Foundation\Http\FormRequest;

class PricePartnerStoreUpdateRequest extends FormRequest
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
            'f_stockid' => 'required|exists:t_stock,f_id',
            'f_price' => ['required', 'numeric', new FloatRule(4)],
            'f_valid_from' => 'required|date',
            'f_valid_till' => 'nullable|date|after:f_valid_from',
            'f_active' => 'boolean',
            'f_vat_perc' => ['required', 'numeric', new FloatRule(2)],
            'f_quant' => 'required|integer|min:0|digits_between:1,13',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
