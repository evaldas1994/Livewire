<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register4;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Register4StoreUpdateRequest;

class Register4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = Register4::simplePaginate();

        return view('modules.register4.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register4.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register4StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register4StoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Register4::create($request->validated());

        return redirect()->route('registers4.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Register4 $registers4
     * @return View
     */
    public function edit(Register4 $registers4)
    {
        return view('modules.register4.edit', compact('registers4'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register4StoreUpdateRequest $request
     * @param Register4 $registers4
     * @return RedirectResponse
     */
    public function update(Register4StoreUpdateRequest $request, Register4 $registers4)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $registers4);
        }

        try {
            $registers4->update($request->validated());

            return redirect()->route('registers4.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers4.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Register4 $registers4
     * @return RedirectResponse
     */
    public function destroy(Register4 $registers4)
    {
        try {
            $registers4->delete();

            return redirect()->route('registers4.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers4.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param Register4StoreUpdateRequest $request
     * @param Register4|null $registers4
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(Register4StoreUpdateRequest $request, Register4 $registers4 = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('registers4.index');
        }

        return redirect()->route('registers4.index')->withSuccess(trans($message));
    }
}
