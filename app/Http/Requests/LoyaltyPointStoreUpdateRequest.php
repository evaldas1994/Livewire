<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use App\Models\LoyaltyPoints;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LoyaltyPointStoreUpdateRequest extends FormRequest
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
            'f_partner_groupid' => 'nullable|exists:t_partnergroup,f_id',
            'f_discount_card' => 'string|max:20|nullable',
            'f_operator' => ['nullable', Rule::in(LoyaltyPoints::$operatorTypes)],
            'f_validity_points' => 'nullable|date',
            'f_use_points' => 'nullable|date',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_fix_points' => 'required|date',
        ];
    }
}
