<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register6;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Register6StoreUpdateRequest;

class Register6Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = Register6::simplePaginate();

        return view('modules.register6.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register6.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register6StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register6StoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Register6::create($request->validated());

        return redirect()->route('registers6.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Register6 $registers6
     * @return View
     */
    public function edit(Register6 $registers6)
    {
        return view('modules.register6.edit', compact('registers6'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register6StoreUpdateRequest $request
     * @param Register6 $registers6
     * @return RedirectResponse
     */
    public function update(Register6StoreUpdateRequest $request, Register6 $registers6)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $registers6);
        }

        try {
            $registers6->update($request->validated());

            return redirect()->route('registers6.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers6.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Register6 $registers6
     * @return RedirectResponse
     */
    public function destroy(Register6 $registers6)
    {
        try {
            $registers6->delete();

            return redirect()->route('registers6.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers6.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param Register6StoreUpdateRequest $request
     * @param Register6|null $registers6
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(Register6StoreUpdateRequest $request, Register6 $registers6 = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('registers6.index');
        }

        return redirect()->route('registers6.index')->withSuccess(trans($message));
    }
}
