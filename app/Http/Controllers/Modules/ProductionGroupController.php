<?php

namespace App\Http\Controllers\Modules;

use App\Models\Template;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\ProductionGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductionGroupStoreUpdateRequest;

class ProductionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $productionGroups = ProductionGroup::simplePaginate();

        return view('modules.productionGroup.index', compact('productionGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.productionGroup.create', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductionGroupStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ProductionGroupStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        ProductionGroup::create($request->validated());

        return redirect()->route('production-groups.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductionGroup $productionGroup
     * @return View
     */
    public function edit(ProductionGroup $productionGroup)
    {
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.productionGroup.edit', compact('productionGroup', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductionGroupStoreUpdateRequest $request
     * @param ProductionGroup $productionGroup
     * @return RedirectResponse
     */
    public function update(ProductionGroupStoreUpdateRequest $request, ProductionGroup $productionGroup)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $productionGroup);
        }

        try {
            $productionGroup->update($request->validated());
            return redirect()->route('production-groups.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('production-groups.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductionGroup $productionGroup
     * @return RedirectResponse
     */
    public function destroy(ProductionGroup $productionGroup)
    {
        try {
            $productionGroup->delete();

            return redirect()->route('production-groups.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('production-groups.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param ProductionGroupStoreUpdateRequest $request
     * @param ProductionGroup|null $productionGroup
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(ProductionGroupStoreUpdateRequest $request, ProductionGroup $productionGroup = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('production-groups.index');

            case 'select-template1':
                dd('route to template.index', $actionWithoutValidation[1]);

            case 'select-template2':
                dd('route to template.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('production-groups.index')->withSuccess(trans($message));
    }
}
