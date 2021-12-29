<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\Disch;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DischStoreUpdateRequest;

class DischController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $discounts = Disch::simplePaginate();

        return view('modules.disch.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.disch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DischStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DischStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $disch = Disch::create($request->validated());

        return $this->checkButtonAction($request, $disch, 'global.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Disch $disch
     * @return View
     */
    public function edit(Disch $disch)
    {
        $allDiscd = $disch->discd;

        return view('modules.disch.edit', compact('disch', 'allDiscd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DischStoreUpdateRequest $request
     * @param Disch $disch
     * @return RedirectResponse
     */
    public function update(DischStoreUpdateRequest $request, Disch $disch)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $disch);
        }

        try {
            $disch->update($request->validated());
        } catch (\Exception) {
            return redirect()->route('disch.index')->withError(trans('global.update_failed'));
        }

        return $this->checkButtonAction($request, $disch, 'global.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Disch $disch
     * @return RedirectResponse
     */
    public function destroy(Disch $disch)
    {
        try {
            $disch->delete();

            return redirect()->route('disch.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('disch.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonAction(DischStoreUpdateRequest $request, Disch $disch, string $message='global.empty')
    {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'discd-create':
                return redirect()->route('disch.edit', $disch);
        }

        return redirect()->route('disch.index')->withSuccess(trans($message));
    }

    private function checkButtonActionWithoutValidation(DischStoreUpdateRequest $request, Disch $disch = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('disch.index');
        }

        return redirect()->route('disch.index')->withSuccess(trans($message));
    }
}
