<?php

namespace App\Http\Livewire\Discd;

use Livewire\Component;
use App\Models\Disch;

class Edit extends Component
{
    public $f_quant;
    public $f_perc;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $disch;
    public $discd;

    public function mount(Disch $disch, $discd)
    {
        $this->disch = $disch;
        $this->discd = $discd;

        $this->setOldValue('f_quant', $this->discd->f_quant);
        $this->setOldValue('f_perc', $this->discd->f_perc);
        $this->setOldValue('f_system1', $this->discd->f_system1);
        $this->setOldValue('f_system2', $this->discd->f_system2);
        $this->setOldValue('f_system3', $this->discd->f_system3);
    }

    public function changeId($id)
    {
        $this->setOldValue('f_id', $id);
    }

    public function render()
    {
        return view('livewire.discd.edit');
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
