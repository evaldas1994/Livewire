<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class ProductionhStoreUpdateRequest extends FormRequest
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
            'f_groupid' => 'nullable|exists:t_productiongroup,f_id',
            'f_docdate' => 'required|date',
            'f_blankno' => 'nullable|string|max:50',
            'f_storeid' => 'required|exists:t_store,f_id',
            'f_description' => 'string|max:200|nullable',
            'f_templateid1' => 'required|exists:t_template,f_id',
            'f_groupid1' => 'nullable|exists:t_stockopgroup,f_id',
            'f_templateid2' => 'required|exists:t_template,f_id',
            'f_groupid2' => 'nullable|exists:t_stockopgroup,f_id',
            'f_system1' => 'nullable|string|max:100',
            'f_system2' => 'nullable|string|max:100',
            'f_system3' => 'nullable|string|max:100',
        ];
    }
}
