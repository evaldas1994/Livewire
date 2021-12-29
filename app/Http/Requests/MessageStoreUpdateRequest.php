<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use Illuminate\Support\Arr;
use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MessageStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_message')->ignore($this->message) : 'unique:t_message';
        return [
            'f_id' => [$unique, 'required', 'max:40', new IdPatternRule],
            'f_name' => 'nullable|max:100',
            'f_groupid' => 'required|max:20|exists:t_messagegroup,f_id',
            'f_days' => ['required', 'numeric', new FloatRule(4)],
            'f_min_sum' => ['required', 'numeric', new FloatRule(4)],
            'f_subject' => 'string|max:100|nullable',
            'f_message' => 'string|nullable',
            'f_system1' => 'max:100|nullable',
            'f_system2' => 'max:100|nullable',
            'f_system3' => 'max:100|nullable',
        ];
    }
}
