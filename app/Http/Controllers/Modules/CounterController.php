<?php

namespace App\Http\Controllers\Modules;

use App\Models\Counter;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CounterStoreUpdateRequest;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $counters = Counter::whereFType(1)->simplePaginate();

        return view('modules.counter.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.counter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CounterStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(CounterStoreUpdateRequest $request)
    {
        Counter::create($request->validated());

        return redirect()->route('counters.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Counter $counter
     * @return View
     */
    public function edit(Counter $counter)
    {
        return view('modules.counter.edit', compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CounterStoreUpdateRequest $request
     * @param Counter $counter
     * @return RedirectResponse
     */
    public function update(CounterStoreUpdateRequest $request, Counter $counter)
    {
        try {
            $counter->update($request->validated());

            return redirect()->route('counters.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('counters.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Counter $counter
     * @return RedirectResponse
     */
    public function destroy(Counter $counter)
    {
        try {
            $counter->delete();

            return redirect()->route('counters.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('counters.index')->withError(trans('global.delete_failed'));
        }
    }
}
