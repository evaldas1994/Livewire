<?php

namespace App\Http\Controllers\Modules;

use App\Models\Register7;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Register7StoreUpdateRequest;

class Register7Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $registers = Register7::simplePaginate();

        return view('modules.register7.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.register7.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Register7StoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(Register7StoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Register7::create($request->validated());

        return redirect()->route('registers7.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Register7 $registers7
     * @return View
     */
    public function edit(Register7 $registers7)
    {
        return view('modules.register7.edit', compact('registers7'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Register7StoreUpdateRequest $request
     * @param Register7 $registers7
     * @return RedirectResponse
     */
    public function update(Register7StoreUpdateRequest $request, Register7 $registers7)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $registers7);
        }

        try {
            $registers7->update($request->validated());

            return redirect()->route('registers7.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers7.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Register7 $registers7
     * @return RedirectResponse
     */
    public function destroy(Register7 $registers7)
    {
        try {
            $registers7->delete();

            return redirect()->route('registers7.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('registers7.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param Register7StoreUpdateRequest $request
     * @param Register7|null $registers7
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(Register7StoreUpdateRequest $request, Register7 $registers7 = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('registers7.index');
        }

        return redirect()->route('registers7.index')->withSuccess(trans($message));
    }
}
