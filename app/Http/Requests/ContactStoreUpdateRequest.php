<?php

namespace App\Http\Requests;

use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;

class ContactStoreUpdateRequest extends FormRequest
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
            'f_fullname' => 'required|max:100|nullable',
            'f_post' => 'string|max:100|nullable',
            'f_phone' => 'required|max:100|nullable',
            'f_email' => 'string|max:100|email:rfc,dns|nullable',
            'f_address' => 'string|max:100|nullable',
            'f_purpose' => 'string|max:100|nullable',
        ];
    }
}
