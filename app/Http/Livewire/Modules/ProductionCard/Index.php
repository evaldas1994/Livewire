<?php

namespace App\Http\Livewire\Modules\ProductionCard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use App\Models\ProductionCard as ProductionCardModel;

class Index extends Component
{
    use WithPagination;

    public $pagee = 'index';

    public $clickStatus = false;

    //  oldValues
    public $productionCard;

    public $showIndexGridColumnsSelect = false;
    public $groups;

    public $gridColumns;
    public $defaultGridColumns;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'setGroups' => 'setGroups',
        'showIndexGridColumnsSelect' => 'showIndexGridColumnsSelect',
        'setItems' => 'setItems',
    ];

    public function mount($productionCard = null, $page = 'index', $tab = 1, $popup = null)
    {
        $this->gridColumns = ProductionCardModel::$gridColumns;
        $this->defaultGridColumns = ProductionCardModel::$defaultGridColumns;

        if ($this->groups === null) {
            $this->setItems($this->gridColumns, $this->defaultGridColumns);
        }

        $this->productionCard = $productionCard;
    }

    public function render(): View
    {
        $productionCards = ProductionCardModel::orderBy('f_create_date', 'desc')->with('stock')->simplePaginate();

        return view('livewire.modules.productionCard.index', compact('productionCards'))
            ->extends('layouts.app')
            ->section('content');
    }

    public function delete($id)
    {
        try {
            ProductionCardModel::findOrFail($id)->delete();
            session()->flash('success', __('global.deleted_successfully'));
            $this->emit('refreshComponent');
        } catch (\Exception) {
            session()->flash('error', __('global.delete_failed'));
            $this->emit('refreshComponent');
        }
    }

    public function setItems($list, $defaultArray)
    {
        $activeArr = [];
        $disabledArr = [];

        //ištrinami dubllikatai
        foreach ($list as $key => $listItem)
        {
            foreach ($defaultArray as $defaultItem)
            {
                if ($listItem === $defaultItem) {
                    Arr::forget($list, $key);
                }
            }
        }

        //užsetinamas aktyvių id masyvas
        foreach ($defaultArray as $key => $item)
        {
            $activeArr = Arr::add($activeArr, $key, ['id' => (int)$key + 1, 'name' => $item]);
        }

        //užsetinamas neaktyvių id masyvas
        foreach ($list as $key => $item)
        {
            if(!Arr::hasAny($list, $defaultArray)) {
                $disabledArr = Arr::add($disabledArr, $key, ['id' => (int)$key + count($defaultArray) + 1, 'name' => $item]);
            }
        }

        //sudedama į groups
        $this->groups = [
            [
                'id' => 'show',
                'label' => __('drag.active'),
                'items' => $activeArr,
            ],
            [
                'id' => 'hide',
                'label' => __('drag.disabled'),
                'items' => $disabledArr,
            ]
        ];

        //paslepiamas grid'o column'ų selectas
        $this->showIndexGridColumnsSelect = false;
    }

    public function showIndexGridColumnsSelect($bool=true)
    {
        $this->showIndexGridColumnsSelect = $bool;
    }

    public function setGroups($groups)
    {
        $this->groups = $groups;
        $this->showIndexGridColumnsSelect = false;
    }

    public function close()
    {
        return redirect()->route('home');
    }
}
