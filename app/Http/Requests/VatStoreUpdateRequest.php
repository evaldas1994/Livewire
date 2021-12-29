<?php

namespace App\Http\Requests;

use App\Rules\ALNUM;
use App\Rules\AlNumRule;
use App\Rules\FloatRule;
use App\Rules\IdPatternRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VatStoreUpdateRequest extends FormRequest
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
        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_vat')->ignore($this->vat) : 'unique:t_vat';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_name' => 'max:100',
            'f_vat_perc' => ['required', 'numeric', new FloatRule],
            'f_default_vat2_id' => 'nullable|exists:t_vat2,f_id',
            'f_priority_in_integrations' => 'boolean',
        ];
    }
}
