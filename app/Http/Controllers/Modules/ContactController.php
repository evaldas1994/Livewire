<?php

namespace App\Http\Controllers\Modules;

use App\Models\Contact;
use App\Models\Partner;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactStoreUpdateRequest;

class ContactController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Partner $partner)
    {
        $purposeTypes = Contact::$purposeTypes;

        return view('modules.contact.create', compact('partner', 'purposeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Partner $partner
     * @param ContactStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ContactStoreUpdateRequest $request, Partner $partner)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $partner);
        }

        $partner->contacts()->create($request->validated());

        return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Partner $partner
     * @param Contact $contact
     * @return View
     */
    public function edit(Partner $partner, Contact $contact)
    {
        $purposeTypes = Contact::$purposeTypes;

        $contacts = $partner->contacts;

        return view('modules.contact.edit', compact('partner', 'contact', 'purposeTypes', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactStoreUpdateRequest $request
     * @param Partner $partner
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function update(ContactStoreUpdateRequest $request, Partner $partner, Contact $contact)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $partner);
        }

        try {
            $contact->update($request->validated());

            return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.edit', $partner)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Partner $partner
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function destroy(Partner $partner, Contact $contact)
    {
        try {
            $contact->delete();

            return redirect()->route('partners.edit', $partner)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('partners.edit', $partner)->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonActionWithoutValidation(ContactStoreUpdateRequest $request, Partner $partner = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('partners.edit', $partner);
        }

        return redirect()->route('partners.index')->withSuccess(trans($message));
    }
}
