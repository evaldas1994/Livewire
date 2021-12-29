<?php

namespace App\Http\Livewire\ProductionCardComponent;

use App\Models\Stock;
use Livewire\Component;

class Edit extends Component
{
    public $f_id;
    public $f_stockid;
    public $f_stock_name;
    public $f_quant;
    public $f_unitid;
    public $f_alter_stockid;
    public $f_alter_stock_name;
    public $f_price;
    public $f_type;
    public $f_neto;

    public $productionCard;
    public $stocks;
    public $types;
    public $productionCardComponent;

    public $f_price_locked = false;
    public $f_type_locked = false;

    public function mount($productionCard, $stocks, $types, $productionCardComponent)
    {
        $this->productionCard = $productionCard;
        $this->stocks = $stocks;
        $this->types = $types;
        $this->productionCardComponent = $productionCardComponent;

        $this->setOldValue('f_type', $productionCardComponent->f_type);
        $this->setOldValue('f_id', $productionCardComponent->f_id);
        $this->setOldValue('f_stockid', $productionCardComponent->f_stockid);
        $this->setOldValue('f_stock_name', $productionCardComponent->stock->f_name);
        $this->setOldValue('f_quant', $productionCardComponent->f_quant);
        $this->setOldValue('f_unitid', $productionCardComponent->stock->f_unitid);
        $this->setOldValue('f_neto', $productionCardComponent->f_neto);
        $this->setOldValue('f_price', $productionCardComponent->f_price);

        if($productionCardComponent->AlterStock == null) {
            $this->setOldValue('f_alter_stockid', null);
            $this->setOldValue('f_alter_stock_name', null);
        }else {
            $this->setOldValue('f_alter_stockid', $productionCardComponent->alterStock->f_id);
            $this->setOldValue('f_alter_stock_name', $productionCardComponent->alterStock->f_name);
        }

        $this->changeStock($this->f_stockid);
        $this->changeAlterStock($this->f_alter_stockid);

        $this->f_type_locked = $this->isTypeLocked();
        $this->f_price_locked = $this->isPriceLocked();
    }

    public function changeStock($stockid)
    {
        $stock = Stock::find($stockid);

        if ($stockid == null || $stock == null ) {
            $this->f_stockid = null;
            $this->f_stock_name = null;
            $this->f_unitid = null;
            $this->f_type = 1;
            $this->f_type_locked = false;
        } else {
            $this->f_stockid = $stock->f_id;
            $this->f_stock_name = $stock->f_name;
            $this->f_unitid = $stock->f_unitid;
            $this->f_type = $stock->f_type;
            $this->f_type_locked = true;
        }

        $this->f_type_locked = $this->isTypeLocked();
        $this->f_price_locked = $this->isPriceLocked();
    }

    public function changeAlterStock($alterStockid)
    {
        $stock = Stock::find($alterStockid);

        if ($alterStockid == null || $stock == null ) {
            $this->f_alter_stockid = null;
            $this->f_alter_stock_name = null;
        } else {
            $this->f_alter_stockid = $stock->f_id;
            $this->f_alter_stock_name = $stock->f_name;
        }
    }

    public function changeType()
    {
        $this->f_type_locked = $this->isTypeLocked();
        $this->f_price_locked = $this->isPriceLocked();
    }

    public function render()
    {
        return view('livewire.productionCardComponent.edit');
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

    private function isPriceLocked(): bool
    {
        if ($this->f_type == 1) {
            $this->f_price = '0.0000';
            return true;
        }

        return false;
    }

    private function isTypeLocked(): bool
    {
        $stock = Stock::find($this->f_stockid);

        if ($stock != null) {
            return $stock->f_type != null;
        }
        return false;
    }
}
