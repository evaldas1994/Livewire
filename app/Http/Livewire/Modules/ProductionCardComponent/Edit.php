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

class Edit extends Component
{
    //form
    public $f_id, $f_stockid, $f_stock_name, $f_alter_stockid, $f_alter_stock_name, $f_unitid, $f_quant = '1.0000', $f_price = '0.0000', $f_type = '1', $f_neto = '0.0000', $f_system1, $f_system2, $f_system3;
    public $f_stockid_readonly_name, $f_alter_stockid_readonly_name;

    //data
    public $productionCard;
    public $productionCardComponent;
    public $stocks;
    public $types;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'setFStockid' => 'setFStockid',
        'setFAlterStockid' => 'setFAlterStockid',
        'delete' => 'delete',
    ];

    public function mount($productionCard, $productionCardComponent)
    {
        $this->productionCard = ProductionCard::findOrFail($productionCard)->load('stock', 'components');
        $this->productionCardComponent = ProductionCardComponent::findOrFail($productionCardComponent)->load('stock', 'alterStock');;

        $this->types = ProductionCardComponent::$types;

        $this->f_type = $this->productionCardComponent->stock->f_type;
        $this->f_stockid = $this->productionCardComponent->f_stockid;
        $this->f_price = $this->productionCardComponent->f_price;
        $this->f_unitid = $this->productionCardComponent->stock->f_unitid;
        $this->f_quant = $this->productionCardComponent->f_quant;
        $this->f_alter_stockid = $this->productionCardComponent->f_alter_stockid;
        $this->f_neto = $this->productionCardComponent->f_neto;
        $this->f_system1 = $this->productionCardComponent->f_system1;
        $this->f_system2 = $this->productionCardComponent->f_system2;
        $this->f_system3 = $this->productionCardComponent->f_system3;

        $this->f_stockid_readonly_name = $this->productionCardComponent->stock->f_name;

        if($this->productionCardComponent->alterStock !== null) {
            $this->f_alter_stockid_readonly_name = $this->productionCardComponent->alterStock->f_name;
        }
    }

    public function render(): View
    {
        return view('livewire.modules.productionCardComponent.edit')
            ->extends('layouts.app')
            ->section('content');
    }

    public function setFStockid($id)
    {
        $stock = Stock::findOrFail($id);
        $this->f_stockid = $id;
        $this->f_stock_name = $stock->f_name;
        $this->f_unitid = $stock->f_unitid;
        $this->f_type = $stock->f_type;

        $this->f_stockid_readonly_name = $stock->f_name;

        $this->f_price = $this->getPrice();
    }

    public function setFAlterStockid($id)
    {
        $stock = Stock::findOrFail($id);
        $this->f_alter_stockid = $id;
        $this->f_alter_stock_name = $stock->f_name;
        $this->f_alter_stockid_readonly_name = $stock->f_name;
    }

    private function getPrice()
    {
        if ($this->f_type == '1') {
            return '0.0000';
        } else {
            return $this->f_price;
        }
    }

    public function update()
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

        try {
            $this->productionCardComponent->update($data);
        } catch (\Exception) {
            session()->flash('error', __('global.update_failed'));
        }
        session()->flash('success', __('global.updated_successfully'));

        $this->emitUp('showPopupEdit', false);
        $this->emitTo('modules.production-card.edit', 'refreshComponent');

        $this->emitUp('changePage', 'edit', $this->productionCard->f_id);
    }
}
