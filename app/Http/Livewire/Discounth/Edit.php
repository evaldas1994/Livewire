<?php

namespace App\Http\Livewire\Discounth;

use Livewire\Component;
use App\Models\Discountd;
use App\Models\DiscountStore;

class Edit extends Component
{
    public $currentTab = 1;
    public $showCreateStore;
    public $showEditStore;
    public $showCreateDiscountd;
    public $showEditDiscountd;

    public $stocks;
    public $stores;
    public $barcodes;
    public $actionTypes;
    public $buyStockTypes;
    public $notBuyStockTypes;
    public $winStockTypes;
    public $notWinStockTypes;
    public $buyingTypes;
    public $winningTypes;
    public $discountTypes;
    public $repeatedTypes;
    public $manualTypes;
    public $manualInputTypes;
    public $buyLinesWithDiscTypes;
    public $winLinesWithDiscTypes;
    public $addDiscountTypes;
    public $buyLinesForBidDiscTypes;
    public $winLinesForBidDiscTypes;
    public $printMessageTypes;
    public $repeatTypes;
    public $discountStores;
    public $allDiscountsd;

    public $discountsh;
    public $discountsd;
    public $f_stockid;
    public $f_valid_from;
    public $f_valid_till;
    public $f_daily;
    public $f_buystocktype;
    public $f_notbuystocktype;
    public $f_buyingtype;
    public $f_buylineswithdisc;
    public $f_buylinesforbiddisc;
    public $f_discounttype;
    public $f_minamount;
    public $f_maxamount;
    public $f_winstocktype;
    public $f_notwinstocktype;
    public $f_winlineswithdisc;
    public $f_winningtype;
    public $f_maxwinning;
    public $f_repeat_type;
    public $f_repeated;
    public $f_winlinesforbiddisc;
    public $f_adddiscount;
    public $f_manual;
    public $f_manualinput;
    public $f_showmessage;
    public $f_showpopup;
    public $f_showtext;
    public $f_printmessage;
    public $f_printtext;


    public function mount(
        $discountStores,
        $discountsh,
        $stocks,
        $stores,
        $buyStockTypes,
        $notBuyStockTypes,
        $winStockTypes,
        $notWinStockTypes,
        $buyingTypes,
        $winningTypes,
        $discountTypes,
        $repeatedTypes,
        $manualTypes,
        $manualInputTypes,
        $buyLinesWithDiscTypes,
        $winLinesWithDiscTypes,
        $addDiscountTypes,
        $buyLinesForBidDiscTypes,
        $winLinesForBidDiscTypes,
        $printMessageTypes,
        $repeatTypes,
        $discountStore = null,
        $barcodes,
        $actionTypes,
        $allDiscountsd
    )
    {
        $this->discountsh = $discountsh;
        $this->discountStores = $discountStores;
        $this->stocks = $stocks;
        $this->stores = $stores;
        $this->buyStockTypes = $buyStockTypes;
        $this->notBuyStockTypes = $notBuyStockTypes;
        $this->winStockTypes = $winStockTypes;
        $this->notWinStockTypes = $notWinStockTypes;
        $this->buyingTypes = $buyingTypes;
        $this->winningTypes = $winningTypes;
        $this->discountTypes = $discountTypes;
        $this->repeatedTypes = $repeatedTypes;
        $this->manualTypes = $manualTypes;
        $this->manualInputTypes = $manualInputTypes;
        $this->buyLinesWithDiscTypes = $buyLinesWithDiscTypes;
        $this->winLinesWithDiscTypes = $winLinesWithDiscTypes;
        $this->addDiscountTypes = $addDiscountTypes;
        $this->buyLinesForBidDiscTypes = $buyLinesForBidDiscTypes;
        $this->winLinesForBidDiscTypes = $winLinesForBidDiscTypes;
        $this->printMessageTypes = $printMessageTypes;
        $this->repeatTypes = $repeatTypes;
        $this->discountStore = $discountStore;
        $this->barcodes = $barcodes;
        $this->actionTypes = $actionTypes;
        $this->allDiscountsd = $allDiscountsd;

        $this->setOldValue('f_stockid', $this->discountsh->f_stockid);
        $this->setOldValue('f_valid_from', $this->discountsh->f_valid_from);
        $this->setOldValue('f_valid_till', $this->discountsh->f_valid_till);
        $this->setOldValue('f_daily', $this->discountsh->f_daily);
        $this->setOldValue('f_buystocktype', $this->discountsh->f_buystocktype);
        $this->setOldValue('f_notbuystocktype', $this->discountsh->f_notbuystocktype);
        $this->setOldValue('f_buyingtype', $this->discountsh->f_buyingtype);
        $this->setOldValue('f_buylineswithdisc', $this->discountsh->f_buylineswithdisc);
        $this->setOldValue('f_buylinesforbiddisc', $this->discountsh->f_buylinesforbiddisc);
        $this->setOldValue('f_discounttype', $this->discountsh->f_discounttype);
        $this->setOldValue('f_minamount', $this->discountsh->f_minamount);
        $this->setOldValue('f_maxamount', $this->discountsh->f_maxamount);
        $this->setOldValue('f_winstocktype', $this->discountsh->f_winstocktype);
        $this->setOldValue('f_notwinstocktype', $this->discountsh->f_notwinstocktype);
        $this->setOldValue('f_winlineswithdisc', $this->discountsh->f_winlineswithdisc);
        $this->setOldValue('f_winningtype', $this->discountsh->f_winningtype);
        $this->setOldValue('f_maxwinning', $this->discountsh->f_maxwinning);
        $this->setOldValue('f_repeat_type', $this->discountsh->f_repeat_type);
        $this->setOldValue('f_repeated', $this->discountsh->f_repeated);
        $this->setOldValue('f_winlinesforbiddisc', $this->discountsh->f_winlinesforbiddisc);
        $this->setOldValue('f_adddiscount', $this->discountsh->f_adddiscount);
        $this->setOldValue('f_manual', $this->discountsh->f_manual);
        $this->setOldValue('f_manualinput', $this->discountsh->f_manualinput);
        $this->setOldValue('f_showmessage', $this->discountsh->f_showmessage);
        $this->setOldValue('f_showpopup', $this->discountsh->f_showpopup);
        $this->setOldValue('f_showtext', $this->discountsh->f_showtext);
        $this->setOldValue('f_printmessage', $this->discountsh->f_printmessage);
        $this->setOldValue('f_printtext', $this->discountsh->f_printtext);
    }

