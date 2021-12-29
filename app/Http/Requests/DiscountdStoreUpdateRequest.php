<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use App\Models\Discountd;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DiscountdStoreUpdateRequest extends FormRequest
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

        return [
            'f_actiontype' => ['required', Rule::in(Discountd::$actionTypes)],
            'f_actionid' => 'required|exists:t_stock,f_id',
            'f_barcodeid' => 'required|exists:t_barcode,f_id',
            'f_discount_price' => ['required', 'numeric', new FloatRule(4)],
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
