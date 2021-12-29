<?php

namespace App\Http\Livewire\DiscountStore;

use App\Models\DiscountStore;
use Livewire\Component;
use App\Models\Discounth;

class Edit extends Component
{
    public $discountsh;
    public $discountStore;
    public $stores;

    public $f_storeid;

    public function mount(Discounth $discountsh, DiscountStore $discountStore, $stores)
    {
        $this->discountsh = $discountsh;
        $this->discountStore = $discountStore;
        $this->stores = $stores;

        $this->setOldValue('f_storeid', $this->discountStore->f_storeid);
    }

    public function render()
    {
        return view('livewire.discountStore.edit');
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
