<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\StockOperationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StockOperationGroupStoreUpdateRequest;

class StockOperationGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stockOperationGroups = StockOperationGroup::simplePaginate();

        return view('modules.stockOperationGroup.index', compact('stockOperationGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.stockOperationGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StockOperationGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StockOperationGroupStoreUpdateRequest $request)
    {
        StockOperationGroup::create($request->validated());

        return redirect()->route('stock-operation-groups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StockOperationGroup $stockOperationGroup
     * @return View
     */
    public function edit(StockOperationGroup $stockOperationGroup)
    {
        return view('modules.stockOperationGroup.edit', compact('stockOperationGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StockOperationGroupStoreUpdateRequest $request
     * @param StockOperationGroup $stockOperationGroup
     * @return RedirectResponse
     */
    public function update(StockOperationGroupStoreUpdateRequest $request, StockOperationGroup $stockOperationGroup)
    {
        try {
            $stockOperationGroup->update($request->validated());

            return redirect()->route('stock-operation-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('stock-operation-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  StockOperationGroup $stockOperationGroup
     * @return RedirectResponse
     */
    public function destroy(StockOperationGroup $stockOperationGroup)
    {
        try {
            $stockOperationGroup->delete();

            return redirect()->route('stock-operation-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('stock-operation-groups.index')->withError(trans('global.delete_failed'));
        }
    }
}
