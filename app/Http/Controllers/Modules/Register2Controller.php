<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register2;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Register2StoreUpdateRequest;

class Register2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = Register2::simplePaginate();

        return view('modules.register2.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register2.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register2StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register2StoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Register2::create($request->validated());

        return redirect()->route('registers2.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Register2 $registers2
     * @return View
     */
    public function edit(Register2 $registers2)
    {
        return view('modules.register2.edit', compact('registers2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register2StoreUpdateRequest $request
     * @param Register2 $registers2
     * @return RedirectResponse
     */
    public function update(Register2StoreUpdateRequest $request, Register2 $registers2)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $registers2);
        }

        try {
            $registers2->update($request->validated());

            return redirect()->route('registers2.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers2.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Register2 $registers2
     * @return RedirectResponse
     */
    public function destroy(Register2 $registers2)
    {
        try {
            $registers2->delete();

            return redirect()->route('registers2.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers2.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param Register2StoreUpdateRequest $request
     * @param Register2|null $registers2
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(Register2StoreUpdateRequest $request, Register2 $registers2 = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('registers2.index');
        }

        return redirect()->route('registers2.index')->withSuccess(trans($message));
    }
}
