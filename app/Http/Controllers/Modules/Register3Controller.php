<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register3;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Register3StoreUpdateRequest;

class Register3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = Register3::simplePaginate();

        return view('modules.register3.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register3.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register3StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register3StoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Register3::create($request->validated());

        return redirect()->route('registers3.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Register3 $registers3
     * @return View
     */
    public function edit(Register3 $registers3)
    {
        return view('modules.register3.edit', compact('registers3'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register3StoreUpdateRequest $request
     * @param Register3 $registers3
     * @return RedirectResponse
     */
    public function update(Register3StoreUpdateRequest $request, Register3 $registers3)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $registers3);
        }

        try {
            $registers3->update($request->validated());

            return redirect()->route('registers3.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers3.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Register3 $registers3
     * @return RedirectResponse
     */
    public function destroy(Register3 $registers3)
    {
        try {
            $registers3->delete();

            return redirect()->route('registers3.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers3.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param Register3StoreUpdateRequest $request
     * @param Register3|null $registers3
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(Register3StoreUpdateRequest $request, Register3 $registers3 = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('registers3.index');
        }

        return redirect()->route('registers3.index')->withSuccess(trans($message));
    }
}
