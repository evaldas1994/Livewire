<?php

namespace App\Http\Controllers\Modules;

use Carbon\Carbon;
use App\Models\Currency;
use Illuminate\View\View;
use App\Models\CurrencyRate;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CurrencyRateStoreUpdateRequest;

class CurrencyRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $currencyRates = CurrencyRate::simplePaginate();

        return view('modules.currencyRate.index', compact('currencyRates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Currency $currency)
    {
        $todayDate = Carbon::today();

        return view('modules.currencyRate.create', compact('currency', 'todayDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CurrencyRateStoreUpdateRequest $request
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function store(CurrencyRateStoreUpdateRequest $request, Currency $currency)
    {
        $currency->currencyRates()->create($request->validated());

        return redirect()->route('currencies.edit', $currency)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     * @param CurrencyRate $currencyRate
     * @return View
     */
    public function edit(Currency $currency, CurrencyRate $currencyRate)
    {
        return view('modules.currencyRate.edit', compact('currency', 'currencyRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencyRateStoreUpdateRequest $request
     * @param CurrencyRate $currencyRate
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function update(CurrencyRateStoreUpdateRequest $request, Currency $currency, CurrencyRate $currencyRate)
    {
        try {
            $currencyRate->update($request->validated());

            return redirect()->route('currencies.edit', $currency)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('currencies.edit', $currency)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CurrencyRate $currencyRate
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function destroy(Currency $currency, CurrencyRate $currencyRate)
    {
        try {
            $currencyRate->delete();

            return redirect()->route('currencies.edit', $currency)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('currencies.edit', $currency)->withError(trans('global.delete_failed'));
        }
    }
}
