<?php

namespace App\Http\Controllers\Modules;

use App\Models\Store;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use Illuminate\View\View;
use App\Models\Productionh;
use App\Models\Productiond;
use Illuminate\Support\Arr;
use App\Models\ProductionCard;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductiondStoreUpdateRequest;

class ProductiondController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Productionh $productionsh)
    {
        $productionCards = ProductionCard::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.productiond.create', compact(
            'productionsh',
            'productionCards',
            'stores',
            'registers1',
            'registers2',
            'registers3',
            'registers4',
            'registers5'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductiondStoreUpdateRequest $request
     * @param Productionh $productionsh
     * @return RedirectResponse
     */
    public function store(ProductiondStoreUpdateRequest $request, Productionh $productionsh)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $productionsh->productionsd()->create($request->validated());

        return redirect()->route('productionsh.edit', $productionsh)->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Productionh $productionsh
     * @param Productiond $productionsd
     * @return View
     */
    public function edit(Productionh $productionsh, Productiond $productionsd)
    {
        $productionCards = ProductionCard::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stores = Store::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view(
            'modules.productiond.edit',
            compact(
                'productionsh',
                'productionsd',
                'productionCards',
                'stores',
                'registers1',
                'registers2',
                'registers3',
                'registers4',
                'registers5'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductiondStoreUpdateRequest $request
     * @param Productionh $productionsh
     * @param Productiond $productionsd
     * @return RedirectResponse
     */
    public function update(ProductiondStoreUpdateRequest $request, Productionh $productionsh, Productiond $productionsd)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $productionsh);
        }

        try {
            $productionsd->update($request->validated());

            return redirect()->route('productionsh.edit', $productionsh)->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('productionsh.edit', $productionsh)->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Productionh $productionsh
     * @param Productiond $productionsd
     * @return RedirectResponse
     */
    public function destroy(Productionh $productionsh, Productiond $productionsd)
    {
        try {
            $productionsd->delete();

            return redirect()->route('productionsh.edit', $productionsh)->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('productionsh.edit', $productionsh)->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param ProductiondStoreUpdateRequest $request
     * @param Productionh|null $productionsh
     * @param string $message
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(ProductiondStoreUpdateRequest $request, Productionh $productionsh = null, string $message='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('productionsh.index');

            case 'select-bom':
                dd('route to bom.index', $actionWithoutValidation[1]);

            case 'select-store':
                dd('route to store.index', $actionWithoutValidation[1]);

            case 'select-register-1':
                dd('route to register1.index', $actionWithoutValidation[1]);

            case 'select-register-2':
                dd('route to register2.index', $actionWithoutValidation[1]);

            case 'select-register-3':
                dd('route to register3.index', $actionWithoutValidation[1]);

            case 'select-register-4':
                dd('route to register4index', $actionWithoutValidation[1]);

            case 'select-register-5':
                dd('route to register5.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('productionsh.index')->withSuccess(trans($message));
    }
}
