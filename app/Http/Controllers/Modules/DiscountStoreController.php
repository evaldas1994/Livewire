<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Store;
use Illuminate\View\View;
use App\Models\Discounth;
use Illuminate\Support\Arr;
use App\Models\DiscountStore;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscountStoreStoreUpdateRequest;

class DiscountStoreController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Discounth $discountsh)
    {
        $discountStores = $discountsh->stores;

        return view('modules.discountStore.create', compact('discountsh','discountStores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscountStoreStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @return RedirectResponse
     */
    public function store(DiscountStoreStoreUpdateRequest $request, Discounth $discountsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $discountsh->stores()->create($request->validated());

        return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Discounth $discountsh
     * @param DiscountStore $discountStore
     * @return View
     */
    public function edit(Discounth $discountsh, DiscountStore $discountStore)
    {
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.discountStore.edit', compact('discountsh', 'discountStore', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscountStoreStoreUpdateRequest $request
     * @param Discounth $discountsh
     * @param DiscountStore $discountStore
     * @return RedirectResponse
     */
    public function update(DiscountStoreStoreUpdateRequest $request, Discounth $discountsh, DiscountStore $discountStore)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $discountsh);
        }

        try {
            $discountStore->update($request->validated());

            return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.edit', $discountsh)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Discounth $discountsh
     * @param DiscountStore $discountStore
     * @return RedirectResponse
     */
    public function destroy(Discounth $discountsh, DiscountStore $discountStore)
    {
        try {
            $discountStore->delete();

            return redirect()->route('discountsh.edit', $discountsh)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('discountsh.edit', $discountsh)->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param DiscountStoreStoreUpdateRequest $request
     * @param Discounth|null $discounth
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(DiscountStoreStoreUpdateRequest $request, Discounth $discounth = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('production-cards.index');

            case 'select-store':
                dd('route to store.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('production-cards.index')->withSuccess(trans($message));
    }
}
