<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use App\Models\ProductionCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\ProductionCardComponent;
use App\Http\Requests\ProductionCardComponentStoreUpdateRequest;

class ProductionCardComponentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(ProductionCard $productionCard)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $types = ProductionCardComponent::$types;

        return view('modules.productionCardComponent.create', compact('productionCard','stocks', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductionCardComponentStoreUpdateRequest $request
     * @param ProductionCard $productionCard
     * @return RedirectResponse
     */
    public function store(ProductionCardComponentStoreUpdateRequest $request, ProductionCard $productionCard)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $productionCard->components()->create($request->validated());

        return redirect()->route('production-cards.edit', $productionCard)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductionCard $productionCard
     * @param ProductionCardComponent $productionCardComponent
     * @return View
     */
    public function edit(ProductionCard $productionCard, ProductionCardComponent $productionCardComponent)
    {
        $productionCardComponent = $productionCardComponent->load('stock', 'alterStock');

        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $types = ProductionCardComponent::$types;

        return view('modules.productionCardComponent.edit', compact('productionCard', 'productionCardComponent', 'stocks', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductionCardComponentStoreUpdateRequest $request
     * @param ProductionCard $productionCard
     * @param ProductionCardComponent $productionCardComponent
     * @return RedirectResponse
     */
    public function update(ProductionCardComponentStoreUpdateRequest $request, ProductionCard $productionCard, ProductionCardComponent $productionCardComponent)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        try {
            $productionCardComponent->update($request->validated());

            return redirect()->route('production-cards.edit', $productionCard)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('production-cards.edit', $productionCard)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductionCard $productionCard
     * @param ProductionCardComponent $productionCardComponent
     * @return RedirectResponse
     */
    public function destroy(ProductionCard $productionCard, ProductionCardComponent $productionCardComponent)
    {
        try {
            $productionCardComponent->delete();

            return redirect()->route('production-cards.edit', $productionCard)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('production-cards.edit', $productionCard)->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param ProductionCardComponentStoreUpdateRequest $request
     * @param ProductionCard|null $productionCard
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(ProductionCardComponentStoreUpdateRequest $request, ProductionCard $productionCard = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('production-cards.index');

            case 'select-stock':
                dd('route to stocks.index', $actionWithoutValidation[1]);

            case 'select-alter-stock':
                dd('route to stocks.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('production-cards.index')->withSuccess(trans($message));
    }
}
