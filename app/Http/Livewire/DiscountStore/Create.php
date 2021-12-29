<?php

namespace App\Http\Livewire\DiscountStore;

use Livewire\Component;
use App\Models\Discounth;

class Create extends Component
{
    public $discountsh;
    public $stores;

    public $f_storeid;

    public function mount(Discounth $discountsh, $stores)
    {
        $this->discountsh = $discountsh;
        $this->stores = $stores;

        $this->setOldValue('f_storeid');
    }

    public function render()
    {
        return view('livewire.discountStore.create');
    }

    public function changeStore($storeId)
    {
        $this->f_storeid = $storeId;
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
