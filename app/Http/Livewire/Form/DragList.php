<?php

namespace App\Http\Livewire\Form;

use App\Models\ProductionCard as ProductionCardModel;
use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Arr;

class DragList extends Component
{
    public $groups = [];
    public $lang;

    public function mount($groups, $lang)
    {
        $this->groups = $groups;
        $this->lang = $lang;
    }

    public function reorder($orderedIds)
    {
        foreach ($orderedIds as $item)
        {
            if (count($item['items']) === 0) {
                return;
            }
        }

        $newArr = [];

        for ($i = 0; $i < count($this->groups); $i++) {

            $newArr = Arr::add($newArr, $i . '.id', $orderedIds[$i]['value']);
            $newArr = Arr::add($newArr, $i . '.label', $this->groups[$i]['label']);

            for ($j = 0; $j < count($orderedIds[$i]['items']); $j++) {

                $id = $orderedIds[$i]['items'][$j]['value'];

                $merged = array_merge(Arr::get($this->groups, 0 . '.items'), Arr::get($this->groups, 1 . '.items'));

                $filtered = Arr::where($merged, function ($value, $key) use($id) {
                    return (int)$value['id'] === (int)$id;
                });

                $name = Arr::first($filtered)['name'];

                $newArr = Arr::add($newArr, $i . '.items.' . $orderedIds[$i]['items'][$j]['order'] . '.id', $orderedIds[$i]['items'][$j]['value']);
                $newArr = Arr::add($newArr, $i . '.items.' . $orderedIds[$i]['items'][$j]['order'] . '.name', $name);
            }
        }

        $this->groups = $newArr;
    }

    public function save()
    {
        $this->emitUp('setGroups', $this->groups);
    }

    public function render(): View
    {
        return view('livewire.form.dragList');
    }

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function resetItems()
    {
        $this->emitUp('setItems', ProductionCardModel::$gridColumns, ProductionCardModel::$defaultGridColumns);
    }
}
