<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Partner;
use Carbon\Carbon;
use Facade\Ignition\SolutionProviders\DefaultDbNameSolutionProvider;
use Illuminate\View\View;
use App\Models\PricePartner;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PricePartnerStoreUpdateRequest;

class PricePartnerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Partner $partner)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $todayDate = Carbon::today();

        return view('modules.pricePartner.create', compact('partner','stocks', 'todayDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PricePartnerStoreUpdateRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function store(PricePartnerStoreUpdateRequest $request, Partner $partner)
    {
        $partner->prices()->create($request->validated());

        return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @param PricePartner $pricePartner
     * @return View
     */
    public function edit(Partner $partner, PricePartner $pricePartner)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.pricePartner.edit', compact('partner', 'pricePartner', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PricePartnerStoreUpdateRequest $request
     * @param Partner $partner
     * @param PricePartner $pricePartner
     * @return RedirectResponse
     */
    public function update(PricePartnerStoreUpdateRequest $request, Partner $partner, PricePartner $pricePartner)
    {
        try {
            $pricePartner->update($request->validated());

            return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners', $partner)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @param PricePartner $pricePartner
     * @return RedirectResponse
     */
    public function destroy(Partner $partner, PricePartner $pricePartner)
    {
        try {
            $pricePartner->delete();

            return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.edit', $partner)->withError(trans('global.delete_failed'));
        }
    }
}
