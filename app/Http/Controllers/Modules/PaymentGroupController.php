<?php

namespace App\Http\Controllers\Modules;

use App\Http\Requests\BudgetStoreUpdateRequest;
use App\Models\Account;
use App\Models\Budget;
use App\Models\Counter;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\PaymentGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PaymentGroupStoreUpdateRequest;

class PaymentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $paymentGroups = PaymentGroup::simplePaginate();

        return view('modules.paymentGroup.index', compact('paymentGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $counters = Counter::select('f_id', 'f_txt')->orderBy('f_txt')->limit(10)->get();

        $operationTypes = PaymentGroup::$operationTypes;
        $types = PaymentGroup::$types;

        return view('modules.paymentGroup.create', compact(
            'accounts',
            'counters',
            'operationTypes',
            'types'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PaymentGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PaymentGroupStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        PaymentGroup::create($request->validated());

        return redirect()->route('payment-groups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PaymentGroup $paymentGroup
     * @return View
     */
    public function edit(PaymentGroup $paymentGroup)
    {
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $counters = Counter::select('f_id', 'f_txt')->orderBy('f_txt')->limit(10)->get();

        $operationTypes = PaymentGroup::$operationTypes;
        $types = PaymentGroup::$types;

        return view('modules.paymentGroup.edit', compact(
            'paymentGroup',
            'accounts',
            'counters',
            'operationTypes',
            'types'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PaymentGroupStoreUpdateRequest $request
     * @param PaymentGroup $paymentGroup
     * @return RedirectResponse
     */
    public function update(PaymentGroupStoreUpdateRequest $request, PaymentGroup $paymentGroup)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $paymentGroup);
        }

        try {
            $paymentGroup->update($request->validated());
            return redirect()->route('payment-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('payment-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PaymentGroup $paymentGroup
     * @return RedirectResponse
     */
    public function destroy(PaymentGroup $paymentGroup)
    {
        try {
            $paymentGroup->delete();

            return redirect()->route('payment-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('payment-groups.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param PaymentGroupStoreUpdateRequest $request
     * @param PaymentGroup|null $paymentGroup
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(PaymentGroupStoreUpdateRequest $request, PaymentGroup $paymentGroup = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('payment-groups.index');

            case 'select-debit-account':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-counter':
                dd('route to counter.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('payment-groups.index')->withSuccess(trans($message));
    }
}
