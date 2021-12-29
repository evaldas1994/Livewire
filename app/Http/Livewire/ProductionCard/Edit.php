<?php

namespace App\Http\Livewire\ProductionCard;

use App\Models\Stock;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProductionCardComponent;

class Edit extends Component
{
    use WithFileUploads;

    public $f_id;
    public $f_stockid;
    public $f_stock_name;
    public $f_name;
    public $f_name2;
    public $f_quant;
    public $f_unitid;
    public $f_description;

    public $stocks;
    public $productionCard;
    public $productionCardComponents;

    public $types;
    public $productionCardComponent;
    public $showCreate = false;
    public $showEdit = false;

    public function mount($stocks, $productionCard, $productionCardComponents, $types)
    {
        $this->productionCard = $productionCard;
        $this->stocks = $stocks;
        $this->productionCardComponents = $productionCardComponents;
        $this->types = $types;

        $this->setOldValue('f_id', $productionCard->f_id);
        $this->setOldValue('f_stockid',$productionCard->f_stockid);
        $this->setOldValue('f_stock_name', $productionCard->stock->f_name);
        $this->setOldValue('f_name', $productionCard->f_name);
        $this->setOldValue('f_name2', $productionCard->f_name2);
        $this->setOldValue('f_quant', $productionCard->f_quant);
        $this->setOldValue('f_unitid', $productionCard->f_unitid);
        $this->setOldValue('f_description', $productionCard->f_description);

        $this->changeStock($this->f_stockid);
    }

    public function changeId($id)
    {
        $this->setOldValue('f_id', $id);
    }

    public function changeStock($stockId)
    {
        $this->f_stockid = $stockId;
        $stock = Stock::find($this->f_stockid);

        if ($this->f_stockid == null ) {
            $this->f_stock_name = null;
            $this->f_unitid = null;
        } else {
            $this->f_stock_name = $stock->f_name;
            $this->f_unitid = $stock->f_unitid;
        }
    }

    public function render()
    {
        return view('livewire.productionCard.edit');
    }

    private function setOldValue($value, $default = null)
    {
        if (!empty(old($value))){
            $this->$value = old($value);
        } else {
            if ($this->$value == null) {
                $this->$value = $default;
            }
        }
    }

    public function showCreate($value = true)
    {
        $this->showCreate = $value;
        $this->showEdit = false;
    }

    public function showEdit(bool $value = true, string $id = null)
    {
        $productionCardComponent = ProductionCardComponent::find($id);

        if ($value == true && $productionCardComponent !== null ) {
            $this->productionCardComponent = $productionCardComponent;
            $this->showCreate = false;
            $this->showEdit = $value;
        } else {
            $this->productionCardComponent = null;
            $this->showCreate = false;
            $this->showEdit = false;
        }
    }

    public $listeners = [
        'showCreate' => 'showCreate',
        'showEdit' => 'showEdit'
    ];
}
