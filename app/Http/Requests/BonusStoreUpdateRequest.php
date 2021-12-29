<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Foundation\Http\FormRequest;

class BonusStoreUpdateRequest extends FormRequest
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
        return [
            'f_bonus_name' => 'string|max:30|nullable',
            'f_description' => 'string|max:150|nullable',
            'f_value' => ['required', 'numeric', new FloatRule(2)],
            'f_date_from' => 'date|required',
            'f_date_till' => 'date|after:f_date_from|required',
            'f_reason' => 'string|max:5|required',
            'f_type' => 'integer|nullable',
        ];
    }
}
