<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register8;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Register8StoreUpdateRequest;

class Register8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = Register8::simplePaginate();

        return view('modules.register8.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register8.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register8StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register8StoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Register8::create($request->validated());

        return redirect()->route('registers8.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Register8 $registers8
     * @return View
     */
    public function edit(Register8 $registers8)
    {
        return view('modules.register8.edit', compact('registers8'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register8StoreUpdateRequest $request
     * @param Register8 $registers8
     * @return RedirectResponse
     */
    public function update(Register8StoreUpdateRequest $request, Register8 $registers8)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $registers8);
        }

        try {
            $registers8->update($request->validated());

            return redirect()->route('registers8.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers8.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Register8 $registers8
     * @return RedirectResponse
     */
    public function destroy(Register8 $registers8)
    {
        try {
            $registers8->delete();

            return redirect()->route('registers8.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers8.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param Register8StoreUpdateRequest $request
     * @param Register8|null $registers8
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(Register8StoreUpdateRequest $request, Register8 $registers8 = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('registers8.index');
        }

        return redirect()->route('registers8.index')->withSuccess(trans($message));
    }
}
