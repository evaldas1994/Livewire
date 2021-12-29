<?php

namespace App\Http\Livewire\Productiond;

use Livewire\Component;

class Edit extends Component
{
    public $f_bomid;
    public $f_quant;
    public $f_description;
    public $f_storeid;
    public $f_f1;
    public $f_f2;
    public $f_f3;
    public $f_f4;
    public $f_f5;
    public $f_r1id;
    public $f_r2id;
    public $f_r3id;
    public $f_r4id;
    public $f_r5id;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $productionsh;
    public $productionCards;
    public $stores;
    public $registers1;
    public $registers2;
    public $registers3;
    public $registers4;
    public $registers5;

    public $productionsd;

    public function mount($productionsh, $productionCards, $stores, $registers1, $registers2, $registers3, $registers4, $registers5)
    {
        $this->productionsh = $productionsh;
        $this->productionCards = $productionCards;
        $this->stores = $stores;
        $this->registers1 = $registers1;
        $this->registers2 = $registers2;
        $this->registers3 = $registers3;
        $this->registers4 = $registers4;
        $this->registers5 = $registers5;

        $this->setOldValue('f_bomid', $this->productionsd->f_bomid);
        $this->setOldValue('f_quant', $this->productionsd->f_quant);
        $this->setOldValue('f_description', $this->productionsd->f_description);
        $this->setOldValue('f_storeid', $this->productionsd->f_storeid);
        $this->setOldValue('f_f1', $this->productionsd->f_f1);
        $this->setOldValue('f_f2', $this->productionsd->f_f2);
        $this->setOldValue('f_f3', $this->productionsd->f_f3);
        $this->setOldValue('f_f4', $this->productionsd->f_f4);
        $this->setOldValue('f_f5', $this->productionsd->f_f5);
        $this->setOldValue('f_r1id', $this->productionsd->f_r1id);
        $this->setOldValue('f_r2id', $this->productionsd->f_r2id);
        $this->setOldValue('f_r3id', $this->productionsd->f_r3id);
        $this->setOldValue('f_r4id', $this->productionsd->f_r4id);
        $this->setOldValue('f_r5id', $this->productionsd->f_r5id);
        $this->setOldValue('f_system1', $this->productionsd->f_system1);
        $this->setOldValue('f_system2', $this->productionsd->f_system2);
        $this->setOldValue('f_system3', $this->productionsd->f_system3);
    }

    public function changeBom($id)
    {
        $this->f_bomid = $id;
    }

    public function changeStore($id)
    {
        $this->f_storeid = $id;
    }

    public function changeRegister1($id)
    {
        $this->f_r1id = $id;
    }

    public function changeRegister2($id)
    {
        $this->f_r2id = $id;
    }

    public function changeRegister3($id)
    {
        $this->f_r3id = $id;
    }

    public function changeRegister4($id)
    {
        $this->f_r4id = $id;
    }

    public function changeRegister5($id)
    {
        $this->f_r5id = $id;
    }

    public function render()
    {
        return view('livewire.productiond.edit');
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
