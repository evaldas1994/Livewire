<?php

namespace App\Http\Requests;

use App\Models\Stock;
use App\Rules\FloatRule;
use Illuminate\Support\Arr;
use App\Rules\IdPatternRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StockStoreUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if (Arr::exists($this->input(), 'button-action-without-validation')) {
            return [];
        }

        $unique = in_array($this->method(), ['PUT', 'PATCH']) ? Rule::unique('t_stock')->ignore($this->stock) : 'unique:t_stock';
        return [
            'f_id' => [$unique, 'required', 'max:20', new IdPatternRule],
            'f_name' => 'string|max:500|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_type' => ['nullable', Rule::in(Stock::$types)],
            'f_groupid' => 'nullable|exists:t_stockgroup,f_id',
            'f_unitid' => 'required|exists:t_unit,f_id',
            'f_pack_unitid' => 'nullable|exists:t_unit,f_id',
            'f_pack_quant' => ['nullable', 'numeric', new FloatRule(4)],
            'f_volume' => ['nullable', 'numeric', new FloatRule(4)],
            'f_weight' => ['nullable', 'numeric', new FloatRule(4)],
            'f_valid_days' => 'integer|min:0',
            'f_valid_date' => 'nullable|date',
            'f_partnerid' => 'nullable|exists:t_partner,f_id',
            'f_code' => 'nullable|string|max:20',
            'f_price_purch' => ['nullable', 'numeric', new FloatRule(4)],
            'f_price_sale1' => ['nullable', 'numeric', new FloatRule(4)],
            'f_price_sale2' => ['nullable', 'numeric', new FloatRule(4)],
            'f_price_sale3' => ['nullable', 'numeric', new FloatRule(4)],
            'f_price_sale4' => ['nullable', 'numeric', new FloatRule(4)],
            'f_price_sale5' => ['nullable', 'numeric', new FloatRule(4)],
            'f_discid' => 'nullable|exists:t_disch,f_id',
            'f_vat_perc' => ['nullable', 'numeric', new FloatRule(2)],
            'f_vatid' => 'required|exists:t_vat,f_id',
            'f_curid' => 'nullable|exists:t_cur,f_id',
            'f_accountid' => 'nullable|exists:t_account,f_id',
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
            'f_min_quant' => ['nullable', 'numeric', new FloatRule(4)],
            'f_weightsign' => 'boolean',
            'f_product' => 'boolean',
            'f_locked' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
            'f_scalesign' => 'boolean',
            'f_ingredients' => 'string|max:4000|nullable',
            'f_originating' => 'string|max:100|nullable',
            'f_manufacturerid' => 'nullable|exists:t_manufacturer,f_id',
            'f_quantity' => ['nullable', 'numeric', new FloatRule(4)], //on palette
            'f_stock_text1' => 'string|max:200|nullable',
            'f_stock_text2' => 'string|max:30|nullable',
            'f_stock_text3' => 'string|max:30|nullable',
            'f_packing' => 'string|max:20|nullable',
            'f_partner_discount' => ['nullable', 'numeric', new FloatRule(4)],
            'f_main_stockid' => 'nullable|exists:t_stock,f_id',
            'f_mark1' => 'boolean',
            'f_mark2' => 'boolean',
            'f_mark3' => 'boolean',
            'f_mark4' => 'boolean',
            'f_mark5' => 'boolean',
            'f_mark6' => 'boolean',
            'f_mark7' => 'boolean',
            'f_mark8' => 'boolean',
            'f_order_block' => 'boolean',
            'f_sales_block' => 'boolean',
            'f_purch_block' => 'boolean',
            'f_height' => ['nullable', 'numeric', new FloatRule(4)],
            'f_width' => ['nullable', 'numeric', new FloatRule(4)],
            'f_length' => ['nullable', 'numeric', new FloatRule(4)],
            'f_image' => 'bytea|nullable',
            'f_gpais_i' => 'boolean',
            'f_gpais_n' => 'boolean',
            'f_gpais_a' => 'boolean',
            'f_empty_pack' => 'boolean',
            'f_pack_type' => ['nullable', Rule::in(Stock::$gpaisPacTypes)],
            'f_gross_weight' => ['nullable', 'numeric', new FloatRule(4)],
            'f_catalog_item' => 'boolean',
            'f_disp_priority' => 'integer',
            'f_alternative_group_id' => 'nullable|exists:t_stockgroup,f_id',
            'f_imgurl' => 'nullable|max:500|url',
            'f_ignor_gross_weight' => 'boolean',
            'f_prevent_manual_entry' => 'boolean',
            'f_diviation_percentage' => ['nullable', 'numeric', new FloatRule(2)],
        ];
    }
}
