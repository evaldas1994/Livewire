<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use App\Models\Stock;
use App\Models\Price;
use App\Models\Partner;
use App\Models\Barcode;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\PartnerGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PriceStoreUpdateRequest;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $stock
     * @return mixed
     */
    public function index($stock)
    {
        $stock = Stock::findOrFail($stock);

        return $stock->prices;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Stock $stock
     * @param string $type
     * @return View
     */
    public function create(Stock $stock, string $type)
    {
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partnerGroups = PartnerGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $barcodes = Barcode::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $secondPriceTypes = Price::$secondPriceTypes;
        $paperColorTypes = Price::$paperColorTypes;

        return view('modules.price.create', compact(
            'stock',
            'type',
            'stores',
            'partnerGroups',
            'barcodes',
            'partners',
            'secondPriceTypes',
            'paperColorTypes'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PriceStoreUpdateRequest $request
     * @param Stock $stock
     * @param string $type
     * @return RedirectResponse
     */
    public function store(PriceStoreUpdateRequest $request, Stock $stock, string $type)
    {
        $data = $request->validated();
        $data = Arr::add($data, 'f_stockid', $stock->f_id);
        $data = Arr::add($data, 'f_type', $type);

        $stock->prices()->create($data);

        return redirect()->route('stocks.edit', $stock)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Stock $stock
     * @param Price $price
     * @return View
     */
    public function edit(Stock $stock, Price $price)
    {
        $stockName = $stock->f_name;
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partnerGroups = PartnerGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $barcodes = Barcode::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $secondPriceTypes = Price::$secondPriceTypes;
        $paperColorTypes = Price::$paperColorTypes;

        return view('modules.price.edit', compact(
            'stock',
            'price',
            'stores',
            'partnerGroups',
            'barcodes',
            'partners',
            'secondPriceTypes',
            'paperColorTypes',
            'stockName'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PriceStoreUpdateRequest $request
     * @param Stock $stock
     * @param Price $price
     * @return RedirectResponse
     */
    public function update(PriceStoreUpdateRequest $request, Stock $stock, Price $price)
    {
        try {
            $price->update($request->validated());

            return redirect()->route('stocks.edit', $stock)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('stocks.edit', $stock)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Stock $stock
     * @param Price $price
     * @return RedirectResponse
     */
    public function destroy(Stock $stock, Price $price)
    {
        try {
            $price->delete();

            return redirect()->route('stocks.edit', $stock)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('stocks.edit', $stock)->withError(trans('global.delete_failed'));
        }
    }
}
