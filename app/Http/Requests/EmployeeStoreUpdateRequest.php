<?php

namespace App\Http\Requests;

use App\Models\Employee;
use App\Rules\FloatRule;
use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreUpdateRequest extends FormRequest
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
        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_employee')->ignore($this->employee) : 'unique:t_employee';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_name' => 'required|string|max:100',
            'f_last_name' => 'required|string|max:100',
            'f_subdivision' => 'nullable|exists:t_department,f_id',
            'f_social_insurance_id' => 'nullable|string|max:50',
            'f_adress' => 'nullable|string|max:200',
            'f_cell_phone_no' => 'nullable|string|max:50',
            'f_home_phone' => 'nullable|string|max:50',
            'f_email' => 'nullable|string|max:100|email',
            'f_personal_code' => 'required|string|max:100',
            'f_system1' => 'nullable|string|max:100',
            'f_system2' => 'nullable|string|max:100',
            'f_system3' => 'nullable|string|max:100',
            'f_uses_nti' => 'boolean',
            'f_uses_vsd' => 'boolean',
            'f_married' => ['required', Rule::in(Employee::$maritalStatusTypes)],
            'f_disablement' => ['required', Rule::in(Employee::$disablementTypes)],
            'f_sex' => ['required', Rule::in(Employee::$sexTypes)],
            'f_uses_pi' => ['required', Rule::in(Employee::$pensionInsuranceTypes)],
            'f_fired' => 'boolean',
            'f_userid' => 'nullable|exists:t_user,f_id',
            'f_holiday_balance' => ['required', 'numeric', new FloatRule(2)],
            'f_bank_account' => 'nullable|string|max:100',
            'f_direct_debit_bank' => 'nullable|exists:t_bank,f_id',
            'f_cash' => 'boolean',
            'f_work_shedule_template' => 'nullable|exists:t_work_shedule_template,f_id',
            'f_disability_perc' => ['required', Rule::in(Employee::$disablementPercentTypes)],
        ];
    }
}
