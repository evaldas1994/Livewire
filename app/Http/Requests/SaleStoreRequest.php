<?php

namespace App\Http\Requests;

use App\Models\Stockh;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaleStoreRequest extends FormRequest
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
        $rules = [
            'f_id' => 'required|unique:t_stockh|max:20',
            //'f_op' => ['required', Rule::in(Stockh::$opTypes)],
            'f_groupid' => 'max:20',
            'f_docdate' => 'required|date',
            'f_opdate' => 'datetime',
            'f_userid' => 'max:20',
            'f_docno' => 'required|max:20',
            'f_blankno' => 'max:50',
            'f_storeid1' => 'required|max:20',
            'f_partnerid1' => 'required|max:20',
            //'f_partnerid2' => 'required|max:20',
            'f_description' => 'max:500',
            'f_templateid' => 'max:20',
            'f_method' => 'required|integer',
            'f_enter_type' => 'required|integer',
            'f_disc_type' => 'required|integer',
            'f_vat_type' => 'required|integer',
            'f_pay_days' => 'required|integer',
            'f_curid' => 'required|max:20',
            //'f_rate' => 'required|max:20',
            //'f_dim' => 'required|max:20',
            'f_adate' => 'date',
            'f_ano' => 'max:20',
            'f_calc_vat' => 'required|integer',
            'f_confirmed_stock' => 'required|integer',
            'f_confirmed_payment' => 'required|integer',
            'f_confirmed_ledger' => 'required|integer',
            'f_invoice_register' => 'required|integer',
            'f_invoice_sent' => 'required|integer',
            'f_linkedid' => 'max:20',
            'f_system1' => 'max:100',
            'f_system2' => 'max:100',
            'f_system3' => 'max:100',
            'f_discount_card' => 'max:100',
            'f_cargo_waybill_id' => 'max:20',
            'f_package_vmi_id' => 'max:20',
            'f_orderid' => 'max:20',
            'f_imp_doc_id' => 'max:20',
        ];

        if($this->has('f_partnerid1') && $this->missing('f_partnerid2')){
            $this->merge(['f_partnerid2']);
        }

        return $rules;
    }
}
