<?php

namespace App\Http\Controllers\Modules;

use Carbon\Carbon;
use App\Models\Store;
use App\Models\Template;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\Productionh;
use App\Models\ProductionCard;
use App\Models\ProductionGroup;
use App\Models\StockOperationGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductionhStoreUpdateRequest;

class ProductionhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $allProductionsh = Productionh::simplePaginate();

        return view('modules.productionh.index', compact('allProductionsh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $productionGroups = ProductionGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $todayDate = Carbon::today();

        return view('modules.productionh.create', compact('stores', 'templates', 'productionGroups', 'stockOperationGroups', 'todayDate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductionhStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(ProductionhStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        try {
            $data = $request->validated();
            $data = Arr::add($data, 'f_docno', counter('Y'));

            $productionsh = Productionh::create($data);

        } catch (\Exception) {
            return redirect()->route('productionsh.index');
        }

        return $this->checkButtonAction($request, $productionsh, 'global.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Productionh $productionsh
     * @return View
     */
    public function edit(Productionh $productionsh)
    {
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $templates = Template::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $productionGroups = ProductionGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stockOperationGroups = StockOperationGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $productionCards = ProductionCard::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $allProductionsd = $productionsh->productionsd;

        return view('modules.productionh.edit', compact(
            'productionsh',
            'stores',
            'templates',
            'productionGroups',
            'stockOperationGroups',
            'productionsh',
            'productionCards',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5',
            'allProductionsd',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductionhStoreUpdateRequest $request
     * @param Productionh $productionsh
     * @return RedirectResponse
     */
    public function update(ProductionhStoreUpdateRequest $request, Productionh $productionsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $productionsh);
        }

        try {
            $productionsh->update($request->validated());
        } catch (\Exception) {
            return redirect()->route('productionsh.index')->withError(trans('global.update_failed'));
        }

        return $this->checkButtonAction($request, $productionsh, 'global.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Productionh $productionsh
     * @return RedirectResponse
     */
    public function destroy(Productionh $productionsh)
    {
        try {
            $productionsh->delete();

            return redirect()->route('productionsh.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('productionsh.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonAction(ProductionhStoreUpdateRequest $request, Productionh $productionsh = null, string $message='global.empty')
    {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'productiond-create':
                return redirect()->route('productionsh.edit', $productionsh);
        }

        return redirect()->route('productionsh.index')->withSuccess(trans($message));
    }

    /**
     * @param ProductionhStoreUpdateRequest $request
     * @param Productionh|null $productionsh
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(ProductionhStoreUpdateRequest $request, Productionh $productionsh = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('productionsh.index');

            case 'productiond-edit':
                $productionsdId = $actionWithoutValidation[1];
                return redirect()->route('productionsd.edit', [$productionsh, $productionsdId]);

            case 'select-production-group':
                dd('route to production group.index', $actionWithoutValidation[1]);

            case 'select-template-1':
                dd('route to template.index', $actionWithoutValidation[1]);

            case 'select-template-2':
                dd('route to template.index', $actionWithoutValidation[1]);

            case 'select-stock-operation-group-1':
                dd('route to stock operation group.index', $actionWithoutValidation[1]);

            case 'select-stock-operation-group-2':
                dd('route to stock operation group.index', $actionWithoutValidation[1]);

            case 'select-store':
                dd('route to store.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('productionsh.index')->withSuccess(trans($message));
    }
}
