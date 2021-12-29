<?php

namespace App\Http\Controllers\Modules;

use App\Models\Bank;
use App\Models\Partner;
use Illuminate\View\View;
use App\Models\BankAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BankAccountStoreUpdateRequest;

class BankAccountController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Partner $partner)
    {
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.bankAccount.create', compact('partner','banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BankAccountStoreUpdateRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function store(BankAccountStoreUpdateRequest $request, Partner $partner)
    {
        $partner->bankAccounts()->create($request->validated());

        return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @param BankAccount $bankAccount
     * @return View
     */
    public function edit(Partner $partner, BankAccount $bankAccount)
    {
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.bankAccount.edit', compact('partner', 'bankAccount','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BankAccountStoreUpdateRequest $request
     * @param Partner $partner
     * @param BankAccount $bankAccount
     * @return RedirectResponse
     */
    public function update(BankAccountStoreUpdateRequest $request, Partner $partner, BankAccount $bankAccount)
    {
        try {
            $bankAccount->update($request->validated());

            return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.edit', $partner)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @param BankAccount $bankAccount
     * @return RedirectResponse
     */
    public function destroy(Partner $partner, BankAccount $bankAccount)
    {
        try {
            $bankAccount->delete();

            return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.edit', $partner)->withError(trans('global.delete_failed'));
        }
    }
}
