<?php

namespace App\Http\Livewire\Discounth;

use Livewire\Component;

class Create extends Component
{
    public $currentTab = 1;

    public $stocks;
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
        $stocks,
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
        $repeatTypes
    )
    {
        $this->stocks = $stocks;
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

        $this-> setOldValue('f_stockid');
        $this-> setOldValue('f_valid_from');
        $this-> setOldValue('f_valid_till');
        $this-> setOldValue('f_daily');
        $this-> setOldValue('f_buystocktype');
        $this-> setOldValue('f_notbuystocktype');
        $this-> setOldValue('f_buyingtype');
        $this-> setOldValue('f_buylineswithdisc');
        $this-> setOldValue('f_buylinesforbiddisc');
        $this-> setOldValue('f_discounttype');
        $this-> setOldValue('f_minamount', '0.00');
        $this-> setOldValue('f_maxamount', '0.00');
        $this-> setOldValue('f_winstocktype');
        $this-> setOldValue('f_notwinstocktype');
        $this-> setOldValue('f_winlineswithdisc');
        $this-> setOldValue('f_winningtype');
        $this-> setOldValue('f_maxwinning', '0.00');
        $this-> setOldValue('f_repeat_type');
        $this-> setOldValue('f_repeated', '0.00');
        $this-> setOldValue('f_winlinesforbiddisc');
        $this-> setOldValue('f_adddiscount');
        $this-> setOldValue('f_manual');
        $this-> setOldValue('f_manualinput');
        $this-> setOldValue('f_showmessage');
        $this-> setOldValue('f_showpopup');
        $this-> setOldValue('f_showtext');
        $this-> setOldValue('f_printmessage');
        $this-> setOldValue('f_printtext');
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
        return view('livewire.discounth.create');
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

    public function setCurrentTab($tabIndex)
    {
        $this->currentTab = $tabIndex;
    }
}
