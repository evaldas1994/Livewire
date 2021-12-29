<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use App\Rules\PriceByTypeRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use App\Models\ProductionCardComponent;
use Illuminate\Foundation\Http\FormRequest;

class ProductionCardComponentStoreUpdateRequest extends FormRequest
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

        $type = Arr::get($this->input(), 'f_type');
        return [
            'f_type' => ['required', Rule::in(ProductionCardComponent::$types)],
            'f_stockid' => 'required|exists:t_stock,f_id',
            'f_unitid'=> 'required|exists:t_unit,f_id',
            'f_quant' => ['numeric', new FloatRule(4)],
            'f_price' => ['nullable', 'numeric', new FloatRule(4), new PriceByTypeRule($type)],
            'f_alter_stockid' => 'nullable|exists:t_stock,f_id',
            'f_neto' => ['nullable', 'numeric', new FloatRule(4)],
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
