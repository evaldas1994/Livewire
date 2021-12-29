<?php

namespace App\Http\Livewire\Disch;

use Livewire\Component;
use App\Models\Discd;
use App\Models\Disch;

class Edit extends Component
{
    public $f_id = ' ';
    public $f_name;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $disch;
    public $discd;
    public $allDiscd;

    public $showCreate = false;
    public $showEdit = false;

    public function mount(Disch $disch, $allDiscd)
    {
        $this->disch = $disch;
        $this->allDiscd = $allDiscd;
        $this->f_id = $disch->f_id;

        $this->setOldValue('f_id', $this->disch->f_id);
        $this->setOldValue('f_name', $this->disch->f_name);
        $this->setOldValue('f_system1', $this->disch->f_system1);
        $this->setOldValue('f_system2', $this->disch->f_system2);
        $this->setOldValue('f_system3', $this->disch->f_system3);
    }

    public function changeId($id)
    {
        $this->setOldValue('f_id', $id);
    }

    public function render()
    {
        return view('livewire.disch.edit');
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
        $discd = Discd::find($id);

        if ($value == true && $discd !== null ) {
            $this->discd = $discd;
            $this->showCreate = false;
            $this->showEdit = $value;
        } else {
            $this->discd = null;
            $this->showCreate = false;
            $this->showEdit = false;
        }
    }

    public $listeners = [
        'showCreate' => 'showCreate',
        'showEdit' => 'showEdit'
    ];
}
