<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\CustomReason;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CustomReasonCreateUpdateRequest;

class CustomReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $customReasons = CustomReason::simplePaginate();

        return view('modules.customReason.index', compact('customReasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.customReason.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomReasonCreateUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(CustomReasonCreateUpdateRequest $request)
    {
        CustomReason::create($request->validated());

        return redirect()->route('custom-reasons.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CustomReason $customReason
     * @return View
     */
    public function edit(CustomReason $customReason)
    {
        return view('modules.customReason.edit', compact('customReason'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomReasonCreateUpdateRequest $request
     * @param CustomReason $customReason
     * @return RedirectResponse
     */
    public function update(CustomReasonCreateUpdateRequest $request, CustomReason $customReason)
    {
        try {
            $customReason->update($request->validated());

            return redirect()->route('custom-reasons.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('custom-reasons.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CustomReason $customReason
     * @return RedirectResponse
     */
    public function destroy(CustomReason $customReason)
    {
        try {
            $customReason->delete();

            return redirect()->route('custom-reasons.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('custom-reasons.index')->withError(trans('global.delete_failed'));
        }
    }
}
