<?php

namespace App\Http\Controllers\Modules;

use App\Http\Requests\AccountStoreUpdateRequest;
use App\Models\Account;
use App\Models\Person;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PersonStoreUpdateRequest;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $persons = Person::simplePaginate();

        return view('modules.person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(PersonStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Person::create($request->validated());

        return redirect()->route('persons.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Person $person
     * @return View
     */
    public function edit(Person $person)
    {
        return view('modules.person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonStoreUpdateRequest $request
     * @param Person $person
     * @return RedirectResponse
     */
    public function update(PersonStoreUpdateRequest $request, Person $person)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $person);
        }

        try {
            $person->update($request->validated());

            return redirect()->route('persons.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('persons.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Person $person
     * @return RedirectResponse
     */
    public function destroy(Person $person)
    {
        try {
            $person->delete();

            return redirect()->route('persons.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('persons.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param PersonStoreUpdateRequest $request
     * @param Person|null $person
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(PersonStoreUpdateRequest $request, Person $person = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('persons.index');
        }

        return redirect()->route('persons.index')->withSuccess(trans($message));
    }
}
