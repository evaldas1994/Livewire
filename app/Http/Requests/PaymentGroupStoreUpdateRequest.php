<?php

namespace App\Http\Requests;

use App\Models\PaymentGroup;
use App\Rules\IdPatternRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentGroupStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_paymentgroup')->ignore($this->payment_group) : 'unique:t_paymentgroup';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_name' => 'string|max:100|nullable',
            'f_op' => ['required', 'string', Rule::in(PaymentGroup::$operationTypes)],
            'f_type' => ['required', 'string', Rule::in(PaymentGroup::$types)],
            'f_deb_accountid' => 'nullable|exists:t_account,f_id',
            'f_cred_accountid' => 'nullable|exists:t_account,f_id',
            'f_counterid' => 'nullable|exists:t_counter,f_id',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
