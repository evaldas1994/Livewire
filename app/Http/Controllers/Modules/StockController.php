<?php

namespace App\Http\Controllers\Modules;

use App\Models\Price;
use App\Models\Vat;
use App\Models\Unit;
use App\Models\Disch;
use App\Models\Stock;
use Barryvdh\Debugbar\DebugbarViewEngine;
use GuzzleHttp\Client;
use App\Models\Person;
use App\Models\Partner;
use App\Models\Account;
use App\Models\Project;
use App\Models\Currency;
use Illuminate\View\View;
use App\Models\Register1;
use App\Models\Register2;
use App\Models\Register3;
use App\Models\Register4;
use App\Models\Register5;
use App\Models\Department;
use App\Models\StockGroup;
use Illuminate\Support\Arr;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StockStoreUpdateRequest;
use GuzzleHttp\Psr7\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
//        $stocks = Stock::simplePaginate();
        $stocks = Stock::orderBy('f_create_date', 'desc')->simplePaginate();

        return view('modules.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $units = Unit::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $manufacturers = Manufacturer::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $discountsh = Disch::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $vats = Vat::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $types = Stock::$types;
        $pacTypes = Stock::$gpaisPacTypes;
        $defaultUnit = Stock::$defaultUnit;

        return view(
            'modules.stock.create',
            compact(
                'stockGroups',
                'units',
                'manufacturers',
                'discountsh',
                'vats',
                'stocks',
                'currencies',
                'partners',
                'accounts',
                'registers1',
                'registers2',
                'registers3',
                'registers4',
                'registers5',
                'departments',
                'persons',
                'projects',
                'types',
                'pacTypes',
                'defaultUnit'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StockStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(StockStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        $stock = Stock::create($request->validated());

        if (session()->exists('queue_of_actions')) {
            $lastOfQueue = Arr::last(session('queue_of_actions'));

            $prevRoute = Arr::get($lastOfQueue, 'route-prev.route');
            $prevData = Arr::get($lastOfQueue, 'route-prev.data');
            $targetField = Arr::get($lastOfQueue, 'route-prev.target_field');

            // collect data
            $prevData = Arr::set($prevData, $targetField, $stock->f_id);

            //remove session
            session()->forget('queue_of_actions');

            //redirect
            if ($prevData['_method'] == 'PUT' || $prevData['_method'] == 'PATCH')
            {
                $id = Arr::get($prevData, 'f_id');
//                dd($prevRoute, $id);
                return redirect()->route($prevRoute, $id)->withInput($prevData);
            } else {
                return redirect()->route($prevRoute)->withInput($prevData);
            }
        }
        return $this->checkButtonAction($request, $stock);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Stock $stock
     * @return View
     */
    public function edit(Stock $stock)
    {
        $pricesSale = $stock->prices()->where('f_type', 'S')->get();
        $pricesPurch = $stock->prices()->where('f_type', 'P')->get();
        $joinedStocks = $stock->joinedStocks;

        $stockGroups = StockGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $units = Unit::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $manufacturers = Manufacturer::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $discountsh = Disch::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $vats = Vat::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $stocks = Stock::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $currencies = Currency::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $partners = Partner::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $accounts = Account::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers1 = Register1::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers2 = Register2::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers3 = Register3::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers4 = Register4::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $registers5 = Register5::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $departments = Department::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $persons = Person::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();
        $projects = Project::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        $types = Stock::$types;
        $pacTypes = Stock::$gpaisPacTypes;

        return view(
            'modules.stock.edit',
            compact(
                'pricesSale',
                'pricesPurch',
                'joinedStocks',
                'stock',
                'stockGroups',
                'units',
                'manufacturers',
                'discountsh',
                'vats',
                'stocks',
                'currencies',
                'partners',
                'accounts',
                'registers1',
                'registers2',
                'registers3',
                'registers4',
                'registers5',
                'departments',
                'persons',
                'projects',
                'types',
                'pacTypes'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StockStoreUpdateRequest $request
     * @param Stock $stock
     * @return RedirectResponse
     */
    public function update(StockStoreUpdateRequest $request, Stock $stock)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $stock);
        }

        try {
            $stock->update($request->validated());
        } catch (\Exception) {
            return redirect()->route('stocks.index')->withError(trans('global.update_failed'));
        }

        return $this->checkButtonAction($request, $stock);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Stock $stock
     * @return RedirectResponse
     */
    public function destroy(Stock $stock)
    {
        try {
            $stock->delete();

            return redirect()->route('stocks.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('stocks.index')->withError(trans('global.delete_failed'));
        }
    }

    private function checkButtonAction(StockStoreUpdateRequest $request, Stock $stock = null, string $message='global.empty')
    {
        $action = explode('|', $request->input('button-action'))[0];
        switch ($action) {
            case 'price-sale-create':
                return redirect()->route('prices.create', [$stock, 'S']);

            case 'price-purch-create':
                return redirect()->route('prices.create', [$stock, 'P']);

            case 'joined-stock-create':
                return redirect()->route('joined-stocks.create', $stock);
        }

        return redirect()->route('stocks.index')->withSuccess(trans($message));
    }

    private function checkButtonActionWithoutValidation(StockStoreUpdateRequest $request, Stock $stock = null, string $message='global.empty')
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('stocks.index');

            case 'price-sale-edit':
                $priceId = $actionWithoutValidation[1];
                return redirect()->route('prices.edit', [$stock, $priceId]);

            case 'price-purch-edit':
                $priceId = $actionWithoutValidation[1];
                return redirect()->route('prices.edit', [$stock, $priceId]);

            case 'joined-stock-edit':
                $joinedStockId = $actionWithoutValidation[1];
                return redirect()->route('joined-stocks.edit', [$stock, $joinedStockId]);

            case 'selected-by':
                $stockId = $actionWithoutValidation[1];

                if (session()->exists('queue_of_actions')) {
                    $lastOfQueue = Arr::last(session('queue_of_actions'));

                    $prevRoute = Arr::get($lastOfQueue, 'route-prev.route');
                    $prevData = Arr::get($lastOfQueue, 'route-prev.data');
                    $targetField = Arr::get($lastOfQueue, 'route-prev.target_field');

                    // collect data
                    $prevData = Arr::set($prevData, $targetField, $stockId);

                    //remove session
                    session()->forget('queue_of_actions');

                    //redirect
                    if ($prevData['_method'] == 'PUT' || $prevData['_method'] == 'PATCH')
                    {
                        $id = Arr::get($prevData, 'f_id');
                        return redirect()->route($prevRoute, $id)->withInput($prevData);
                    } else {
                        return redirect()->route($prevRoute)->withInput($prevData);
                    }
                }
                return redirect()->route('stocks.index');

            case 'select-stock-group':
                dd('route to stock group.index', $actionWithoutValidation[1]);

            case 'select-unit':
                dd('route to unit.index', $actionWithoutValidation[1]);

            case 'select-pack-unit':
                dd('route to unit.index', $actionWithoutValidation[1]);

            case 'select-manufacturer':
                dd('route to manufacturer.index', $actionWithoutValidation[1]);

            case 'select-discount':
                dd('route to discount.index', $actionWithoutValidation[1]);

            case 'select-vat':
                dd('route to vat.index', $actionWithoutValidation[1]);

            case 'select-alternative-group':
                dd('route to stock group.index', $actionWithoutValidation[1]);

            case 'select-currency':
                dd('route to currency.index', $actionWithoutValidation[1]);

            case 'select-partner':
                dd('route to partner.index', $actionWithoutValidation[1]);

            case 'select-account':
                dd('route to account.index', $actionWithoutValidation[1]);

            case 'select-main-stock':
                dd('route to stock.index', $actionWithoutValidation[1]);

            case 'select-register1':
                dd('route to register1.index', $actionWithoutValidation[1]);

            case 'select-register2':
                dd('route to register2.index', $actionWithoutValidation[1]);

            case 'select-register3':
                dd('route to register3.index', $actionWithoutValidation[1]);

            case 'select-register4':
                dd('route to register4.index', $actionWithoutValidation[1]);

            case 'select-register5':
                dd('route to register5.index', $actionWithoutValidation[1]);

            case 'select-department':
                dd('route to department.index', $actionWithoutValidation[1]);

            case 'select-person':
                dd('route to person.index', $actionWithoutValidation[1]);

            case 'select-project':
                dd('route to project.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('stocks.index')->withSuccess(trans($message));
    }
}
