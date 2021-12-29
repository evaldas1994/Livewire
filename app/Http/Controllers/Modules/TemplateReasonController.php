<?php

namespace App\Http\Controllers\Modules;

use App\Models\Template;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\TemplateReason;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\TemplateReasonStoreUpdateRequest;

class TemplateReasonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Template $template
     * @return View
     */
    public function create(Template $template)
    {
        return view('modules.templateReason.create', compact('template'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TemplateReasonStoreUpdateRequest $request
     * @param Template $template
     * @return RedirectResponse
     */
    public function store(TemplateReasonStoreUpdateRequest $request, Template $template)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $template);
        }

        $template->templateReasons()->create($request->validated());

        return redirect()->route('templates.edit', $template)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Template $template
     * @param TemplateReason $templateReason
     * @return View
     */
    public function edit(Template $template, TemplateReason $templateReason)
    {
        return view('modules.templateReason.edit', compact('template', 'templateReason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TemplateReasonStoreUpdateRequest $request
     * @param Template $template
     * @param TemplateReason $templateReason
     * @return RedirectResponse
     */
    public function update(TemplateReasonStoreUpdateRequest $request, Template $template, TemplateReason $templateReason)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $template);
        }

        try {
            $templateReason->update($request->validated());

            return redirect()->route('templates.edit', $template)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('templates.edit', $template)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Template $template
     * @param TemplateReason $templateReason
     * @return RedirectResponse
     */
    public function destroy(Template $template, TemplateReason $templateReason)
    {
        try {
            $templateReason->delete();

            return redirect()->route('templates.edit', $template)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('templates.edit', $template)->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param TemplateReasonStoreUpdateRequest $request
     * @param Template|null $template
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(TemplateReasonStoreUpdateRequest $request, Template $template = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('templates.edit', $template);
        }

        return redirect()->route('templates.index')->withSuccess(trans($message));
    }
}
