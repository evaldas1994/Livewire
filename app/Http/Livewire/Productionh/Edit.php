<?php

namespace App\Http\Livewire\Productionh;

use App\Models\Productiond;
use Livewire\Component;

class Edit extends Component
{
    public $f_docdate;
    public $f_docno;
    public $f_blankno;
    public $f_storeid;
    public $f_groupid;
    public $f_description;
    public $f_templateid1;
    public $f_groupid1;
    public $f_templateid2;
    public $f_groupid2;
    public $f_system1;
    public $f_system2;
    public $f_system3;

    public $productionsh;
    public $stores;
    public $templates;
    public $productionGroups;
    public $stockOperationGroups;
    public $productionCards;
    public $registers1;
    public $registers2;
    public $registers3;
    public $registers4;
    public $registers5;
    public $allProductionsd;

    public $productionsd;
    public $showCreateProductiond = false;
    public $showEditProductiond = false;

    public function mount(
        $productionsh,
        $stores,
        $templates,
        $productionGroups,
        $stockOperationGroups,

        $productionCards,
        $registers1,
        $registers2,
        $registers3,
        $registers4,
        $registers5,

        $allProductionsd
    )
    {
        $this->productionsh = $productionsh;
        $this->stores = $stores;
        $this->templates = $templates;
        $this->productionGroups = $productionGroups;
        $this->stockOperationGroups = $stockOperationGroups;

        $this->productionCards = $productionCards;
        $this->registers1 = $registers1;
        $this->registers2 = $registers2;
        $this->registers3 = $registers3;
        $this->registers4 = $registers4;
        $this->registers5 = $registers5;

        $this->allProductionsd = $allProductionsd;

        $this->setOldValue('f_docdate', $productionsh->f_docdate);
        $this->setOldValue('f_docno', $productionsh->f_docno);
        $this->setOldValue('f_blankno', $productionsh->f_blankno);
        $this->setOldValue('f_storeid', $productionsh->f_storeid);
        $this->setOldValue('f_groupid', $productionsh->f_groupid);
        $this->setOldValue('f_description', $productionsh->f_description);
        $this->setOldValue('f_templateid1', $productionsh->f_templateid1);
        $this->setOldValue('f_groupid1', $productionsh->f_groupid1);
        $this->setOldValue('f_templateid2', $productionsh->f_templateid2);
        $this->setOldValue('f_groupid2', $productionsh->f_groupid2);
        $this->setOldValue('f_system1', $productionsh->f_system1);
        $this->setOldValue('f_system2', $productionsh->f_system2);
        $this->setOldValue('f_system3', $productionsh->f_system3);
    }

    public function changeStore($id)
    {
        $this->setOldValue('f_storeid', $id);
    }

    public function changeProductionGroup($id)
    {
        $this->setOldValue('f_groupid', $id);
    }

    public function changeTemplate1($id)
    {
        $this->setOldValue('f_templateid1', $id);
    }

    public function changeStockOperationGroup1($id)
    {
        $this->setOldValue('f_groupid1', $id);
    }

    public function changeTemplate2($id)
    {
        $this->setOldValue('f_templateid2', $id);
    }

    public function changeStockOperationGroup2($id)
    {
        $this->setOldValue('f_groupid2', $id);
    }

    public function render()
    {
        return view('livewire.productionh.edit');
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

    public function showCreateProductiond($value = true)
    {
        $this->showCreateProductiond = $value;
        $this->showEditProductiond = false;
    }
    public function showEditProductiond(bool $value = true, string $id = null)
    {
        $productionsd = Productiond::find($id);

        if ($value == true && $productionsd !== null ) {
            $this->productionsd = $productionsd;
            $this->showCreateProductiond = false;
            $this->showEditProductiond = $value;
        } else {
            $this->productionsd = null;
            $this->showCreateProductiond = false;
            $this->showEditProductiond = false;
        }
    }

    public $listeners = [
        'showCreateProductiond' => 'showCreateProductiond',
        'showEditProductiond' => 'showEditProductiond'
    ];

}
