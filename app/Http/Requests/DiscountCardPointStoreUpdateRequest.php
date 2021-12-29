<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use App\Models\DiscountCardPoint;
use Illuminate\Foundation\Http\FormRequest;

class DiscountCardPointStoreUpdateRequest extends FormRequest
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
            'f_points' => ['required', 'numeric', new FloatRule(4)],
            'f_discount_card' => 'required|string|max:20',
            'f_type' => ['nullable', Rule::in(DiscountCardPoint::$types)],
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
