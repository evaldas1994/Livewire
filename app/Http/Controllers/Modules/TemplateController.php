<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use App\Models\Template;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\StockOperationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TemplateStoreUpdateRequest;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $templates = Template::simplePaginate();

        return view('modules.template.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $operationTypes = Template::$operationTypes;

        return view('modules.template.create', compact('stockOperationGroups', 'accounts', 'operationTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TemplateStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(TemplateStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $template = Template::create($request->validated());

        return $this->checkButtonAction($request, $template, 'global.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Template $template
     * @return View
     */
    public function edit(Template $template)
    {
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $operationTypes = Template::$operationTypes;

        $templateReasons = $template->templateReasons;

        return view('modules.template.edit', compact('template', 'stockOperationGroups', 'accounts', 'operationTypes', 'templateReasons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TemplateStoreUpdateRequest $request
     * @param Template $template
     * @return RedirectResponse
     */
    public function update(TemplateStoreUpdateRequest $request, Template $template)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $template);
        }

        try {
            $template->update($request->validated());
        } catch (\Exception) {
            return redirect()->route('templates.index')->withError(trans('global.update_failed'));
        }

        return $this->checkButtonAction($request, $template, 'global.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Template $template
     * @return RedirectResponse
     */
    public function destroy(Template $template)
    {
        try {
            $template->delete();

            return redirect()->route('templates.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('templates.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonAction(TemplateStoreUpdateRequest $request, Template $template = null, string $message='global.empty')
    {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'template-reason-create':
                return redirect()->route('template-reasons.create', $template);
        }

        return redirect()->route('templates.index')->withSuccess(trans($message));
    }

    private function checkButtonActionWithoutValidation(TemplateStoreUpdateRequest $request, Template $template = null, string $message='global.empty')
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('templates.index');

            case 'template-reason-edit':
                $templateReasonId = $actionWithoutValidation[1];
                return redirect()->route('template-reasons.edit', [$template, $templateReasonId]);

            case 'select-stock-operation-group':
                dd('route to stock operation group.index', $actionWithoutValidation[1]);

            case 'select-debit-account-1':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-1':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-2':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-2':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-3':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-3':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-4':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-4':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-5':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-5':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-6':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-6':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-7':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-7':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-8':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-8':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-9':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-9':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-10':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-10':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-11':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-11':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-12':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-12':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-13':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-13':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-14':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-14':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-15':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-15':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-16':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-16':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-17':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-17':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-18':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-18':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-19':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-19':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-20':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-20':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-21':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-21':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-22':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-22':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-debit-account-23':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-credit-account-23':
                dd('route to account.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('templates.index')->withSuccess(trans($message));
    }
}
