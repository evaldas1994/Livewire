<?php

namespace App\Http\Livewire\Disch;

use Livewire\Component;

class Create extends Component
{
    public $f_id = ' ';
    public $f_name;
    public $f_system1;
    public $f_system2;
    public $f_system3;


    public function mount()
    {
        $this->setOldValue('f_id');
        $this->setOldValue('f_name');
        $this->setOldValue('f_system1');
        $this->setOldValue('f_system2');
        $this->setOldValue('f_system3');
    }

    public function changeId($id)
    {
        $this->setOldValue('f_id', $id);
    }

    public function render()
    {
        return view('livewire.disch.create');
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
