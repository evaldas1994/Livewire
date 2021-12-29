<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use App\Rules\IdPatternRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BarcodeStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_barcode')->ignore($this->barcode) : 'unique:t_barcode';
        return [
            'f_id' => [$unique, 'required', 'max:40', new IdPatternRule],
            'f_stockid' => 'required|exists:t_stock,f_id',
            'f_default' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_ratio'  => ['required', 'numeric', new FloatRule(4)],
            'f_name' => 'string|max:100|nullable',
            'f_neto' => ['required', 'numeric', new FloatRule(4)],
            'f_plastic' => ['required', 'numeric', new FloatRule(4)],
            'f_paper' => ['required', 'numeric', new FloatRule(4)],
            'f_glass' => ['required', 'numeric', new FloatRule(4)],
            'f_wood' => ['required', 'numeric', new FloatRule(4)],
            'f_pap1' => ['required', 'numeric', new FloatRule(4)],
            'f_pap2' => ['required', 'numeric', new FloatRule(4)],
            'f_usadid' => 'nullable|exists:t_stock,f_id',
        ];
    }
}
