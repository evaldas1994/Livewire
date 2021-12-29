<?php

namespace App\Http\Controllers\Modules;

use App\Models\User;
use App\Models\Bank;
use App\Models\Employee;
use Illuminate\View\View;
use App\Models\Department;
use App\Models\WorkSheduleTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EmployeeStoreUpdateRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $employees = Employee::simplePaginate();

        return view('modules.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $users = User::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $workSheduleTemplates = WorkSheduleTemplate::select('f_id', 'f_title')->orderBy('f_title')->limit(10)->get();

        $maritalStatuses = Employee::$maritalStatusTypes;
        $pensionInsurances = Employee::$pensionInsuranceTypes;
        $sexTypes = Employee::$sexTypes;
        $disablementTypes = Employee::$disablementTypes;
        $disablementPercentTypes = Employee::$disablementPercentTypes;

        return view('modules.employee.create', compact(
            'departments',
            'users',
            'banks',
            'workSheduleTemplates',
            'maritalStatuses',
            'pensionInsurances',
            'sexTypes',
            'disablementTypes',
            'disablementPercentTypes',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeStoreUpdateRequest $request)
    {
        $employee = Employee::create($request->validated());

        switch ($request->input('action')) {
            case 'bonus-create':
                return redirect()->route('bonuses.create' , $employee);
        }

        return redirect()->route('employees.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return View
     */
    public function edit(Employee $employee)
    {
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $users = User::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $banks = Bank::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $workSheduleTemplates = WorkSheduleTemplate::select('f_id', 'f_title')->orderBy('f_title')->limit(10)->get();

        $maritalStatuses = Employee::$maritalStatusTypes;
        $pensionInsurances = Employee::$pensionInsuranceTypes;
        $sexTypes = Employee::$sexTypes;
        $disablementTypes = Employee::$disablementTypes;
        $disablementPercentTypes = Employee::$disablementPercentTypes;

        $bonuses = $employee->bonuses;

        return view('modules.employee.edit', compact(
                'employee',
                'departments',
                'users',
                'banks',
                'workSheduleTemplates',
                'maritalStatuses',
                'pensionInsurances',
                'sexTypes',
                'disablementTypes',
                'disablementPercentTypes',
                'bonuses',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeStoreUpdateRequest $request
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function update(EmployeeStoreUpdateRequest $request, Employee $employee)
    {
        try {
            $employee->update($request->validated());

            switch ($request->input('action')) {
                case 'bonus-create':
                    return redirect()->route('bonuses.create' , $employee);
            }

            return redirect()->route('employees.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('employees.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();

            return redirect()->route('employees.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('employees.index')->withError(trans('global.delete_failed'));
        }
    }
}
