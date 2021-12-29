<?php

namespace App\Http\Controllers\Modules;

use App\Models\Interest;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\InterestStoreUpdateRequest;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $interests = Interest::simplePaginate();

        return view('modules.interest.index', compact('interests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.interest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InterestStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(InterestStoreUpdateRequest $request)
    {
        Interest::create($request->validated());

        return redirect()->route('interests.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Interest $interest
     * @return View
     */
    public function edit(Interest $interest)
    {
        return view('modules.interest.edit', compact('interest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InterestStoreUpdateRequest $request
     * @param Interest $interest
     * @return RedirectResponse
     */
    public function update(InterestStoreUpdateRequest $request, Interest $interest)
    {
        try {
            $interest->update($request->validated());

            return redirect()->route('interests.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('interests.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Interest $interest
     * @return RedirectResponse
     */
    public function destroy(Interest $interest)
    {
        try {
            $interest->delete();

            return redirect()->route('interests.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('interest.index')->withError(trans('global.delete_failed'));
        }
    }
}
