<?php

namespace App\Http\Controllers\Modules;

use App\Models\Stock;
use App\Models\Barcode;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BarcodeStoreUpdateRequest;

class BarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        session()->forget('queue_of_actions');

        $barcodes = Barcode::simplePaginate();

        return view('modules.barcode.index', compact('barcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_create_date', 'desc')->limit(10)->get();

        return view('modules.barcode.create', compact('stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BarcodeStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BarcodeStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Barcode::create($request->validated());

        return redirect()->route('barcodes.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Barcode $barcode
     * @return View
     */
    public function edit(Barcode $barcode)
    {
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_create_date', 'desc')->limit(10)->get();

        return view('modules.barcode.edit', compact('barcode', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BarcodeStoreUpdateRequest $request
     * @param Barcode $barcode
     * @return RedirectResponse
     */
    public function update(BarcodeStoreUpdateRequest $request, Barcode $barcode)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $barcode);
        }

        try {
            $barcode->update($request->validated());

            return redirect()->route('barcodes.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('barcodes.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Barcode $barcode
     * @return RedirectResponse
     */
    public function destroy(Barcode $barcode)
    {
        try {
            $barcode->delete();

            return redirect()->route('barcodes.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('barcodes.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonActionWithoutValidation(BarcodeStoreUpdateRequest $request, Barcode $barcode = null, string $message='global.empty')
    {
        session()->forget('queue_of_actions');

        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('barcodes.index');

            case 'select-stock':
                // get data for session
                $data = $this->getQueueOfActionsSessionData($this->getPrevRoute(), $request->input(), 'stocks.index', [], 'f_stockid');

                // push session
                session()->push('queue_of_actions', $data);

                // redirect
                return redirect()->route(Arr::get($data,'route-next.route'), Arr::get($data,'route-next.data'));

            case 'select-usad':
                $data = $this->getQueueOfActionsSessionData($this->getPrevRoute(), $request->input(), 'stocks.index', [], 'f_usadid');

                session()->push('queue_of_actions', $data);

                return redirect()->route(Arr::get($data,'route-next.route'), Arr::get($data,'route-next.data'));
        }

        return redirect()->route('barcodes.index')->withSuccess(trans($message));
    }

    private function getPrevRoute()
    {
        return app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName();
    }

    private function getQueueOfActionsSessionData($prevRoute, $prevData, $nextRoute, $nextData, $field)
    {
        $data = Arr::add([], 'route-prev.route', $prevRoute);
        $data = Arr::add($data, 'route-prev.data', $prevData);
        $data = Arr::add($data, 'route-next.route', $nextRoute);
        $data = Arr::add($data, 'route-next.data', $nextData);
        $data = Arr::add($data, 'route-prev.target_field', $field);

        return $data;
    }
}
