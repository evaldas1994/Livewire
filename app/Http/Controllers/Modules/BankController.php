<?php

namespace App\Http\Controllers\Modules;

use App\Models\Bank;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BankStoreUpdateRequest;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $banks = Bank::simplePaginate();

        return view('modules.bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BankStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BankStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Bank::create($request->validated());

        return redirect()->route('banks.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Bank $bank
     * @return View
     */
    public function edit(Bank $bank)
    {
        return view('modules.bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BankStoreUpdateRequest $request
     * @param Bank $bank
     * @return RedirectResponse
     */
    public function update(BankStoreUpdateRequest $request, Bank $bank)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $bank);
        }

        try {
            $bank->update($request->validated());

            return redirect()->route('banks.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('banks.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bank $bank
     * @return RedirectResponse
     */
    public function destroy(Bank $bank)
    {
        try {
            $bank->delete();

            return redirect()->route('banks.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('banks.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param BankStoreUpdateRequest $request
     * @param Bank|null $bank
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(BankStoreUpdateRequest $request, Bank $bank = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('banks.index');
        }

        return redirect()->route('banks.index')->withSuccess(trans($message));
    }
}
