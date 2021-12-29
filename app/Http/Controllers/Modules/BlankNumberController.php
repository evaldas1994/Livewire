<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use App\Models\Counter;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use App\Models\BlankNumber;
use App\Models\StockOperationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BlankNumberStoreUpdateRequest;

class BlankNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $blankNumbers = BlankNumber::simplePaginate();

        return view('modules.blankNumber.index', compact('blankNumbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $counters = Counter::select('f_id', 'f_txt')->orderBy('f_txt')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $opTypes = BlankNumber::$opTypes;
        $invoiceRegisterTypes = BlankNumber::$invoiceRegisterTypes;

        return view('modules.blankNumber.create', compact('counters', 'stores', 'stockOperationGroups', 'opTypes', 'invoiceRegisterTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlankNumberStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BlankNumberStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        BlankNumber::create($request->validated());

        return redirect()->route('blank-numbers.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BlankNumber $blankNumber
     * @return View
     */
    public function edit(BlankNumber $blankNumber)
    {
        $counters = Counter::select('f_id', 'f_txt')->orderBy('f_txt')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $opTypes = BlankNumber::$opTypes;
        $invoiceRegisterTypes = BlankNumber::$invoiceRegisterTypes;

        return view('modules.blankNumber.edit', compact('blankNumber', 'stores', 'counters', 'stockOperationGroups', 'opTypes', 'invoiceRegisterTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlankNumberStoreUpdateRequest $request
     * @param BlankNumber $blankNumber
     * @return RedirectResponse
     */
    public function update(BlankNumberStoreUpdateRequest $request, BlankNumber $blankNumber)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $blankNumber);
        }

        try {
            $blankNumber->update($request->validated());

            return redirect()->route('blank-numbers.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('blank-numbers.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BlankNumber $blankNumber
     * @return RedirectResponse
     */
    public function destroy(BlankNumber $blankNumber)
    {
        try {
            $blankNumber->delete();

            return redirect()->route('blank-numbers.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('blank-numbers.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param BlankNumberStoreUpdateRequest $request
     * @param BlankNumber|null $blankNumber
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(BlankNumberStoreUpdateRequest $request, BlankNumber $blankNumber = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('blank-numbers.index');

            case 'select-counter':
                dd('route to counter.index', $actionWithoutValidation[1]);

            case 'select-store':
                dd('route to store.index', $actionWithoutValidation[1]);

            case 'select-stock-operation-group':
                dd('route to stock operation group.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('blank-numbers.index')->withSuccess(trans($message));
    }
}
