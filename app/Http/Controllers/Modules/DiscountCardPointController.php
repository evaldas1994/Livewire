<?php

namespace App\Http\Controllers\Modules;

use App\Models\Partner;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\DiscountCardPoint;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscountCardPointStoreUpdateRequest;

class DiscountCardPointController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Partner $partner)
    {
        $types = DiscountCardPoint::$types;

        return view('modules.discountCardPoint.create', compact('partner', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscountCardPointStoreUpdateRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function store(DiscountCardPointStoreUpdateRequest $request, Partner $partner)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $partner);
        }

        $partner->discountCardPoints()->create($request->validated());

        return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @param DiscountCardPoint $discountCardPoint
     * @return View
     */
    public function edit(Partner $partner, DiscountCardPoint $discountCardPoint)
    {
        $types = DiscountCardPoint::$types;

        $discountCardPoints = $partner->discountCardPoints;

        return view('modules.discountCardPoint.edit', compact('partner', 'discountCardPoint', 'types', 'discountCardPoints'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscountCardPointStoreUpdateRequest $request
     * @param Partner $partner
     * @param DiscountCardPoint $discountCardPoint
     * @return RedirectResponse
     */
    public function update(DiscountCardPointStoreUpdateRequest $request, Partner $partner, DiscountCardPoint $discountCardPoint)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $partner);
        }

        try {
            $discountCardPoint->update($request->validated());

            return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.edit', $partner)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @param DiscountCardPoint $discountCardPoint
     * @return RedirectResponse
     */
    public function destroy(Partner $partner, DiscountCardPoint $discountCardPoint)
    {
        try {
            $discountCardPoint->delete();

            return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.edit', $partner)->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param DiscountCardPointStoreUpdateRequest $request
     * @param Partner|null $partner
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(DiscountCardPointStoreUpdateRequest $request, Partner $partner = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('partners.edit', $partner);
        }

        return redirect()->route('partners.index')->withSuccess(trans($message));
    }
}
