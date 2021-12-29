<?php

namespace App\Http\Livewire\Modules\Stock;

use Illuminate\Support\Arr;
use Livewire\Component;
use Illuminate\View\View;

class Stock extends Component
{
    //    =========================   NEW   ===============================
    public $oldData = null;
    public $pageData = null;

    public $stock;

    public $page = 'index';
    public $tab = 1;

    public function mount($stock=null, $page='index', $tab=1, $popup=null, $oldData=null)
    {
        $this->oldData=$oldData;
        $this->stock=$stock;
    }

    public function render(): View
    {
        return view('livewire.modules.stock.stock')
            ->extends('layouts.app')
            ->section('content');
    }

    public function setOldData($name, $value)
    {
        $this->oldData = Arr::set($this->oldData, $name, $value);
    }

















//    =========================   OLD ===============================

//    public $stockId = null;
//    public $page = 'index';
//    public $tab = 1;
//
//    public $oldData;
//
//    public $showSelectButtonStockGroup = false;
//    public $showSelectButtonUnit = false;
//    public $showSelectButtonPackUnit = false;
//    public $showSelectButtonVat = false;
//
//    protected $listeners = [
//        'refreshComponent' => '$refresh',
//        'changePage' => 'changePage',
//        ];
//
//    public function mount($oldData)
//    {
//        $this->oldData = $oldData;
//    }
//

//
//    public function changePage($page, $id = null): void
//    {
////        $this->productionCardId = $id;
//        $this->page = $page;
//    }
}
