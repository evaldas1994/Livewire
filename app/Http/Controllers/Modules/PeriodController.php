<?php

namespace App\Http\Controllers\Modules;

use App\Models\Period;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PeriodStoreUpdateRequest;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $periods = Period::simplePaginate();

        return view('modules.period.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.period.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PeriodStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PeriodStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Period::create($request->validated());

        return redirect()->route('periods.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Period $period
     * @return View
     */
    public function edit(Period $period)
    {
        return view('modules.period.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PeriodStoreUpdateRequest $request
     * @param Period $period
     * @return RedirectResponse
     */
    public function update(PeriodStoreUpdateRequest $request, Period $period)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $period);
        }

        try {
            $period->update($request->validated());

            return redirect()->route('periods.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('periods.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Period $period
     * @return RedirectResponse
     */
    public function destroy(Period $period)
    {
        try {
            $period->delete();

            return redirect()->route('periods.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('periods.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param PeriodStoreUpdateRequest $request
     * @param Period|null $period
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(PeriodStoreUpdateRequest $request, Period $period = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('periods.index');
        }

        return redirect()->route('periods.index')->withSuccess(trans($message));
    }
}
