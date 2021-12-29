<?php

namespace App\Http\Controllers\Modules;

use App\Models\Currency;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CurrencyStoreUpdateRequest;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $currencies = Currency::simplePaginate();

        return view('modules.currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CurrencyStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(CurrencyStoreUpdateRequest $request)
    {
        $currency = Currency::create($request->validated());

        switch ($request->input('action')) {
            case 'currency-rates-create':
                return redirect()->route('currency-rates.create' , $currency);
        }

        return redirect()->route('currencies.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     * @return View
     */
    public function edit(Currency $currency)
    {
        $currencyRates = $currency->currencyRates;

        return view('modules.currency.edit', compact('currency', 'currencyRates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencyStoreUpdateRequest $request
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function update(CurrencyStoreUpdateRequest $request, Currency $currency)
    {
        try {
            $currency->update($request->validated());

            switch ($request->input('action')) {
                case 'currency-rates-create':
                    return redirect()->route('currency-rates.create' , $currency);
            }

            return redirect()->route('currencies.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('currencies.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function destroy(Currency $currency)
    {
        try {
            $currency->delete();

            return redirect()->route('currencies.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('currencies.index')->withError(trans('global.delete_failed'));
        }
    }
}
