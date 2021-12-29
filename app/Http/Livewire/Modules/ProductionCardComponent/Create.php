<?php

namespace App\Http\Livewire\Modules\ProductionCardComponent;

use App\Models\Stock;
use Livewire\Component;
use App\Rules\FloatRule;
use Illuminate\View\View;
use App\Models\ProductionCard;
use App\Rules\PriceByTypeRule;
use Illuminate\Validation\Rule;
use App\Models\ProductionCardComponent;

class Create extends Component
{
    public $tab;
    //form
    public $f_id, $f_stockid, $f_stock_name, $f_alter_stockid, $f_alter_stock_name, $f_unitid, $f_quant = '1.0000', $f_price = '0.0000', $f_type = '1', $f_neto = '0.0000', $f_system1, $f_system2, $f_system3;
    public $f_stockid_show_name, $f_alter_stockid_show_name;

    //data
    public $productionCard;
    public $stocks;
    public $types;

    //search
    public $search;
    public $searchShowName;
    public $searchResults = [];
    public $showSelectStock = false;
    public $showSelectStock_f_stockid = false;
    public $showSelectStock_f_alter_stockid = false;

    public $model = 'Stock';
    public $searchColumns;
    public $getColumns;
    public $showName;


    protected $listeners = [
        'refreshComponent' => '$refresh',
        'setFStockid' => 'setFStockid',
        'setFAlterStockid' => 'setFAlterStockid',
    ];

    public function mount($tab, $productionCard)
    {
        $this->productionCard = ProductionCard::find($productionCard)->load('components');
        $this->stocks = Stock::orderBy('f_create_date', 'desc')->limit(10)->get();
        $this->types = ProductionCardComponent::$types;
    }

    public function render(): View
    {
        return view('livewire.modules.productionCardComponent.create')
            ->extends('layouts.app')
            ->section('content');
    }

//    public function updating($name, $value)
//    {
//        $class_name = "App\Models\\" . $this->model;
//
//        if ($name === 'f_stockid') {
//            $this->f_stockid = $value;
//            if (strlen($value > 1)) {
//                $this->searchResults = $class_name::where('f_name', 'like', '%' . $value . '%')->limit(10)->get();
//                $this->showSelectStock_f_stockid = true;
//            }
//        } else {
//            $this->showSelectStock_f_stockid = false;
////            $this->searchResults = [];
//        }
//
//        if ($name === 'f_alter_stockid') {
//            $this->f_stockid = $value;
//            if (strlen($value > 1)) {
//                $this->searchResults = $class_name::where('f_name', 'like', '%' . $value . '%')->limit(10)->get();
//                $this->showSelectStock_f_alter_stockid = true;
//            }
//        } else {
//            $this->showSelectStock_f_alter_stockid = false;
////            $this->searchResults = [];
//        }
//    }

    public function setFStockid($id)
    {
        $stock = Stock::findOrFail($id);
        $this->f_stockid = $id;
        $this->f_stockid_show_name = $stock->f_name;
        $this->f_unitid = $stock->f_unitid;
        $this->f_type = $stock->f_type;

        $this->f_price = $this->getPrice();
        $this->showSelectStock_f_stockid = false;
    }

    public function setFAlterStockid($id)
    {
        $stock = Stock::findOrFail($id);
        $this->f_alter_stockid = $id;
        $this->f_alter_stockid_show_name = $stock->f_name;

        $this->showSelectStock_f_alter_stockid = false;
    }

    private function getPrice()
    {
        if ($this->f_type == '1') {
            return '0.0000';
        } else {
            return $this->f_price;
        }
    }

    public function store()
    {
        $this->validate([
            'f_type' => ['required', Rule::in(ProductionCardComponent::$types)],
            'f_stockid' => 'required|exists:t_stock,f_id',
            'f_unitid'=> 'required|exists:t_unit,f_id',
            'f_quant' => ['numeric', new FloatRule(4)],
            'f_price' => ['nullable', 'numeric', new FloatRule(4), new PriceByTypeRule($this->f_type)],
            'f_alter_stockid' => 'nullable|exists:t_stock,f_id',
            'f_neto' => ['nullable', 'numeric', new FloatRule(4)],
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ]);

        $data = [
            'f_type' => $this->f_type,
            'f_stockid' => $this->f_stockid,
            'f_price' => $this->f_price,
            'f_unitid' => $this->f_unitid,
            'f_quant' => $this->f_quant,
            'f_alter_stockid' => $this->f_alter_stockid,
            'f_neto' => $this->f_neto,
            'f_system1' => $this->f_system1,
            'f_system2' => $this->f_system2,
            'f_system3' => $this->f_system3,
        ];

        $this->productionCard->components()->create($data);

        session()->flash('success', __('global.created_successfully'));

        $this->emitUp('showPopupCreate', false);
        $this->emitTo('modules.production-card.edit', 'mount', $this->productionCard->f_id);
    }
}
