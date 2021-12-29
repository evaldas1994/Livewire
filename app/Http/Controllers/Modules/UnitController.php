<?php

namespace App\Http\Controllers\Modules;

use App\Models\Unit;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UnitStoreUpdateRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $units = Unit::simplePaginate();

        return view('modules.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(UnitStoreUpdateRequest $request)
    {
        Unit::create($request->validated());

        return redirect()->route('units.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Unit $unit
     * @return View
     */
    public function edit(Unit $unit)
    {
        return view('modules.unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitStoreUpdateRequest $request
     * @param Unit $unit
     * @return RedirectResponse
     */
    public function update(UnitStoreUpdateRequest $request, Unit $unit)
    {
        try {
            $unit->update($request->validated());

            return redirect()->route('units.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('units.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Unit $unit
     * @return RedirectResponse
     */
    public function destroy(Unit $unit)
    {
        try {
            $unit->delete();

            return redirect()->route('units.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('units.index')->withError(trans('global.delete_failed'));
        }
    }
}
