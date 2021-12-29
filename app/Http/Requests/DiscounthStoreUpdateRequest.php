<?php

namespace App\Http\Requests;

use App\Rules\FloatRule;
use App\Models\Discounth;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DiscounthStoreUpdateRequest extends FormRequest
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
            'f_stockid' => 'required|exists:t_stock,f_id',
            'f_valid_from' => 'required|date',
            'f_valid_till' => 'required|date|after:f_valid_from',
            'f_buystocktype' => ['required', Rule::in(Discounth::$buyStockTypes)],
            'f_notbuystocktype' => ['required', Rule::in(Discounth::$notBuyStockTypes)],
            'f_winstocktype' => ['required', Rule::in(Discounth::$winStockTypes)],
            'f_notwinstocktype' => ['required', Rule::in(Discounth::$notWinStockTypes)],
            'f_minamount' => ['required', 'numeric', new FloatRule(4)],
            'f_maxamount' => ['required', 'numeric', new FloatRule(4)],
            'f_buyingtype' => ['required', Rule::in(Discounth::$buyingTypes)],
            'f_winningtype' => ['required', Rule::in(Discounth::$winningTypes)],
            'f_maxwinning' => ['required', 'numeric', new FloatRule(4)],
            'f_discounttype' => ['required', Rule::in(Discounth::$discountTypes)],
            'f_repeated' => ['required', Rule::in(Discounth::$repeatedTypes)],
            'f_manual' => ['required', Rule::in(Discounth::$manualTypes)],
            'f_manualinput' => ['required', Rule::in(Discounth::$manualInputTypes)],
            'f_buylineswithdisc' => ['required', Rule::in(Discounth::$buyLinesWithDiscTypes)],
            'f_winlineswithdisc' => ['required', Rule::in(Discounth::$winLinesWithDiscTypes)],
            'f_adddiscount' => ['required', Rule::in(Discounth::$addDiscountTypes)],
            'f_buylinesforbiddisc' => ['required', Rule::in(Discounth::$buyLinesForBidDiscTypes)],
            'f_winlinesforbiddisc' => ['required', Rule::in(Discounth::$winLinesForBidDiscTypes)],

            'f_showmessage' => 'boolean',
            'f_showtext' => 'string|max:1000|nullable',
            'f_printmessage' => ['required', Rule::in(Discounth::$printMessageTypes)],
            'f_printtext' => 'string|max:1000|nullable',
            'f_repeat_type' => ['required', Rule::in(Discounth::$repeatTypes)],
            'f_showpopup' => 'boolean',
            'f_daily' => 'boolean',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ];
    }
}
