<?php

namespace App\Http\Livewire\Calendar;

use Carbon\Carbon;
use Livewire\Component;

class Edit extends Component
{
    public $f_year;
    public $f_month = 1;
    public $f_d1 = 0;
    public $f_d2 = 0;
    public $f_d3 = 0;
    public $f_d4 = 0;
    public $f_d5 = 0;
    public $f_d6 = 0;
    public $f_d7 = 0;
    public $f_d8 = 0;
    public $f_d9 = 0;
    public $f_d10 = 0;
    public $f_d11 = 0;
    public $f_d12 = 0;
    public $f_d13 = 0;
    public $f_d14 = 0;
    public $f_d15 = 0;
    public $f_d16 = 0;
    public $f_d17 = 0;
    public $f_d18 = 0;
    public $f_d19 = 0;
    public $f_d20 = 0;
    public $f_d21 = 0;
    public $f_d22 = 0;
    public $f_d23 = 0;
    public $f_d24 = 0;
    public $f_d25 = 0;
    public $f_d26 = 0;
    public $f_d27 = 0;
    public $f_d28 = 0;
    public $f_d29 = 0;
    public $f_d30 = 0;
    public $f_d31 = 0;

    public $days = null;
    public $calendar;

    protected $rules = [
        'f_year' => 'integer|required|min:1900|max:2100',
        'f_month' => 'integer|required|min:1|max:12',
        'f_d1' => 'boolean',
        'f_d2' => 'boolean',
        'f_d3' => 'boolean',
        'f_d4' => 'boolean',
        'f_d5' => 'boolean',
        'f_d6' => 'boolean',
        'f_d7' => 'boolean',
        'f_d8' => 'boolean',
        'f_d9' => 'boolean',
        'f_d10' => 'boolean',
        'f_d11' => 'boolean',
        'f_d12' => 'boolean',
        'f_d13' => 'boolean',
        'f_d14' => 'boolean',
        'f_d15' => 'boolean',
        'f_d16' => 'boolean',
        'f_d17' => 'boolean',
        'f_d18' => 'boolean',
        'f_d19' => 'boolean',
        'f_d20' => 'boolean',
        'f_d21' => 'boolean',
        'f_d22' => 'boolean',
        'f_d23' => 'boolean',
        'f_d24' => 'boolean',
        'f_d25' => 'boolean',
        'f_d26' => 'boolean',
        'f_d27' => 'boolean',
        'f_d28' => 'boolean',
        'f_d29' => 'boolean',
        'f_d30' => 'boolean',
        'f_d31' => 'boolean',
    ];

    public function mount($calendar)
    {
        $this->calendar = $calendar;

        $this->f_year = $this->calendar->f_year;
        $this->f_month = $this->calendar->f_month;

        $this->f_d1 = $this->setDay($this->calendar->f_d1);
        $this->f_d2 = $this->setDay($this->calendar->f_d2);
        $this->f_d3 = $this->setDay($this->calendar->f_d3);
        $this->f_d4 = $this->setDay($this->calendar->f_d4);
        $this->f_d5 = $this->setDay($this->calendar->f_d5);
        $this->f_d6 = $this->setDay($this->calendar->f_d6);
        $this->f_d7 = $this->setDay($this->calendar->f_d7);
        $this->f_d8 = $this->setDay($this->calendar->f_d8);
        $this->f_d9 = $this->setDay($this->calendar->f_d9);
        $this->f_d10 = $this->setDay($this->calendar->f_d10);
        $this->f_d11 = $this->setDay($this->calendar->f_d11);
        $this->f_d12 = $this->setDay($this->calendar->f_d12);
        $this->f_d13 = $this->setDay($this->calendar->f_d13);
        $this->f_d14 = $this->setDay($this->calendar->f_d14);
        $this->f_d15 = $this->setDay($this->calendar->f_d15);
        $this->f_d16 = $this->setDay($this->calendar->f_d16);
        $this->f_d17 = $this->setDay($this->calendar->f_d17);
        $this->f_d18 = $this->setDay($this->calendar->f_d18);
        $this->f_d19 = $this->setDay($this->calendar->f_d19);
        $this->f_d20 = $this->setDay($this->calendar->f_d20);
        $this->f_d21 = $this->setDay($this->calendar->f_d21);
        $this->f_d22 = $this->setDay($this->calendar->f_d22);
        $this->f_d23 = $this->setDay($this->calendar->f_d23);
        $this->f_d24 = $this->setDay($this->calendar->f_d24);
        $this->f_d25 = $this->setDay($this->calendar->f_d25);
        $this->f_d26 = $this->setDay($this->calendar->f_d26);
        $this->f_d27 = $this->setDay($this->calendar->f_d27);
        $this->f_d28 = $this->setDay($this->calendar->f_d28);
        $this->f_d29 = $this->setDay($this->calendar->f_d29);
        $this->f_d30 = $this->setDay($this->calendar->f_d30);
        $this->f_d31 = $this->setDay($this->calendar->f_d31);

        $this->getDays();
    }

    public function getDays()
    {
        $this->validate();

        $this->days = Carbon::createFromFormat('Y-m-d', $this->f_year.'-'.$this->f_month.'-1')->daysInMonth;
    }

    public function submit()
    {
        $data = $this->validate();

        $this->calendar->update($data);

        session()->flash('success', trans('global.created_successfully'));

        return redirect()->route('calendars.index');
    }

    public function render()
    {
        return view('livewire.calendar.edit');
    }

    protected function setDay($day)
    {
        return $day !== null ?  $day : 0 ;
    }
}
