<?php

namespace App\Http\Controllers\Modules;

use App\Models\Taxd;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TaxdStoreUpdateRequest;

class TaxdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $taxesd = Taxd::simplePaginate();

        return view('modules.taxd.index', compact('taxesd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.taxd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaxdStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(TaxdStoreUpdateRequest $request)
    {
        Taxd::create($request->validated());

        return redirect()->route('taxesd.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Taxd $taxd
     * @return View
     */
    public function edit(Taxd $taxd)
    {
        return view('modules.taxd.edit', compact('taxd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TaxdStoreUpdateRequest $request
     * @param Taxd $taxd
     * @return RedirectResponse
     */
    public function update(TaxdStoreUpdateRequest $request, Taxd $taxd)
    {
        try {
            $taxd->update($request->validated());

            return redirect()->route('taxesd.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('taxesd.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Taxd $taxd
     * @return RedirectResponse
     */
    public function destroy(Taxd $taxd)
    {
        try {
            $taxd->delete();

            return redirect()->route('taxesd.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('taxesd.index')->withError(trans('global.delete_failed'));
        }
    }
}
