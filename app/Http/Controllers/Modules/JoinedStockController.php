<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use App\Models\JoinedStock;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\JoinedStockStoreUpdateRequest;

class JoinedStockController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Stock $stock
     * @return View
     */
    public function create(Stock $stock)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.joinedStock.create', compact('stock', 'stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JoinedStockStoreUpdateRequest $request
     * @param Stock $stock
     * @return RedirectResponse
     */
    public function store(JoinedStockStoreUpdateRequest $request, Stock $stock)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $stock);
        }

        $stock->joinedStocks()->create($request->validated());

        return redirect()->route('stocks.edit', $stock)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Stock $stock
     * @param JoinedStock $joinedStock
     * @return View
     */
    public function edit(Stock $stock, JoinedStock $joinedStock)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.joinedStock.edit', compact('stock', 'joinedStock', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param JoinedStockStoreUpdateRequest $request
     * @param Stock $stock
     * @param JoinedStock $joinedStock
     * @return RedirectResponse
     */
    public function update(JoinedStockStoreUpdateRequest $request, Stock $stock, JoinedStock $joinedStock)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $stock);
        }

        try {
            $joinedStock->update($request->validated());

            return redirect()->route('stocks.edit', $stock)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('stocks.edit', $stock)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Stock $stock
     * @param JoinedStock $joinedStock
     * @return RedirectResponse
     */
    public function destroy(Stock $stock, JoinedStock $joinedStock)
    {
        try {
            $joinedStock->delete();

            return redirect()->route('stocks.edit', $stock)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('stocks.edit', $stock)->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonActionWithoutValidation(JoinedStockStoreUpdateRequest $request, Stock $stock = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('stocks.edit', $stock);
        }

        return redirect()->route('production-cards.index')->withSuccess(trans($message));
    }
}
