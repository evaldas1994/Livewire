<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Support\Arr;
use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DiscountCouponsStoreUpdateRequest extends FormRequest
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
        if (Arr::exists($this->input(), 'button-action-without-validation')) {
            return [];
        }

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_discountcoupons')->ignore($this->discount_coupon) : 'unique:t_discountcoupons';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_activation_date' => 'nullable|date',
            'f_activation_docno' => 'string|max:20|nullable',
            'f_activation_partnerid' => 'string|max:20|nullable',
            'f_activation_storeid' => 'string|max:20|nullable',
            'f_active' => 'boolean',
            'f_nominal' => ['required', 'numeric', new FloatRule(4)],
            'f_sale_date' => 'nullable|date',
            'f_sale_docno' => 'string|max:20|nullable',
            'f_sale_partnerid' => 'string|max:20|nullable',
            'f_sale_storeid' => 'string|max:20|nullable',
            'f_sale_sum' => ['required', 'numeric', new FloatRule(4)],
            'f_valid_days' => 'nullable|integer',
            'f_valid_till' => 'nullable|date',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
