<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register1;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Register1StoreUpdateRequest;

class Register1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = Register1::simplePaginate();

        return view('modules.register1.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register1StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register1StoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Register1::create($request->validated());

        return redirect()->route('registers1.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Register1 $registers1
     * @return View
     */
    public function edit(Register1 $registers1)
    {
        return view('modules.register1.edit', compact('registers1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register1StoreUpdateRequest $request
     * @param Register1 $registers1
     * @return RedirectResponse
     */
    public function update(Register1StoreUpdateRequest $request, Register1 $registers1)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $registers1);
        }

        try {
            $registers1->update($request->validated());

            return redirect()->route('registers1.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers1.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Register1 $registers1
     * @return RedirectResponse
     */
    public function destroy(Register1 $registers1)
    {
        try {
            $registers1->delete();

            return redirect()->route('registers1.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers1.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param Register1StoreUpdateRequest $request
     * @param Register1|null $registers1
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(Register1StoreUpdateRequest $request, Register1 $registers1 = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('registers1.index');
        }

        return redirect()->route('registers1.index')->withSuccess(trans($message));
    }
}
