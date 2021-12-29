<?php

namespace App\Http\Livewire\Modules\Stock;

use Illuminate\Support\Arr;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Stock as StockModel;
use Livewire\WithPagination;
use function MongoDB\BSON\toJSON;

class Index extends Component
{
    use WithPagination;

    //    =========================   MAIN  ============================================================================
    public $oldData = null;
    public $clickStatus = false;

    //  oldValues
    public $stock;

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function mount($stock = null, $page = 'index', $tab = 1, $popup = null, $oldData=null)
    {
        $this->oldData = $oldData;
        $this->oldData !== null ? $this->clickStatus = true : $this->clickStatus = false;

        $this->stock = $stock;
    }

    public function render(): View
    {
        $stocks = StockModel::orderBy('f_create_date', 'desc')->simplePaginate();

        return view('livewire.modules.stock.index', compact('stocks'))
            ->extends('layouts.app')
            ->section('content');
    }

    public function select($id)
    {
        // atnaujimas oldData kintamasis, kuris grįš į ankstesnį komponentą
        $this->oldData = data_set($this->oldData, 'from.data.' . Arr::get($this->oldData, 'from.component.form.target'), $id);

        // išsiunčiasmas eventas stock komponento išjungimui
        $this->close();
    }

    public function close()
    {
//        dd($this->oldData);
        // išjungiamas stock komponentas
        $this->emitTo(
            Arr::get($this->oldData, 'from.component.name'),
        'showFStockid',
         false
        );

        if (Arr::get($this->oldData, 'from.page') === 'create') {
            $this->emitTo(
                Arr::get($this->oldData, 'from.component.name'),
                Arr::get($this->oldData, 'from.component.event'),
                Arr::get($this->oldData, 'from.data'),
                null,
                Arr::get($this->oldData, 'from.page')
            );
        } else {
            $this->emitTo(
                Arr::get($this->oldData, 'from.component.name'),
                Arr::get($this->oldData, 'from.component.event'),
                Arr::get($this->oldData, 'from.data'),
                null,
                Arr::get($this->oldData, 'from.page'),
                Arr::get($this->oldData, 'from.tab'),
                Arr::get($this->oldData, 'from.popup'),
                Arr::get($this->oldData, 'from.oldData'),
            );
        }


    }
















//    =========================   OLD ===============================

//    public $oldData;
//
//    protected $listeners = [
//        'refreshComponent' => '$refresh',
//    ];
//
//    public function mount($oldData)
//    {
//        $this->oldData = $oldData;
//    }
//
//    public function render(): View
//    {
//        $stocks = StockModel::orderBy('f_create_date', 'desc')->with('stockGroup', 'unit', 'packUnit', 'manufacturer', 'discounth', 'vat', 'alternativeStock', 'currency', 'partner', 'account', 'alternativeStockGroup', 'register1', 'register2', 'register3', 'register4', 'register5', 'department', 'person', 'project', 'mainStock', 'prices', 'joinedStocks')->simplePaginate();
//
//        return view('livewire.modules.stock.index', compact('stocks'))
//            ->extends('layouts.app')
//            ->section('content');
//    }
//
////    public function delete($id)
////    {
////        try {
////            ProductionCardModel::findOrFail($id)->delete();
////            session()->flash('success', __('global.deleted_successfully'));
////            $this->emitTo('modules.production-card.index', 'refreshComponent');
////        } catch (\Exception) {
////            session()->flash('error', __('global.delete_failed'));
////            $this->emitTo('modules.production-card.index', 'refreshComponent');
////        }
////    }
//
//
//
//    public function select($id)
//    {
//        $this->emitTo('modules.production-card.production-card', 'changePage', 'create');
//        $this->emitTo('modules.production-card.create', 'test', $id);
//    }
}
