<?php

namespace App\Http\Controllers\Modules;

use App\Models\Vat;
use App\Models\Bank;
use App\Models\Store;
use App\Models\Person;
use App\Models\Account;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Template;
use App\Models\Currency;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use Illuminate\View\View;
use App\Models\Register5;
use App\Models\Department;
use Illuminate\Support\Arr;
use App\Models\MessageGroup;
use App\Models\PartnerGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PartnerStoreUpdateRequest;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $partners = Partner::simplePaginate();

        return view('modules.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $partnerGroups = PartnerGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $messageGroups = MessageGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $vats = Vat::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $priceLevels = Partner::$priceLevelTypes;
        $legalStatuses = Partner::$legalStatusTypes;
        $sexTypes = Partner::$sexTypes;
        $ediExportTypes = Partner::$ediExportTypes;

        return view('modules.partner.create', compact(
            'partnerGroups',
            'currencies',
            'partners',
            'accounts',
            'messageGroups',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'departments',
            'persons',
            'projects',
            'vats',
            'banks',
            'stores',
            'templates',
            'priceLevels',
            'legalStatuses',
            'sexTypes',
            'ediExportTypes',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PartnerStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $partner = Partner::create($request->validated());

        switch ($request->input('action')) {
            case 'bank-account-create':
                return redirect()->route('bank-accounts.create' , $partner);
        }

        return $this->checkButtonAction($request, $partner, 'global.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @return View
     */
    public function edit(Partner $partner)
    {
        $partnerGroups = PartnerGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $messageGroups = MessageGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $vats = Vat::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $priceLevels = Partner::$priceLevelTypes;
        $legalStatuses = Partner::$legalStatusTypes;
        $sexTypes = Partner::$sexTypes;
        $ediExportTypes = Partner::$ediExportTypes;

        $bankAccounts = $partner->bankAccounts;
        $contacts = $partner->contacts;
        $discountCardPoints = $partner->discountCardPoints;

        return view(
            'modules.partner.edit',
            compact(
                'partner',
                'partnerGroups',
                'currencies',
                'partners',
                'accounts',
                'messageGroups',
                'registers1',
                'registers2',
                'registers3',
                'registers4',
                'registers5',
                'departments',
                'persons',
                'projects',
                'vats',
                'banks',
                'stores',
                'templates',
                'priceLevels',
                'legalStatuses',
                'sexTypes',
                'ediExportTypes',
                'bankAccounts',
                'contacts',
                'discountCardPoints',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PartnerStoreUpdateRequest $request
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function update(PartnerStoreUpdateRequest $request, Partner $partner)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $partner);
        }

        try {
            $partner->update($request->validated());

            switch ($request->input('action')) {
                case 'bank-account-create':
                    return redirect()->route('bank-accounts.create' , $partner);
            }

        } catch (\Exception) {
            return redirect()->route('partners.index')->withError(trans('global.update_failed'));
        }

        return $this->checkButtonAction($request, $partner, 'global.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @return RedirectResponse
     */
    public function destroy(Partner $partner)
    {
        try {
            $partner->delete();

            return redirect()->route('partners.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonAction(PartnerStoreUpdateRequest $request, Partner $partner = null, string $message='global.empty')
    {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'bank-account-create':
                return redirect()->route('bank-accounts.create', $partner);

            case 'contact-create':
                return redirect()->route('contacts.create', $partner);

            case 'discount-card-point-create':
                return redirect()->route('discount-card-points.create', $partner);
        }

        return redirect()->route('partners.index')->withSuccess(trans($message));
    }

    private function checkButtonActionWithoutValidation(PartnerStoreUpdateRequest $request, Partner $partner = null, string $message='global.empty')
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('partners.index');
            case 'bank-account-edit':
                $bankAccountId = $actionWithoutValidation[1];
                return redirect()->route('bank-accounts.edit', [$partner, $bankAccountId]);

            case 'contact-edit':
                $contactId = $actionWithoutValidation[1];
                return redirect()->route('contacts.edit', [$partner, $contactId]);

            case 'discount-card-point-edit':
                $discountCardPointId = $actionWithoutValidation[1];
                return redirect()->route('discount-card-points.edit', [$partner, $discountCardPointId]);

            case 'select-partner-group':
                dd('route to partner group.index', $actionWithoutValidation[1]);

            case 'select-partner':
                dd('route to partner.index', $actionWithoutValidation[1]);

            case 'select-account-1':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-account-2':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-message-group':
                dd('route to message group.index', $actionWithoutValidation[1]);

            case 'select-currency':
                dd('route to currency.index', $actionWithoutValidation[1]);

            case 'select-vat':
                dd('route to vat.index', $actionWithoutValidation[1]);

            case 'select-register-1':
                dd('route to register1.index', $actionWithoutValidation[1]);

            case 'select-register-2':
                dd('route to register2.index', $actionWithoutValidation[1]);

            case 'select-register-3':
                dd('route to register3.index', $actionWithoutValidation[1]);

            case 'select-register-4':
                dd('route to register4.index', $actionWithoutValidation[1]);

            case 'select-register-5':
                dd('route to register5.index', $actionWithoutValidation[1]);

            case 'select-department':
                dd('route to department.index', $actionWithoutValidation[1]);

            case 'select-person':
                dd('route to person.index', $actionWithoutValidation[1]);

            case 'select-project':
                dd('route to project.index', $actionWithoutValidation[1]);

            case 'select-direct-debit-bank':
                dd('route to bank.index', $actionWithoutValidation[1]);

            case 'select-edi-store':
                dd('route to store.index', $actionWithoutValidation[1]);

            case 'select-template':
                dd('route to template.index', $actionWithoutValidation[1]);

            case 'select-template-2':
                dd('route to template.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('partners.index')->withSuccess(trans($message));
    }
}
