<?php

namespace App\Http\Controllers\Modules;

use App\Http\Requests\AccountStoreUpdateRequest;
use App\Models\Account;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use App\Models\AccountGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\AccountGroupStoreUpdateRequest;

class AccountGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $accountGroups = AccountGroup::simplePaginate();

        return view('modules.accountGroup.index', compact('accountGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.accountGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AccountGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(AccountGroupStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        AccountGroup::create($request->validated());

        return redirect()->route('account-groups.index')->withSuccess(trans('global.created_successfully'));;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AccountGroup $accountGroup
     * @return View
     */
    public function edit(AccountGroup $accountGroup)
    {
        return view('modules.accountGroup.edit', compact('accountGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AccountGroupStoreUpdateRequest $request
     * @param AccountGroup $accountGroup
     * @return RedirectResponse
     */
    public function update(AccountGroupStoreUpdateRequest $request, AccountGroup $accountGroup)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $accountGroup);
        }

        try {
            $accountGroup->update($request->validated());

            return redirect()->route('account-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('account-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AccountGroup $accountGroup
     * @return RedirectResponse
     */
    public function destroy(AccountGroup $accountGroup)
    {
        try {
            $accountGroup->delete();

            return redirect()->route('account-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('account-groups.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param AccountGroupStoreUpdateRequest $request
     * @param AccountGroup|null $accountGroup
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(AccountGroupStoreUpdateRequest $request, AccountGroup $accountGroup = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('account-groups.index');
        }

        return redirect()->route('account-groups.index')->withSuccess(trans($message));
    }
}
