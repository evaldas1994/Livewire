<?php

namespace App\Http\Controllers\Modules;

use App\Models\Project;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProjectStoreUpdateRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $projects = Project::simplePaginate();

        return view('modules.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Project::create($request->validated());

        return redirect()->route('projects.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return View
     */
    public function edit(Project $project)
    {
        return view('modules.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectStoreUpdateRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(ProjectStoreUpdateRequest $request, Project $project)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $project);
        }

        try {
            $project->update($request->validated());

            return redirect()->route('projects.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('projects.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Project $project)
    {
        try {
            $project->delete();

            return redirect()->route('projects.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('projects.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param ProjectStoreUpdateRequest $request
     * @param Project|null $project
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(ProjectStoreUpdateRequest $request, Project $project = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('projects.index');
        }

        return redirect()->route('projects.index')->withSuccess(trans($message));
    }
}
