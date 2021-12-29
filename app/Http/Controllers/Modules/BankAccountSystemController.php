<?php

namespace App\Http\Controllers\Modules;

use App\Models\Bank;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\BankAccountSystem;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BankAccountSystemStoreUpdateRequest;

class BankAccountSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $bankAccountSystems = BankAccountSystem::simplePaginate();

        return view('modules.bankAccountSystem.index', compact('bankAccountSystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->get();

        return view('modules.bankAccountSystem.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BankAccountSystemStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(BankAccountSystemStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        BankAccountSystem::create($request->validated());

        return redirect()->route('bank-account-systems.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BankAccountSystem $bankAccountSystem
     * @return View
     */
    public function edit(BankAccountSystem $bankAccountSystem)
    {
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->get();

        return view('modules.bankAccountSystem.edit', compact('bankAccountSystem', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BankAccountSystemStoreUpdateRequest $request
     * @param BankAccountSystem $bankAccountSystem
     * @return RedirectResponse
     */
    public function update(BankAccountSystemStoreUpdateRequest $request, BankAccountSystem $bankAccountSystem)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $bankAccountSystem);
        }

        try {
            $bankAccountSystem->update($request->validated());

            return redirect()->route('bank-account-systems.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('bank-account-systems.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BankAccountSystem $bankAccountSystem
     * @return RedirectResponse
     */
    public function destroy(BankAccountSystem $bankAccountSystem)
    {
        try {
            $bankAccountSystem->delete();

            return redirect()->route('bank-account-systems.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('bank-account-systems.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param BankAccountSystemStoreUpdateRequest $request
     * @param BankAccountSystem|null $bankAccountSystem
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(BankAccountSystemStoreUpdateRequest $request, BankAccountSystem $bankAccountSystem = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('bank-account-systems.index');

            case 'select-bank':
                dd('route to bank.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('bank-account-systems.index')->withSuccess(trans($message));
    }
}
