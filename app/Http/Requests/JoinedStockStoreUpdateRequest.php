<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class JoinedStockStoreUpdateRequest extends FormRequest
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
            'f_joined_stockid' => 'required|exists:t_stock,f_id',
            'f_quant' => ['nullable', 'numeric', new FloatRule(4)],
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
