<?php

namespace App\Http\Livewire\ProductionCard;

use App\Models\Stock;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $f_id = ' ';
    public $f_stockid;
    public $f_stock_name;
    public $f_name;
    public $f_name2;
    public $f_quant;
    public $f_unitid;
    public $f_description;

    public $stocks;

    public function mount($stocks)
    {
        $this->stocks = $stocks;

        $this->setOldValue('f_id');
        $this->setOldValue('f_stockid');
        $this->setOldValue('f_stock_name');
        $this->setOldValue('f_name');
        $this->setOldValue('f_name2');
        $this->setOldValue('f_quant', '1.0000');
        $this->setOldValue('f_unitid');
        $this->setOldValue('f_description');

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
        return view('livewire.productionCard.create');
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
}
