<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\DiscountCoupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscountCouponsStoreUpdateRequest;

class DiscountCouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $discountCoupons = DiscountCoupon::simplePaginate();

        return view('modules.discountCoupon.index', compact('discountCoupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.discountCoupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscountCouponsStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DiscountCouponsStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        DiscountCoupon::create($request->validated());

        return redirect()->route('discount-coupons.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DiscountCoupon $discountCoupon
     * @return View
     */
    public function edit(DiscountCoupon $discountCoupon)
    {
        return view('modules.discountCoupon.edit', compact('discountCoupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscountCouponsStoreUpdateRequest $request
     * @param DiscountCoupon $discountCoupon
     * @return RedirectResponse
     */
    public function update(DiscountCouponsStoreUpdateRequest $request, DiscountCoupon $discountCoupon)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $discountCoupon);
        }

        try {
            $discountCoupon->update($request->validated());

            return redirect()->route('discount-coupons.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('discount-coupons.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DiscountCoupon $discountCoupon
     * @return RedirectResponse
     */
    public function destroy(DiscountCoupon $discountCoupon)
    {
        try {
            $discountCoupon->delete();

            return redirect()->route('discount-coupons.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('discount-coupons.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param DiscountCouponsStoreUpdateRequest $request
     * @param DiscountCoupon|null $discountCoupon
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(DiscountCouponsStoreUpdateRequest $request, DiscountCoupon $discountCoupon = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('discount-coupons.index');
          }

        return redirect()->route('discount-coupons.index')->withSuccess(trans($message));
    }
}
