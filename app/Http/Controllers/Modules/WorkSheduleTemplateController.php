<?php

namespace App\Http\Controllers\Modules;

use Illuminate\View\View;
use App\Models\WorkSheduleTemplate;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\WorkSheduleTemplateStoreUpdateRequest;

class WorkSheduleTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $workSheduleTemplates = WorkSheduleTemplate::simplePaginate();

        return view('modules.workSheduleTemplate.index', compact('workSheduleTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.workSheduleTemplate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WorkSheduleTemplateStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(WorkSheduleTemplateStoreUpdateRequest $request)
    {
        WorkSheduleTemplate::create($request->validated());

        return redirect()->route('work-shedule-templates.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param WorkSheduleTemplate $workSheduleTemplate
     * @return View
     */
    public function edit(WorkSheduleTemplate $workSheduleTemplate)
    {
        return view('modules.workSheduleTemplate.edit', compact('workSheduleTemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WorkSheduleTemplateStoreUpdateRequest $request
     * @param WorkSheduleTemplate $workSheduleTemplate
     * @return RedirectResponse
     */
    public function update(WorkSheduleTemplateStoreUpdateRequest $request, WorkSheduleTemplate $workSheduleTemplate)
    {
        try {
            $workSheduleTemplate->update($request->validated());

            return redirect()->route('work-shedule-templates.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('work-shedule-templates.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param WorkSheduleTemplate $workSheduleTemplate
     * @return RedirectResponse
     */
    public function destroy(WorkSheduleTemplate $workSheduleTemplate)
    {
        try {
            $workSheduleTemplate->delete();

            return redirect()->route('work-shedule-templates.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('work-shedule-templates.index')->withError(trans('global.delete_failed'));
        }
    }
}
