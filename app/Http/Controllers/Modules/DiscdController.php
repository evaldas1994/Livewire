<?php

namespace App\Http\Controllers\Modules;

use App\Models\Discd;
use App\Models\Disch;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DiscdStoreUpdateRequest;

class DiscdController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Disch $disch)
    {
        return view('modules.discd.create', compact('disch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DiscdStoreUpdateRequest $request
     * @param Disch $disch
     * @return RedirectResponse
     */
    public function store(DiscdStoreUpdateRequest $request, Disch $disch)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $disch);
        }

        $disch->discd()->create($request->validated());

        return redirect()->route('disch.edit', $disch)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Disch $disch
     * @param Discd $discd
     * @return View
     */
    public function edit(Disch $disch, Discd $discd)
    {
        return view('modules.discd.edit', compact('disch', 'discd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DiscdStoreUpdateRequest $request
     * @param Disch $disch
     * @param Discd $discd
     * @return RedirectResponse
     */
    public function update(DiscdStoreUpdateRequest $request, Disch $disch, Discd $discd)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $disch);
        }

        try {
            $discd->update($request->validated());

            return redirect()->route('disch.edit', $disch)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('disch.edit', $disch)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Disch $disch
     * @param Discd $discd
     * @return RedirectResponse
     */
    public function destroy(Disch $disch, Discd $discd)
    {
        try {
            $discd->delete();

            return redirect()->route('disch.edit', $disch)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('disch.edit', $disch)->withError(trans('global.delete_failed'));
        }
    }
}
