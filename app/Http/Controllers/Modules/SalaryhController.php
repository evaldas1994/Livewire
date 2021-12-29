<?php

namespace App\Http\Controllers\Modules;

use Carbon\Carbon;
use App\Models\Salaryh;
use App\Models\Currency;
use App\Models\Template;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SalaryhStoreUpdateRequest;

class SalaryhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $allSalariesh = Salaryh::simplePaginate();

        return view('modules.salaryh.index', compact('allSalariesh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $months = Salaryh::$months;

        $todayDate = Carbon::today();

        return view('modules.salaryh.create', compact('templates', 'currencies', 'departments', 'months', 'todayDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SalaryhStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(SalaryhStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        try {

            $data = $request->validated();
            $data = Arr::add($data, 'f_docno', counter('S', '', ''));
            $data = Arr::add($data, 'f_userid', auth()->id());

            Salaryh::create($data);

            return redirect()->route('salariesh.index')->withSuccess(trans('global.created_successfully'));

        } catch (\Exception) {
            dd('something wrong with create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Salaryh $salariesh
     * @return View
     */
    public function edit(Salaryh $salariesh)
    {
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $months = Salaryh::$months;

        return view('modules.salaryh.edit', compact('salariesh', 'templates', 'currencies', 'departments', 'months'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SalaryhStoreUpdateRequest $request
     * @param Salaryh $salaryiesh
     * @return RedirectResponse
     */
    public function update(SalaryhStoreUpdateRequest $request, Salaryh $salariesh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $salariesh);
        }

        try {
            $salariesh->update($request->validated());

            return redirect()->route('salariesh.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('salariesh.index')->withError(trans('global.update_failed'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Salaryh $salaryiesh
     * @return RedirectResponse
     */
    public function destroy(Salaryh $salaryiesh)
    {
        try {
            $salaryiesh->delete();

            return redirect()->route('salaryiesh.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('salaryiesh.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param SalaryhStoreUpdateRequest $request
     * @param Salaryh|null $salaryh
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(SalaryhStoreUpdateRequest $request, Salaryh $salaryh = null, string $message='global.empty')
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('salariesh.index');

            case 'select-template':
                dd('route to template.index', $actionWithoutValidation[1]);

            case 'select-department':
                dd('route to department.index', $actionWithoutValidation[1]);

            case 'select-currency':
                dd('route to currency.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('salaryiesh.index')->withSuccess(trans($message));
    }

}
