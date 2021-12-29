<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\StockGroup;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StockGroupStoreUpdateRequest;

class StockGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stockGroups = StockGroup::simplePaginate();

        return view('modules.stockGroup.index', compact('stockGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.stockGroup.create', compact('stockGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StockGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StockGroupStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        StockGroup::create($request->validated());

        return redirect()->route('stock-groups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StockGroup $stockGroup
     * @return View
     */
    public function edit(StockGroup $stockGroup)
    {
        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.stockGroup.edit', compact('stockGroup', 'stockGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StockGroupStoreUpdateRequest $request
     * @param StockGroup $stockGroup
     * @return RedirectResponse
     */
    public function update(StockGroupStoreUpdateRequest $request, StockGroup $stockGroup)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $stockGroup);
        }

        try {
            $stockGroup->update($request->validated());

            return redirect()->route('stock-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('stock-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StockGroup $stockGroup
     * @return RedirectResponse
     */
    public function destroy(StockGroup $stockGroup)
    {
        try {
            $stockGroup->delete();

            return redirect()->route('stock-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('stock-groups.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param StockGroupStoreUpdateRequest $request
     * @param StockGroup|null $stockGroup
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(StockGroupStoreUpdateRequest $request, StockGroup $stockGroup = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('stock-groups.index');

            case 'select-stock-group':
                dd('route to stock group.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('stock-groups.index')->withSuccess(trans($message));
    }
}