    public function changeStock($value)
    {
        if ($value == null) {
            $this->f_stockid = null;
        }else {
            $this->f_stockid = $value;
        }
    }

    public function render()
    {
        return view('livewire.discounth.edit');
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

    public function showCreateDiscountd($value = true)
    {
        $this->showEditStore = false;
        $this->showCreateStore = false;
        $this->showEditDiscountd = false;
        $this->showCreateDiscountd = $value;
    }

    public function showCreateStore($value = true)
    {
        $this->showCreateDiscountd = false;
        $this->showEditDiscountd = false;

        $this->showEditStore = false;
        $this->showCreateStore = $value;
    }

    public function showEditStore(bool $value = true, string $id = null)
    {
        $discountStore = DiscountStore::find($id);

        if ($value == true && $discountStore !== null ) {
            $this->discountStore = $discountStore;
            $this->showCreateStore = false;
            $this->showEditStore = $value;

            $this->showCreateDiscountd = false;
            $this->showEditDiscountd = false;
        } else {
            $this->discountStore = null;
            $this->showCreateStore = false;
            $this->showEditStore = false;

            $this->showCreateDiscountd = false;
            $this->showEditDiscountd = false;
        }
    }

    public function showEditDiscountd(bool $value = true, string $id = null)
    {
        $discountsd = Discountd::find($id);

        if ($value == true && $discountsd !== null ) {
            $this->discountsd = $discountsd;
            $this->showCreateStore = false;
            $this->showEditStore = false;

            $this->showCreateDiscountd = false;
            $this->showEditDiscountd = $value;
        } else {
            $this->discountsd = null;
            $this->showCreateStore = false;
            $this->showEditStore = false;

            $this->showCreateDiscountd = false;
            $this->showEditDiscountd = false;
        }
    }

    public function setCurrentTab($tabIndex)
    {
        $this->currentTab = $tabIndex;
    }

    public $listeners = [
        'showCreateStore' => 'showCreateStore',
        'showEditStore' => 'showEditStore',
        'showCreateDiscountd' => 'showCreateDiscountd',
        'showEditDiscountd' => 'showEditDiscountd'
    ];
}
