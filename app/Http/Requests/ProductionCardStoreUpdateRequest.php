<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use App\Rules\IdPatternRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductionCardStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_bom')->ignore($this->production_card) : 'unique:t_bom';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_name' => 'string|max:100|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_stockid' => 'required|exists:t_stock,f_id',
            'f_unitid' => 'required|exists:t_unit,f_id',
            'f_quant'=> ['required', 'numeric', new FloatRule(4)],
            'f_description' => 'nullable',
            'f_image1' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000', // max 10000kb
            'f_image2' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000',
            'f_image3' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000',
            'f_image4' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
