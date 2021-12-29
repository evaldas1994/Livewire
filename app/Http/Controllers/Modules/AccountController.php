<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\AccountGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AccountStoreUpdateRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $accounts = Account::simplePaginate();

        return view('modules.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $accountGroups = AccountGroup::select('f_id', 'f_name')->orderBy('f_name')->get();

        $types = Account::$types;
        $purposeTypes = Account::$purposeTypes;

        return view('modules.account.create', compact('accountGroups', 'types', 'purposeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(AccountStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Account::create($request->validated());

        return redirect()->route('accounts.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     * @return View
     */
    public function edit(Account $account)
    {
        $accountGroups = AccountGroup::select('f_id', 'f_name')->orderBy('f_name')->get();

        $types = Account::$types;
        $purposeTypes = Account::$purposeTypes;

        return view('modules.account.edit', compact('account', 'accountGroups', 'types', 'purposeTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountStoreUpdateRequest $request
     * @param Account $account
     * @return RedirectResponse
     */
    public function update(AccountStoreUpdateRequest $request, Account $account)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $account);
        }

        try {
            $account->update($request->validated());

            return redirect()->route('accounts.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('accounts.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Account $account
     * @return RedirectResponse
     */
    public function destroy(Account  $account)
    {
        try {
            $account->delete();

            return redirect()->route('accounts.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('accounts.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param AccountStoreUpdateRequest $request
     * @param Account|null $account
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(AccountStoreUpdateRequest $request, Account $account = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('accounts.index');

            case 'select-account-group':
                dd('route to account group.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('accounts.index')->withSuccess(trans($message));
    }
}
