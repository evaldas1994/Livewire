<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class MarkupStoreUpdateRequest extends FormRequest
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
            'f_partnerid' => 'nullable|exists:t_partner,f_id',
            'f_groupid' => 'nullable|exists:t_stockgroup,f_id',
            'f_storeid' => 'nullable|exists:t_store,f_id',
            'f_markup_perc' => ['nullable', 'numeric', new FloatRule(2)],
            'f_include_vat' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_r1id' => 'nullable|exists:t_r1,f_id',
            'f_r2id' => 'nullable|exists:t_r2,f_id',
            'f_r3id' => 'nullable|exists:t_r3,f_id',
            'f_r4id' => 'nullable|exists:t_r4,f_id',
            'f_r5id' => 'nullable|exists:t_r5,f_id',
            'f_stockid' => 'nullable|exists:t_stock,f_id',
        ];
    }
}
