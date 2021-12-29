<?php

namespace App\Http\Requests;

use App\Models\Account;
use Illuminate\Support\Arr;
use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AccountStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_account')->ignore($this->account) : 'unique:t_account';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_name' => 'string|max:100|nullable',
            'f_groupid' => 'string|max:20|nullable|exists:t_accountgroup,f_id',
            'f_type' => ['required', Rule::in(Account::$types)],
            'f_purpose' => ['required', Rule::in(Account::$purposeTypes)],
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_vmi_code' => 'string|max:20|nullable',
        ];
    }
}
