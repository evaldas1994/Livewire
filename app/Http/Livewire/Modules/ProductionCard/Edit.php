<?php

namespace App\Http\Livewire\Modules\ProductionCard;

use App\Models\Stock;
use Livewire\Component;
use App\Rules\FloatRule;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Rules\IdPatternRule;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\ProductionCardComponent;
use App\Models\ProductionCard as ProductionCardModel;

class Edit extends Component
{
    use WithFileUploads;

    //  config
    public string $page, $tab;

    //  form
    public string $f_id, $f_quant = '1.0000';
    public $f_name, $f_name2, $f_stockid, $f_unitid, $f_description, $f_image1, $f_image2, $f_image3, $f_image4, $f_system1, $f_system2, $f_system3;
    public string|null $f_stockid_show_name;

    //  oldValues
    public  $productionCard;
    public  object|array $productionCardComponents = [];

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'setFStockid' => 'setFStockid',
        'clickSearchButton' => 'clickSearchButton',
        'mount' => 'mount',
    ];

    public function mount($productionCard, $productionCardComponent = null, $page = 'edit', $tab = 1, $popup = null)
    {
        $this->page = $page;
        $this->tab = $tab;

        $this->setFormData($productionCard);
    }

    public function render(): View
    {
        return view('livewire.modules.productionCard.edit')
            ->extends('layouts.app')
            ->section('content');
    }

    public function updatedFId($value)
    {
        $this->f_id = strtoupper(preg_replace('![^a-z0-9]+!i', '', $value));
    }

    public function setFStockid($id)
    {
        $stock = Stock::find($id);

        if ($stock === null) {
            $this->f_stockid = null;
            $this->f_stockid_show_name = null;
            $this->f_unitid = null;
        } else {
            $this->f_stockid = $id;
            $this->f_stockid_show_name = $stock->f_name;
            $this->f_unitid = $stock->f_unitid;
        }
    }

    public function update()
    {
        $this->save();

        session()->flash('success', __('global.updated_successfully'));
        $this->emitUp('setPage', 'index');
    }

    public function updateAndRedirect()
    {
        $this->save();

        $this->emitUp('setPage', 'edit', $this->f_id);
        $this->emitUp('showPopupCreate', true);
    }

    public function close()
    {
        $this->emitUp('setPage', 'index');
    }

    public function save()
    {
        $unique = Rule::unique('t_bom')->ignore($this->productionCard);
        $this->validate([
            'f_id' => ['required', 'max:20', $unique, new IdPatternRule],
            'f_name' => 'string|max:100|nullable',
            'f_name2' => 'string|max:100|nullable',
            'f_stockid' => 'required|exists:t_stock,f_id',
            'f_unitid' => 'required|exists:t_unit,f_id',
            'f_quant' => ['required', 'numeric', new FloatRule(4)],
            'f_description' => 'nullable',
//            'f_image1' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000', // max 10000kb
//            'f_image2' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000',
//            'f_image3' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000',
//            'f_image4' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:10000',
            'f_system1' => 'string|max:100|nullable',
            'f_system2' => 'string|max:100|nullable',
            'f_system3' => 'string|max:100|nullable',
        ]);

        $this->productionCard->update($this->getData());

        if ($this->f_image1 !== null) {
            $this->saveImage('f_image1');
        }

        if ($this->f_image2 !== null) {
            $this->saveImage('f_image2');
        }

        if ($this->f_image3 !== null) {
            $this->saveImage('f_image3');
        }

        if ($this->f_image4 !== null) {
            $this->saveImage('f_image4');
        }
    }

    private function getData()
    {
        return [
            'f_id' => $this->f_id,
            'f_name' => $this->f_name,
            'f_name2' => $this->f_name2,
            'f_stockid' => $this->f_stockid,
            'f_unitid' => $this->f_unitid,
            'f_quant' => $this->f_quant,
            'f_description' => $this->f_description,
//            'f_image1' => $this->f_image1,
//            'f_image2' => $this->f_image2,
//            'f_image3' => $this->f_image3,
//            'f_image4' => $this->f_image4,
            'f_system1' => $this->f_system1,
            'f_system2' => $this->f_system2,
            'f_system3' => $this->f_system3,
        ];
    }

    private function setFormData($productionCard)
    {
        if (gettype($productionCard) === 'array') {
            $this->productionCard = new ProductionCardModel($productionCard);
//            dd('hit', $this->productionCard);
        }elseif (gettype($productionCard) === 'string') {
            $this->productionCard = ProductionCardModel::findOrFail($productionCard)->load(['stock', 'components']);
//            dd($this->productionCard);
        }else{
            dd($this->productionCard);
            return;
        }

        $this->f_id = $this->productionCard->f_id;
        $this->f_name = $this->productionCard->f_name;
        $this->f_name2 = $this->productionCard->f_name2;
        $this->f_stockid = $this->productionCard->f_stockid;
        $this->f_unitid = $this->productionCard->f_unitid;
        $this->f_quant = $this->productionCard->f_quant;
        $this->f_description = $this->productionCard->f_description;
//        $this->f_image1 = $this->productionCard->f_image1;
//        $this->f_image2 = $this->productionCard->f_image2;
//        $this->f_image3 = $this->productionCard->f_image3;
//        $this->f_image4 = $this->productionCard->f_image4;
        $this->f_system1 = $this->productionCard->f_system1;
        $this->f_system2 = $this->productionCard->f_system2;
        $this->f_system3 = $this->productionCard->f_system3;

        $this->f_stockid_show_name = $this->productionCard->stock->f_name;

        $this->productionCardComponents = $this->productionCard->components;
    }

    //button
    public function clickSearchButton($name = null)
    {
        // išsaugomi formos duomenys
        $data = Arr::add([], 'from.component.name', 'modules.production-card.production-card');
        $data = Arr::add($data, 'from.component.event', 'mount');
        $data = Arr::add($data, 'from.component.form.target', $name);
        $data = Arr::add($data, 'from.page', $this->page);
        $data = Arr::add($data, 'from.tab', $this->tab);
        $data = Arr::add($data, 'from.data', $this->productionCard);
        $data = Arr::add($data, 'from.oldData', $this->getData());
        $data = Arr::add($data, 'from.popup', null);

        // išsiunčiamas eventas naujo komponento įjungimui
        $this->emit(Str::camel('show_' . $name), true, $data);
    }

    //tab
    public function setTab($tab)
    {
        $this->tab = $tab;
        $this->emitUp('setTab', $tab);
    }

    //image
    public function saveImage($name)
    {
        $this->validate([
            $name => 'nullable|image|max:1024', // 1MB Max
        ]);

//        dd($this->$name->storeAs('modules/productionCard', $name . '.jpg'));
    }

    //productionCardComponent
    public function deleteProductionCardComponent($id)
    {
        try {
            ProductionCardComponent::findOrFail($id)->delete();
        } catch (\Exception) {
            session()->flash('error', __('global.delete_failed'));
        }

        $this->emitTo('modules.production-card.edit', 'mount', $this->productionCard->f_id);
    }

}
