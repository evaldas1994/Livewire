<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StockGroupStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_stockgroup')->ignore($this->stock_group) : 'unique:t_stockgroup';
        return [
            'f_id' => [$unique, 'required', 'max:40', new IdPatternRule],
            'f_name' => 'string|max:100|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_allowed_from' => 'nullable|date_format:H:i',
            'f_allowed_to' => 'nullable|date_format:H:i|after:f_allowed_from',
            'f_ignore_promotion' => 'boolean',
            'f_ignore_voucher' => 'boolean',
            'f_group_level' => 'integer|nullable|min:0',
            'f_group_parent' => 'max:20|exists:t_stockgroup,f_id|nullable',
            'f_catalog_group' => 'boolean',
            'f_ignor_gross_weight' => 'boolean',
            'f_disp_priority' => 'integer',
            'f_name_short_lt' => 'string|max:100|nullable',
            'f_name_short_en' => 'string|max:100|nullable',
            'f_name_short_ru' => 'string|max:100|nullable',
            'f_imgurl' => 'string|max:500|nullable|url',
            'f_perishable_goods' => 'boolean',
            'f_age_restriction' => 'boolean',
        ];
    }
}
