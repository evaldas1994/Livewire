<?php

namespace App\Http\Controllers\Modules;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\PartnerGroup;
use App\Models\LoyaltyPoints;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoyaltyPointStoreUpdateRequest;

class LoyaltyPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $loyaltyPoints = LoyaltyPoints::simplePaginate();

        return view('modules.loyaltyPoint.index', compact('loyaltyPoints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $partnerGroups = PartnerGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $operatorTypes = LoyaltyPoints::$operatorTypes;

        $todayDate = Carbon::today();

        return view('modules.loyaltyPoint.create', compact('partnerGroups', 'operatorTypes', 'todayDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LoyaltyPointStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(LoyaltyPointStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        LoyaltyPoints::create($request->validated());

        return redirect()->route('loyalty-points.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LoyaltyPoints $loyaltyPoint
     * @return View
     */
    public function edit(LoyaltyPoints $loyaltyPoint)
    {
        $partnerGroups = PartnerGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $operatorTypes = LoyaltyPoints::$operatorTypes;

        $todayDate = Carbon::today();

        return view('modules.loyaltyPoint.edit', compact('loyaltyPoint', 'partnerGroups', 'operatorTypes', 'todayDate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LoyaltyPointStoreUpdateRequest $request
     * @param LoyaltyPoints $loyaltyPoint
     * @return RedirectResponse
     */
    public function update(LoyaltyPointStoreUpdateRequest $request, LoyaltyPoints $loyaltyPoint)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $loyaltyPoint);
        }

        try {
            $loyaltyPoint->update($request->validated());

            return redirect()->route('loyalty-points.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('loyalty-points.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LoyaltyPoints $loyaltyPoint
     * @return RedirectResponse
     */
    public function destroy(LoyaltyPoints $loyaltyPoint)
    {
        try {
            $loyaltyPoint->delete();

            return redirect()->route('loyalty-points.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('loyalty-points.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param LoyaltyPointStoreUpdateRequest $request
     * @param LoyaltyPoints|null $loyaltyPoints
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(LoyaltyPointStoreUpdateRequest $request, LoyaltyPoints $loyaltyPoints = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('loyalty-points.index');

            case 'select-partner-group':
                dd('route to partner group.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('loyalty-points.index')->withSuccess(trans($message));
    }
}
