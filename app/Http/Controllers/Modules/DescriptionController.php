<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\Description;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DescriptionStoreUpdateRequest;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $descriptions = Description::simplePaginate();

        return view('modules.description.index', compact('descriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.description.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DescriptionStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DescriptionStoreUpdateRequest $request)
    {
        Description::create($request->validated());

        return redirect()->route('descriptions.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Description $description
     * @return View
     */
    public function edit(Description $description)
    {
        return view('modules.description.edit', compact('description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DescriptionStoreUpdateRequest $request
     * @param Description $description
     * @return RedirectResponse
     */
    public function update(DescriptionStoreUpdateRequest $request, Description $description)
    {
        try {
            $description->update($request->validated());

            return redirect()->route('descriptions.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('descriptions.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Description $description
     * @return RedirectResponse
     */
    public function destroy(Description $description)
    {
        try {
            $description->delete();

            return redirect()->route('descriptions.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('descriptions.index')->withError(trans('global.delete_failed'));
        }
    }
}
