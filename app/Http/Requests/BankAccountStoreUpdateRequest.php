<?php

namespace App\Http\Requests;

use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BankAccountStoreUpdateRequest extends FormRequest
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
        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_bankaccount')->ignore($this->bank_account) : 'unique:t_bankaccount';
        return [
            'f_id' => [$unique, 'required', 'max:40', new IdPatternRule],
            'f_bankid' => 'required|exists:t_bank,f_id',
            'f_default' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
