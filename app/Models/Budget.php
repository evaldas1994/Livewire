<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use App\Traits\UpdateCreatedModifiedUserIdColumns;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_budget';

    protected $perPage = 500;

    public static $year = [
        '2018',
        '2019',
        '2020',
        '2021',
        '2022',
        '2023',
    ];

    public static $month = [
        '01',
        '02',
        '03',
        '04',
        '05',
        '06',
        '07',
        '08',
        '09',
        '10',
        '11',
        '12',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_accountid',
        'f_year',
        'f_month',
        'f_r1id',
        'f_r2id',
        'f_r3id',
        'f_r4id',
        'f_r5id',
        'f_departmentid',
        'f_projectid',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_credit_sum',
        'f_debit_sum',
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'f_id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The name of the "created at" column.
     *
     * @var string|null
     */
    const CREATED_AT = 'f_create_date';

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'f_modified_date';

    /**
     * Get the budget's account.
     */
    public function account()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_accountid');
    }

    /**
     * Get the budget's register1.
     */
    public function register1()
    {
        return $this->hasOne(Register1::class, 'f_id', 'f_r1id');
    }

    /**
     * Get the budget's register2.
     */
    public function register2()
    {
        return $this->hasOne(Register2::class, 'f_id', 'f_r2id');
    }

    /**
     * Get the budget's register3.
     */
    public function register3()
    {
        return $this->hasOne(Register3::class, 'f_id', 'f_r3id');
    }

    /**
     * Get the budget's register4.
     */
    public function register4()
    {
        return $this->hasOne(Register4::class, 'f_id', 'f_r4id');
    }

    /**
     * Get the budget's register5.
     */
    public function register5()
    {
        return $this->hasOne(Register5::class, 'f_id', 'f_r5id');
    }

    /**
     * Get the budget's department.
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'f_id', 'f_departmentid');
    }

    /**
     * Get the budget's project.
     */
    public function project()
    {
        return $this->hasOne(Project::class, 'f_id', 'f_projectid');
    }
}
