<?php

namespace App\Http\Livewire\Discountd;

use Livewire\Component;
use App\Models\Discountd;
use App\Models\Discounth;

class Create extends Component
{
    public $discountsh;
    public $discountd;
    public $stocks;
    public $barcodes;
    public $actionTypes;

    public $f_actiontype;
    public $f_actionid;
    public $f_barcodeid;
    public $f_discount_price;


    public function mount(Discounth $discountsh, Discountd $discountd, $stocks, $barcodes, $actionTypes)
    {
        $this->discountsh = $discountsh;
        $this->discountd = $discountd;
        $this->stocks = $stocks;
        $this->barcodes = $barcodes;
        $this->actionTypes = $actionTypes;

        $this->setOldValue('f_actiontype');
        $this->setOldValue('f_actionid');
        $this->setOldValue('f_barcodeid');
        $this->setOldValue('f_discount_price', '0.00');
    }

    public function render()
    {
        return view('livewire.discountd.create');
    }

    public function changeStock($stockId)
    {
        $this->f_actionid = $stockId;
    }

    public function changeBarcode($barcodeId)
    {
        $this->f_barcodeid = $barcodeId;
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
