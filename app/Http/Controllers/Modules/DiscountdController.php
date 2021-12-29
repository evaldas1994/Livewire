<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Barcode;
use Illuminate\View\View;
use App\Models\Discountd;
use App\Models\Discounth;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscountdStoreUpdateRequest;

class DiscountdController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Discounth $discountsh)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $barcodes = Barcode::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $actionTypes = Discountd::$actionTypes;

        return view('modules.discountd.create', compact('discountsh','stocks','barcodes' , 'actionTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscountdStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @return RedirectResponse
     */
    public function store(DiscountdStoreUpdateRequest $request, Discounth $discountsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $discountsh);
        }

        $data = $discountsh->discountsd()->create($request->validated());

        return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Discounth $discountsh
     * @param Discountd $discountsd
     * @return View
     */
    public function edit(Discounth $discountsh, Discountd $discountsd)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $barcodes = Barcode::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $actionTypes = Discountd::$actionTypes;

        return view('modules.discounth.edit', compact('discounth', 'discountd', 'stocks', 'barcodes', 'actionTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscountdStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @param Discountd $discountsd
     * @return RedirectResponse
     */
    public function update(DiscountdStoreUpdateRequest $request, Discounth $discountsh, Discountd $discountsd)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        try {
            $discountsd->update($request->validated());

            return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.edit', $discountsh)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discounth $discountsh
     * @param Discountd $discountsd
     * @return RedirectResponse
     */
    public function destroy(Discounth $discountsh, Discountd $discountsd)
    {
        try {
            $discountsd->delete();

            return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.edit', $discountsh)->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param DiscountdStoreUpdateRequest $request
     * @param Discounth|null $discountsh
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(DiscountdStoreUpdateRequest $request, Discounth $discountsh = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('discountsh.index');

            case 'select-stock':
                dd('route to stocks.index', $actionWithoutValidation[1]);

            case 'select-barcode':
                dd('route to stocks.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('discountsh.index')->withSuccess(trans($message));
    }
}
