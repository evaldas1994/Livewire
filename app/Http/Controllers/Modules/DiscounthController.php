<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Store;
use App\Models\Barcode;
use App\Models\Discountd;
use App\Models\Discounth;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscounthStoreUpdateRequest;

class DiscounthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $discounts = Discounth::simplePaginate();

        return view('modules.discounth.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $buyStockTypes = Discounth::$buyStockTypes;
        $notBuyStockTypes = Discounth::$notBuyStockTypes;
        $winStockTypes = Discounth::$winStockTypes;
        $notWinStockTypes = Discounth::$notWinStockTypes;
        $buyingTypes = Discounth::$buyingTypes;
        $winningTypes = Discounth::$winningTypes;
        $discountTypes = Discounth::$discountTypes;
        $repeatedTypes = Discounth::$repeatedTypes;
        $manualTypes = Discounth::$manualTypes;
        $manualInputTypes = Discounth::$manualInputTypes;
        $buyLinesWithDiscTypes = Discounth::$buyLinesWithDiscTypes;
        $winLinesWithDiscTypes = Discounth::$winLinesWithDiscTypes;
        $addDiscountTypes = Discounth::$addDiscountTypes;
        $buyLinesForBidDiscTypes = Discounth::$buyLinesForBidDiscTypes;
        $winLinesForBidDiscTypes = Discounth::$winLinesForBidDiscTypes;
        $printMessageTypes = Discounth::$printMessageTypes;
        $repeatTypes = Discounth::$repeatTypes;

        return view('modules.discounth.create', compact(
            'stocks',
            'buyStockTypes',
            'notBuyStockTypes',
            'winStockTypes',
            'notWinStockTypes',
            'buyingTypes',
            'winningTypes',
            'discountTypes',
            'repeatedTypes',
            'manualTypes',
            'manualInputTypes',
            'buyLinesWithDiscTypes',
            'winLinesWithDiscTypes',
            'addDiscountTypes',
            'buyLinesForBidDiscTypes',
            'winLinesForBidDiscTypes',
            'printMessageTypes',
            'repeatTypes',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscounthStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DiscounthStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $discounth = Discounth::create($request->validated());

        return $this->checkButtonAction($request, $discounth, 'global.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Discounth $discountsh
     * @return View
     */
    public function edit(Discounth $discountsh)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $barcodes = Barcode::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $buyStockTypes = Discounth::$buyStockTypes;
        $notBuyStockTypes = Discounth::$notBuyStockTypes;
        $winStockTypes = Discounth::$winStockTypes;
        $notWinStockTypes = Discounth::$notWinStockTypes;
        $buyingTypes = Discounth::$buyingTypes;
        $winningTypes = Discounth::$winningTypes;
        $discountTypes = Discounth::$discountTypes;
        $repeatedTypes = Discounth::$repeatedTypes;
        $manualTypes = Discounth::$manualTypes;
        $manualInputTypes = Discounth::$manualInputTypes;
        $buyLinesWithDiscTypes = Discounth::$buyLinesWithDiscTypes;
        $winLinesWithDiscTypes = Discounth::$winLinesWithDiscTypes;
        $addDiscountTypes = Discounth::$addDiscountTypes;
        $buyLinesForBidDiscTypes = Discounth::$buyLinesForBidDiscTypes;
        $winLinesForBidDiscTypes = Discounth::$winLinesForBidDiscTypes;
        $printMessageTypes = Discounth::$printMessageTypes;
        $repeatTypes = Discounth::$repeatTypes;
        $actionTypes = Discountd::$actionTypes;

        $discountStores = $discountsh->stores;
        $allDiscountsd = $discountsh->discountsd;

        return view('modules.discounth.edit', compact(
            'discountsh',
            'stocks',
            'stores',
            'barcodes',
            'buyStockTypes',
            'notBuyStockTypes',
            'winStockTypes',
            'notWinStockTypes',
            'buyingTypes',
            'winningTypes',
            'discountTypes',
            'repeatedTypes',
            'manualTypes',
            'manualInputTypes',
            'buyLinesWithDiscTypes',
            'winLinesWithDiscTypes',
            'addDiscountTypes',
            'buyLinesForBidDiscTypes',
            'winLinesForBidDiscTypes',
            'printMessageTypes',
            'repeatTypes',
            'discountStores',
            'actionTypes',
            'allDiscountsd'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscounthStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @return RedirectResponse
     */
    public function update(DiscounthStoreUpdateRequest $request, Discounth $discountsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $discountsh);
        }

        try {

            $discountsh->update($request->validated());
        } catch (\Exception) {
            return redirect()->route('discountsh.index')->withError(trans('global.update_failed'));
        }

        return $this->checkButtonAction($request, $discountsh, 'global.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discounth $discountsh
     * @return RedirectResponse
     */
    public function destroy(Discounth $discountsh)
    {
        try {
            $discountsh->delete();

            return redirect()->route('discountsh.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param DiscounthStoreUpdateRequest $request
     * @param Discounth $discounth
     * @param string $message
     * @return mixed
     */
    private function checkButtonAction(DiscounthStoreUpdateRequest $request, Discounth $discounth, string $message='global.empty')
    {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'discount-store-create':
                return redirect()->route('discountsh.edit', $discounth);

            case 'discountd-create':
                return redirect()->route('discountsh.edit', $discounth);
        }

        return redirect()->route('discountsh.index')->withSuccess(trans($message));
    }

    /**
     * @param DiscounthStoreUpdateRequest $request
     * @param Discounth|null $discounth
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(DiscounthStoreUpdateRequest $request, Discounth $discounth = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('discountsh.index');

            case 'select-stock':
                dd('route to stock.index', $actionWithoutValidation[1]);

                case 'select-barcode':
                dd('route to barcode.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('production-cards.index')->withSuccess(trans($message));
    }

}
