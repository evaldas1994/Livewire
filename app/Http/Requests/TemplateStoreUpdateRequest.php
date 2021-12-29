<?php

namespace App\Http\Requests;

use App\Models\Template;
use App\Rules\IdPatternRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TemplateStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_template')->ignore($this->template) : 'unique:t_template';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_op' => ['required', Rule::in(Template::$operationTypes)],
            'f_description1' => 'string|max:100|nullable',
            'f_cred_account1' => 'nullable|exists:t_account,f_id',
            'f_deb_account1' => 'nullable|exists:t_account,f_id',
            'f_name' => 'string|max:100|nullable',
            'f_description2' => 'string|max:100|nullable',
            'f_cred_account2' => 'nullable|exists:t_account,f_id',
            'f_deb_account2' => 'nullable|exists:t_account,f_id',
            'f_description3' => 'string|max:100|nullable',
            'f_cred_account3' => 'nullable|exists:t_account,f_id',
            'f_deb_account3' => 'nullable|exists:t_account,f_id',
            'f_description4' => 'string|max:100|nullable',
            'f_cred_account4' => 'nullable|exists:t_account,f_id',
            'f_deb_account4' => 'nullable|exists:t_account,f_id',
            'f_description5' => 'string|max:100|nullable',
            'f_cred_account5' => 'nullable|exists:t_account,f_id',
            'f_deb_account5' => 'nullable|exists:t_account,f_id',
            'f_description6' => 'string|max:100|nullable',
            'f_cred_account6' => 'nullable|exists:t_account,f_id',
            'f_deb_account6' => 'nullable|exists:t_account,f_id',
            'f_description7' => 'string|max:100|nullable',
            'f_cred_account7' => 'nullable|exists:t_account,f_id',
            'f_deb_account7' => 'nullable|exists:t_account,f_id',
            'f_description8' => 'string|max:100|nullable',
            'f_cred_account8' => 'nullable|exists:t_account,f_id',
            'f_deb_account8' => 'nullable|exists:t_account,f_id',
            'f_description9' => 'string|max:100|nullable',
            'f_cred_account9' => 'nullable|exists:t_account,f_id',
            'f_deb_account9' => 'nullable|exists:t_account,f_id',
            'f_description10' => 'string|max:100|nullable',
            'f_cred_account10' => 'nullable|exists:t_account,f_id',
            'f_deb_account10' => 'nullable|exists:t_account,f_id',
            'f_description11' => 'string|max:100|nullable',
            'f_cred_account11' => 'nullable|exists:t_account,f_id',
            'f_deb_account11' => 'nullable|exists:t_account,f_id',
            'f_description12' => 'string|max:100|nullable',
            'f_cred_account12' => 'nullable|exists:t_account,f_id',
            'f_deb_account12' => 'nullable|exists:t_account,f_id',
            'f_description13' => 'string|max:100|nullable',
            'f_cred_account13' => 'nullable|exists:t_account,f_id',
            'f_deb_account13' => 'nullable|exists:t_account,f_id',
            'f_description14' => 'string|max:100|nullable',
            'f_cred_account14' => 'nullable|exists:t_account,f_id',
            'f_deb_account14' => 'nullable|exists:t_account,f_id',
            'f_description15' => 'string|max:100|nullable',
            'f_cred_account15' => 'nullable|exists:t_account,f_id',
            'f_deb_account15' => 'nullable|exists:t_account,f_id',
            'f_description16' => 'string|max:100|nullable',
            'f_cred_account16' => 'nullable|exists:t_account,f_id',
            'f_deb_account16' => 'nullable|exists:t_account,f_id',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_description17' => 'string|max:100|nullable',
            'f_description18' => 'string|max:100|nullable',
            'f_description19' => 'string|max:100|nullable',
            'f_deb_account17' => 'nullable|exists:t_account,f_id',
            'f_deb_account18' => 'nullable|exists:t_account,f_id',
            'f_deb_account19' => 'nullable|exists:t_account,f_id',
            'f_cred_account17' => 'nullable|exists:t_account,f_id',
            'f_cred_account18' => 'nullable|exists:t_account,f_id',
            'f_cred_account19' => 'nullable|exists:t_account,f_id',
            'f_description20' => 'string|max:100|nullable',
            'f_cred_account20' => 'nullable|exists:t_account,f_id',
            'f_deb_account20' => 'nullable|exists:t_account,f_id',
            'f_description21' => 'string|max:100|nullable',
            'f_cred_account21' => 'nullable|exists:t_account,f_id',
            'f_deb_account21' => 'nullable|exists:t_account,f_id',
            'f_description22' => 'string|max:100|nullable',
            'f_cred_account22' => 'nullable|exists:t_account,f_id',
            'f_deb_account22' => 'nullable|exists:t_account,f_id',
            'f_consignment' => 'boolean',
            'f_primary_document' => 'boolean',
            'f_invoice_register',
            'f_description23' => 'string|max:100|nullable',
            'f_cred_account23' => 'nullable|exists:t_account,f_id',
            'f_deb_account23' => 'nullable|exists:t_account,f_id',
            'f_groupid' => 'nullable|exists:t_stockopgroup,f_id',
        ];
    }
}
