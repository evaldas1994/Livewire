<?php

namespace App\Http\Requests;

use App\Models\Price;
use App\Rules\FloatRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PriceStoreUpdateRequest extends FormRequest
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
            'f_price' => ['required', 'numeric', new FloatRule(4)],
            'f_price_orig' => ['required', 'numeric', new FloatRule(4)],
            'f_storeid' => 'nullable|exists:t_store,f_id',
            'f_valid_from' => 'required|date',
            'f_valid_till' => 'nullable|date',
            'f_promotion' => 'boolean',
            'f_active' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_secondprice' => ['required', Rule::in(Price::$secondPriceTypes)],
            'f_partner_groupid' => 'nullable|exists:t_partnergroup,f_id',
            'f_barcodeid' => 'nullable|exists:t_barcode,f_id',
            'f_papercolor' => ['required', Rule::in(Price::$paperColorTypes)],
            'f_partnerid' => 'nullable|exists:t_partner,f_id',
            'f_quant' => ['required', 'numeric', new FloatRule(4)],
            'f_daily' => 'boolean',
        ];
    }
}
