<?php

namespace App\Http\Requests;

use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class WorkSheduleTemplateStoreUpdateRequest extends FormRequest
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
        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_work_shedule_template')->ignore($this->work_shedule_template) : 'unique:t_work_shedule_template';
        return [
            'f_id' => [$unique, 'required', 'max:40', new IdPatternRule],
            'f_title' => 'required|string|max:50',
            'f_from' => 'required|date_format:H:i',
            'f_till' => 'required|date_format:H:i|after:f_from',
            'f_break_from' => 'nullable|date_format:H:i',
            'f_break_from2' => 'nullable|date_format:H:i',
            'f_break_till' => 'nullable|date_format:H:i|after:f_break_from',
            'f_break_till2' => 'nullable|date_format:H:i|after:f_break_from2',
        ];
    }
}
