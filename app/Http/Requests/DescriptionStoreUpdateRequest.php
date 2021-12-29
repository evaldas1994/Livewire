<?php

namespace App\Http\Requests;

use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DescriptionStoreUpdateRequest extends FormRequest
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
        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_description')->ignore($this->description) : 'unique:t_description';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_description' => 'string|max:100|nullable',
        ];
    }
}
