<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class DiscdStoreUpdateRequest extends FormRequest
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
            'f_quant' => ['required', 'numeric', new FloatRule(4)],
            'f_perc' => ['required', 'numeric', new FloatRule(2)],
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
