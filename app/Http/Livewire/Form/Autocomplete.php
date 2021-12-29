<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Autocomplete extends Component
{
    public $search;
    public $searchShowName;
    public $results = [];

    public $showResults = false;

    public $model;
    public $inputName;

    public $params;

    protected $listeners = [
        'refreshComponent' => '$refresh',
    ];

    public function mount($model, $inputName, $params)
    {
        $this->model = $model;
        $this->inputName = $inputName;
        $this->setParams($params);

        // jei edit'as, užsetinami autocomplete'o input'ai
        if (Arr::get($this->params, 'default_value') != null) {
            $model = "App\Models\\" . $this->model;
            $obj = $model::findOrFail(Arr::get($this->params, 'default_value'));

            $this->select($obj->f_id, $obj->f_name);
        }
    }

    public function updating($name, $value)
    {
        if ($name === 'search' && strlen($value) > 0) {
            $this->results = $this->getAutocompleteData($value);
            $this->showResults = true;
        } else {
            $this->showResults = false;
            $this->results = [];

            $this->select(null, null);
        }
    }

    public function render(): View
    {
        return view('livewire.form.autocomplete');
    }

    public function select($id, $name)
    {
        $this->emitUp(Str::camel('set_' . $this->inputName), $id);

        $this->search = $id;
        $this->searchShowName = $name;

        $this->showResults = false;
    }

    public function setParams($newParams)
    {
        $params = [
            'default_value' => null,
            'search_in_columns' => ['f_id', 'f_name'],
            'results_columns' => ['f_id', 'f_name'],
            'additional_params' => [
                'main' => ['hidden' => false],
                'label' => ['hidden' => false, 'value' => 'modules/productionCard.f_stockid'],
                'autocomplete' => ['hidden' => false, 'readonly' => false, 'class' => null, 'maxlength' => '255'],
                'button' => ['hidden' => false, 'disabled' => false, 'class' => null],
                'results' => ['class' => null],
                'name' => ['hidden' => false, 'readonly' => true, 'maxlength' => '255', 'class' => null],
            ],
        ];

        $this->params = array_merge_recursive_distinct($params, $newParams);
    }

    private function getAutocompleteData($value)
    {
        $model = "App\Models\\" . $this->model;

        return $model::where('f_id', 'like', '%' . strtoupper($value) . '%')
            ->orWhere('f_name', 'like', '%' . strtoupper($value) . '%')
            ->orWhere('f_name', 'like', '%' . strtolower($value) . '%')
            ->limit(10)
            ->get();
    }

    public function clickSearchButton($name = null)
    {
        $this->emitUp('clickSearchButton', $this->inputName);
    }
}
