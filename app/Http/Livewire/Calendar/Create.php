<?php

namespace App\Http\Livewire\Calendar;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Calendar;

class Create extends Component
{
    public $f_year;
    public $f_month = 1;
    public $f_d1;
    public $f_d2;
    public $f_d3;
    public $f_d4;
    public $f_d5;
    public $f_d6;
    public $f_d7;
    public $f_d8;
    public $f_d9;
    public $f_d10;
    public $f_d11;
    public $f_d12;
    public $f_d13;
    public $f_d14;
    public $f_d15;
    public $f_d16;
    public $f_d17;
    public $f_d18;
    public $f_d19;
    public $f_d20;
    public $f_d21;
    public $f_d22;
    public $f_d23;
    public $f_d24;
    public $f_d25;
    public $f_d26;
    public $f_d27;
    public $f_d28;
    public $f_d29;
    public $f_d30;
    public $f_d31;

    public $days = null;

    protected $rules = [
        'f_year' => 'integer|required|min:1900|max:2100',
        'f_month' => 'integer|required|min:1|max:12',
        'f_d1' => 'nullable|boolean',
        'f_d2' => 'nullable|boolean',
        'f_d3' => 'nullable|boolean',
        'f_d4' => 'nullable|boolean',
        'f_d5' => 'nullable|boolean',
        'f_d6' => 'nullable|boolean',
        'f_d7' => 'nullable|boolean',
        'f_d8' => 'nullable|boolean',
        'f_d9' => 'nullable|boolean',
        'f_d10' => 'nullable|boolean',
        'f_d11' => 'nullable|boolean',
        'f_d12' => 'nullable|boolean',
        'f_d13' => 'nullable|boolean',
        'f_d14' => 'nullable|boolean',
        'f_d15' => 'nullable|boolean',
        'f_d16' => 'nullable|boolean',
        'f_d17' => 'nullable|boolean',
        'f_d18' => 'nullable|boolean',
        'f_d19' => 'nullable|boolean',
        'f_d20' => 'nullable|boolean',
        'f_d21' => 'nullable|boolean',
        'f_d22' => 'nullable|boolean',
        'f_d23' => 'nullable|boolean',
        'f_d24' => 'nullable|boolean',
        'f_d25' => 'nullable|boolean',
        'f_d26' => 'nullable|boolean',
        'f_d27' => 'nullable|boolean',
        'f_d28' => 'nullable|boolean',
        'f_d29' => 'nullable|boolean',
        'f_d30' => 'nullable|boolean',
        'f_d31' => 'nullable|boolean',
    ];

    public function getDays()
    {
        $this->validate();

        $this->days = Carbon::createFromFormat('Y-m-d', $this->f_year.'-'.$this->f_month.'-1')->daysInMonth;
    }

    public function submit()
    {
        $data = $this->validate();

        Calendar::create($data);
        session()->flash('success', trans('global.created_successfully'));

        return redirect()->route('calendars.index');
    }

    public function render()
    {
        return view('livewire.calendar.create');
    }

}
