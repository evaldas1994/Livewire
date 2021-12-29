<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Store;
use App\Models\Markup;
use App\Models\Partner;
use Illuminate\View\View;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use App\Models\StockGroup;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MarkupStoreUpdateRequest;

class MarkupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $markups = Markup::simplePaginate();

        return view('modules.markup.index', compact('markups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.markup.create', compact(
            'stocks',
            'partners',
            'stockGroups',
            'stores',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MarkupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(MarkupStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Markup::create($request->validated());

        return redirect()->route('markups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Markup $markup
     * @return View
     */
    public function edit(Markup $markup)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.markup.edit', compact(
            'markup',
            'stocks',
            'partners',
            'stockGroups',
            'stores',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MarkupStoreUpdateRequest $request
     * @param Markup $markup
     * @return RedirectResponse
     */
    public function update(MarkupStoreUpdateRequest $request, Markup $markup)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $markup);
        }

        try {
            $markup->update($request->validated());

            return redirect()->route('markups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('markups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Markup $markup
     * @return RedirectResponse
     */
    public function destroy(Markup $markup)
    {
        try {
            $markup->delete();

            return redirect()->route('markups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('markups.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param MarkupStoreUpdateRequest $request
     * @param Markup|null $markup
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(MarkupStoreUpdateRequest $request, Markup $markup = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('markups.index');

            case 'select-stock':
                dd('route to stock.index', $actionWithoutValidation[1]);

            case 'select-stock-group':
                dd('route to stock group.index', $actionWithoutValidation[1]);

            case 'select-partner':
                dd('route to partner.index', $actionWithoutValidation[1]);

            case 'select-store':
                dd('route to store.index', $actionWithoutValidation[1]);

            case 'select-register-1':
                dd('route to register 1.index', $actionWithoutValidation[1]);

            case 'select-register-2':
                dd('route to register 2.index', $actionWithoutValidation[1]);

            case 'select-register-3':
                dd('route to register 3.index', $actionWithoutValidation[1]);

            case 'select-register-4':
                dd('route to register 4.index', $actionWithoutValidation[1]);

            case 'select-register-5':
                dd('route to register 5.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('markups.index')->withSuccess(trans($message));
    }
}
