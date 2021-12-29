<?php

namespace App\Http\Requests;

use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreStoreUpdateRequest extends FormRequest
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
        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_store')->ignore($this->store) : 'unique:t_store';
        return [
            'f_id' => [$unique, 'required', 'max:40', new IdPatternRule],
            'f_name' => 'string|max:100|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_address' => 'string|max:100|nullable',
            'f_accountid' => 'nullable|exists:t_account,f_id',
            'f_f1' => 'string|max:1000|nullable',
            'f_f2' => 'string|max:1000|nullable',
            'f_f3' => 'string|max:1000|nullable',
            'f_f4' => 'string|max:1000|nullable',
            'f_f5' => 'string|max:1000|nullable',
            'f_r1id' => 'nullable|exists:t_r1,f_id',
            'f_r2id' => 'nullable|exists:t_r2,f_id',
            'f_r3id' => 'nullable|exists:t_r3,f_id',
            'f_r4id' => 'nullable|exists:t_r4,f_id',
            'f_r5id' => 'nullable|exists:t_r5,f_id',
            'f_departmentid' => 'nullable|exists:t_department,f_id',
            'f_personid' => 'nullable|exists:t_person,f_id',
            'f_projectid' => 'nullable|exists:t_project,f_id',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_store' => 'nullable|exists:t_store,f_id',
            'f_iln_edisoft' => 'string|max:20|nullable',
            'f_store_email' => 'string|max:300|nullable',
            'f_noexported' => 'boolean',
            'f_price_by_store' => 'boolean',
            'f_vat_code' => 'string|max:20|nullable',
        ];
    }
}
