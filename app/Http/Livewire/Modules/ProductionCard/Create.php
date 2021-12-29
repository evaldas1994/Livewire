<?php

namespace App\Http\Livewire\Modules\ProductionCard;

use App\Models\Stock;
use Livewire\Component;
use App\Rules\FloatRule;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Rules\IdPatternRule;
use Livewire\WithFileUploads;
use App\Models\ProductionCard as ProductionCardModel;

class Create extends Component
{
    use WithFileUploads;

    //  config
    public $page;
    public $tab;

    //  form
    public $f_id, $f_name, $f_name2, $f_stockid, $f_unitid, $f_quant = '1.0000', $f_description, $f_image1, $f_image2, $f_image3, $f_image4, $f_system1, $f_system2, $f_system3;
    public $f_stockid_show_name;

    //  oldValues
    public $productionCard;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'setFStockid' => 'setFStockid',
        'clickSearchButton' => 'clickSearchButton',
    ];

    public function mount($productionCard = null, $page = 'create', $tab = 1, $popup = null)
    {
        $this->page = $page;
        $this->tab = $tab;

        $this->setFormData($productionCard);
    }

    public function render(): View
    {
        return view('livewire.modules.productionCard.create')
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

    public function store()
    {
        $this->save();

        session()->flash('success', __('global.created_successfully'));
        $this->emit('setPage', 'index');
    }

    public function storeAndRedirect()
    {
        $this->save();

        $this->emit('setPage', 'edit', $this->f_id);
        $this->emit('showPopupCreate', true);
    }

    public function save()
    {
        $this->validate([
            'f_id' => ['required', 'max:20', 'unique:t_bom', new IdPatternRule],
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

        ProductionCardModel::create($this->getData());

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
        if($productionCard !== null)
        {
            $this->productionCard = $productionCard;

            $this->f_id = $productionCard['f_id'];
            $this->f_name = $productionCard['f_name'];
            $this->f_name2 = $productionCard['f_name2'];
            $this->f_stockid = $productionCard['f_stockid'];
            $this->f_quant = $productionCard['f_quant'];
            $this->f_description = $productionCard['f_description'];
//            $this->f_image1 = $productionCard['f_image1'];
//            $this->f_image2 = $productionCard['f_image2'];
//            $this->f_image3 = $productionCard['f_image3'];
//            $this->f_image4 = $productionCard['f_image4'];
            $this->f_system1 = $productionCard['f_system1'];
            $this->f_system2 = $productionCard['f_system2'];
            $this->f_system3 = $productionCard['f_system3'];

            if ($this->f_stockid !== null) {
                $this->setFStockid($this->f_stockid);
            }
        }
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
        $data = Arr::add($data, 'from.data', $this->getData());
        $data = Arr::add($data, 'from.popup', null);

        // išsiunčiamas eventas naujo komponento įjungimui
        $this->emit(Str::camel('show_' . $name), true, $data);
    }

    //tab
    public function setTab($tab)
    {
        $this->tab = $tab;
        $this->emit('setTab', $tab);
    }

    //image
    public function saveImage($name)
    {
        $this->validate([
            $name => 'nullable|image|max:1024', // 1MB Max
        ]);

//        dd($this->$name->storeAs('modules/productionCard', $name . '.jpg'));
    }


}
