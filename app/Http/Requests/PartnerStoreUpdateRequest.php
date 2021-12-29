<?php

namespace App\Http\Requests;

use App\Models\Partner;
use App\Rules\FloatRule;
use App\Rules\IdPatternRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PartnerStoreUpdateRequest extends FormRequest
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

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_partner')->ignore($this->partner) : 'unique:t_partner';
        return [
            'f_id' => [$unique, 'required', 'max:40', new IdPatternRule],
            'f_name' => 'string|max:100|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_buyer'  => 'boolean',
            'f_seller' => 'boolean',
            'f_groupid' => 'nullable|exists:t_partnergroup,f_id',
            'f_code' => 'string|max:20|nullable',
            'f_vat_code' => 'string|max:20|nullable',
            'f_person' => 'string|max:100|nullable',
            'f_post' => 'string|max:100|nullable',
            'f_phone' => 'string|max:100|nullable',
            'f_fax' => 'string|max:100|nullable',
            'f_email' => 'email|max:100|nullable',
            'f_address' => 'string|max:100|nullable',
            'f_curid'  => 'nullable|exists:t_cur,f_id',
            'f_credit' => ['required', 'numeric', new FloatRule(4)],
            'f_pay_days' => 'integer|required',
            'f_price_level' => ['required', Rule::in(Partner::$priceLevelTypes)],
            'f_partnerid'  => 'nullable|exists:t_partner,f_id',
            'f_accountid1' => 'nullable|exists:t_account,f_id',
            'f_accountid2' => 'nullable|exists:t_account,f_id',
            'f_messagegroupid' => 'nullable|exists:t_messagegroup,f_id',
            'f_direct_debit' => 'boolean',
            'f_direct_debit_bank' => 'nullable|exists:t_bank,f_id',
            'f_direct_debit_code' => 'string|max:20|nullable',
            'f_direct_debit_no' => 'string|max:20|nullable',
            'f_direct_debit_limit' => ['required', 'numeric', new FloatRule(4)],
            'f_direct_debit_date1' => 'date|nullable',
            'f_direct_debit_date2' => 'date|nullable',
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
            'f_locked' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_pay_in_cash' => 'boolean',
            'f_discount_card' => 'string|max:100|nullable',
            'f_discount_card_active' => 'boolean',
            'f_discount_card_balance' => ['nullable', 'numeric', new FloatRule(4)],
            'f_sex' => ['required', Rule::in(Partner::$sexTypes)],
            'f_birthday' => 'date|nullable',
            'f_discount_card_use_count' => 'integer|nullable',
            'f_discount_card_last_use_date' => 'date|nullable',
            'f_discount_card_balance2' => ['nullable', 'numeric', new FloatRule(4)],
            'f_notgenerate_sale_price' => 'boolean',
            'f_notgenerate_purch_price' => 'boolean',
            'f_iln_edisoft' => 'string|max:20|nullable',
            'f_act_url' => 'string|max:100|nullable|url',
            'f_discount_card_balance3' => ['nullable', 'numeric', new FloatRule(4)],
            'f_discount_card_balance3_date' => 'date|nullable',
            'f_edi_storeid' => 'string|max:20|nullable',
            'f_country' => 'string|max:10|nullable',
            'f_legal_status' => ['required', Rule::in(Partner::$legalStatusTypes)],
            'f_templateid' => 'string|max:20|nullable',
            'f_templateid2' => 'string|max:20|nullable',
            'f_vatid' => 'nullable|exists:t_vat,f_id',
            'f_edi_export' => 'boolean',
            'f_mark1' => 'boolean',
            'f_mark2' => 'boolean',
            'f_mark3' => 'boolean',
            'f_mark4' => 'boolean',
            'f_mark5' => 'boolean',
            'f_use_pay_days' => 'boolean',
            'f_edi_delivery_iln' => 'string|max:20|nullable',
            'f_send_on_increase' => 'boolean',
            'f_send_on_decrease' => 'boolean',
            'f_send_weekly' => 'boolean',
            'f_sms_text1' => 'string|max:200|nullable',
            'f_sms_text2' => 'string|max:200|nullable',
            'f_sms_text3' => 'string|max:200|nullable',
        ];
    }
}
