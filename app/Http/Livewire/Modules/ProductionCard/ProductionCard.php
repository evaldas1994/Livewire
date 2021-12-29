<?php

namespace App\Http\Livewire\Modules\ProductionCard;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\ProductionCardComponent;
use App\Models\ProductionCard as ProductionCardModel;

class ProductionCard extends Component
{
    public $oldData = null;
    public $pageData = null;

    public $productionCard = null;
    public $productionCardComponent = null; //naudojamas edit'ui
    public $page = 'index';
    public $tab = 1;

    public $showPopupCreate = false;
    public $showPopupEdit = false;

    public $showFStockid = false;

    public function mount($productionCard=null, $productionCardComponent = null, $page='index', $tab=1, $popup=null, $oldData=null)
    {
        $this->productionCard = $productionCard;
        $this->page = $page;
        $this->oldData = $oldData;

//        dd($this->oldData);
    }

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'setPage' => 'setPage',
        'setTab' => 'setTab',
        'setProductionCard' => 'setProductionCard',
        'showPopupCreate' => 'showPopupCreate',
        'showPopupEdit' => 'showPopupEdit',
        'updateProductionCard' => 'updateProductionCard',
        'deleteProductionCardComponent' => 'deleteProductionCardComponent',
        'showFStockid' => 'showFStockid',
        'mount' => 'mount',
    ];

    /**
     * @return View
     */
    public function render(): View
    {
        return view('livewire.modules.productionCard.productionCard')
            ->extends('layouts.app')
            ->section('content');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        try {
            ProductionCardModel::findOrFail($id)->delete();
            session()->flash('success', __('global.deleted_successfully'));
            return redirect(request()->header('Referer'));
        } catch (\Exception) {
            session()->flash('error', __('global.delete_failed'));
            return redirect(request()->header('Referer'));
        }
    }

    /**
     * @param $page
     * @param null $id
     */
    public function setPage($page, $id = null): void
    {
        $this->productionCard = $id;
        $this->page = $page;
    }

    public function setTab($tab): void
    {
        $this->tab = $tab;
    }

    public function showPopupCreate($bool = true)
    {
        $this->showPopupCreate = $bool;
    }

    public function showPopupEdit($bool = true, string $id = null)
    {
        if ($id !== null) {
            $this->productionCardComponent = $id;
        } else {
            $this->productionCardComponent = null;
        }

        $this->showPopupEdit = $bool;
    }

    public function showFStockid($bool = true, $pageData = null)
    {
        $this->page = null;
        $this->pageData = $pageData;
        $this->showFStockid = $bool;
    }
}
