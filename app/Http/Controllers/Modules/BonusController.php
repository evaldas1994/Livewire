<?php

namespace App\Http\Controllers\Modules;

use App\Models\Bonus;
use App\Models\Employee;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BonusStoreUpdateRequest;

class BonusController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Employee $employee)
    {
        $types = Bonus::$types;
        $reasons = Bonus::$reasons;

        return view('modules.bonus.create', compact('employee', 'types', 'reasons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BonusStoreUpdateRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function store(BonusStoreUpdateRequest $request, Employee $employee)
    {
        $employee->bonuses()->create($request->validated());

        return redirect()->route('employees.edit', $employee)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @param Bonus $bonus
     * @return View
     */
    public function edit(Employee $employee, Bonus $bonus)
    {
        $types = Bonus::$types;
        $reasons = Bonus::$reasons;

        return view('modules.bonus.edit', compact('employee', 'bonus', 'types', 'reasons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BonusStoreUpdateRequest $request
     * @param Employee $employee
     * @param Bonus $bonus
     * @return RedirectResponse
     */
    public function update(BonusStoreUpdateRequest $request, Employee $employee, Bonus $bonus)
    {
        try {
            $bonus->update($request->validated());

            return redirect()->route('employees.edit', $employee)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('employees.edit', $employee)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @param Bonus $bonus
     * @return RedirectResponse
     */
    public function destroy(Employee $employee, Bonus $bonus)
    {
        try {
            $bonus->delete();

            return redirect()->route('employees.edit', $employee)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('employees.edit', $employee)->withError(trans('global.delete_failed'));
        }
    }
}
