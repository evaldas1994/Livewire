<?php

namespace App\Http\Livewire\Budget;

use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $accounts;
    public $registers1;
    public $registers2;
    public $registers3;
    public $registers4;
    public $registers5;
    public $departments;
    public $projects;
    public $years;
    public $months;

    public $f_id;
    public $f_accountid;
    public $f_year;
    public $f_month;
    public $f_r1id;
    public $f_r2id;
    public $f_r3id;
    public $f_r4id;
    public $f_r5id;
    public $f_departmentid;
    public $f_projectid;
    public $f_system1;
    public $f_system2;
    public $f_system3;
    public $f_credit_sum;
    public $f_debit_sum;

    public function mount(
        $accounts,
        $registers1,
        $registers2,
        $registers3,
        $registers4,
        $registers5,
        $departments,
        $projects,
        $years,
        $months
    )
    {
        $this->accounts = $accounts;
        $this->registers1 = $registers1;
        $this->registers2 = $registers2;
        $this->registers3 = $registers3;
        $this->registers4 = $registers4;
        $this->registers5 = $registers5;
        $this->departments = $departments;
        $this->projects = $projects;
        $this->years = $years;
        $this->months = $months;

        $today = Carbon::now();

        $this->setOldValue('f_id');
        $this->setOldValue('f_accountid');
        $this->setOldValue('f_year', $today->format('Y'));
        $this->setOldValue('f_month', $today->format('m'));
        $this->setOldValue('f_r1id');
        $this->setOldValue('f_r2id');
        $this->setOldValue('f_r3id');
        $this->setOldValue('f_r4id');
        $this->setOldValue('f_r5id');
        $this->setOldValue('f_departmentid');
        $this->setOldValue('f_projectid');
        $this->setOldValue('f_system1');
        $this->setOldValue('f_system2');
        $this->setOldValue('f_system3');
        $this->setOldValue('f_credit_sum');
        $this->setOldValue('f_debit_sum');

        $this->setId();
    }

    public function render()
    {
        return view('livewire.budget.create');
    }

    public function setId()
    {
        if ($this->f_year !== null) {
            $this->f_id = $this->f_year;

            if ($this->f_month !== null) {
                $this->f_id = $this->f_year.$this->f_month;
                if ($this->f_accountid !== null) {
                    $this->f_id = $this->f_year.$this->f_month.$this->f_accountid;
                }
            }
        } else {
            $this->f_id = null;
        }
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
}
