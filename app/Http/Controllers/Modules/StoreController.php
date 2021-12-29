<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use App\Models\Person;
use App\Models\Project;
use App\Models\Account;
use Illuminate\View\View;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStoreUpdateRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $stores = Store::simplePaginate();

        return view('modules.store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();


        return view('modules.store.create', compact(
            'accounts',
            'stores',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'departments',
            'persons',
            'projects'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StoreStoreUpdateRequest $request)
    {
        Store::create($request->validated());

        return redirect()->route('stores.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Store $store
     * @return View
     */
    public function edit(Store $store)
    {
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();


        return view('modules.store.edit', compact(
            'store',
            'accounts',
            'stores',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'departments',
            'persons',
            'projects'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreStoreUpdateRequest $request
     * @param Store $store
     * @return RedirectResponse
     */
    public function update(StoreStoreUpdateRequest $request, Store $store)
    {
        try {
            $store->update($request->validated());

            return redirect()->route('stores.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('stores.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Store $store
     * @return RedirectResponse
     */
    public function destroy(Store $store)
    {
        try {
            $store->delete();

            return redirect()->route('stores.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('stores.index')->withError(trans('global.delete_failed'));
        }
    }
}
