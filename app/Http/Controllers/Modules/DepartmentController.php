<?php

namespace App\Http\Controllers\Modules;

use App\Models\Account;
use App\Models\Employee;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DepartmentStoreUpdateRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $departments = Department::simplePaginate();

        return view('modules.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $employees = Employee::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.department.create', compact('departments', 'employees', 'accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Department::create($request->validated());

        return redirect()->route('departments.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function edit(Department $department)
    {
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $employees = Employee::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.department.edit', compact('department', 'departments', 'employees', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentStoreUpdateRequest $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(DepartmentStoreUpdateRequest $request, Department $department)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $department);
        }

        try {
            $department->update($request->validated());

            return redirect()->route('departments.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('departments.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();

            return redirect()->route('departments.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('departments.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param DepartmentStoreUpdateRequest $request
     * @param Department|null $department
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(DepartmentStoreUpdateRequest $request, Department $department = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('departments.index');

            case 'select-account-1':
                dd('route to account 1.index', $actionWithoutValidation[1]);

            case 'select-account-2':
                dd('route to account 2.index', $actionWithoutValidation[1]);

            case 'select-employee':
                dd('route to employee.index', $actionWithoutValidation[1]);

            case 'select-department':
                dd('route to department.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('departments.index')->withSuccess(trans($message));
    }
}
