<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Employee extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_employee';

    protected $perPage = 500;

    public static $maritalStatusTypes = [
        '1',
        '2',
        '3',
    ];

    public static $pensionInsuranceTypes = [
        '0',
        '1',
        '2',
    ];

    public static $sexTypes = [
        '1',
        '2',
    ];

    public static $disablementTypes = [
        '0',
        '1',
        '2',
        '3',
        '4',
        '5',
    ];

    public static $disablementPercentTypes = [
        '0',
        '5',
        '10',
        '15',
        '20',
        '25',
        '30',
        '35',
        '40',
        '45',
        '50',
        '55',
        '60',
        '70',
        '80',
        '90',
        '100',
        'Vidutinių poreikių',
        'Nedidelių poreikių',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_last_name',
        'f_subdivision',
        'f_social_insurance_id',
        'f_adress',
        'f_cell_phone_no',
        'f_home_phone',
        'f_email',
        'f_personal_code',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_uses_nti',
        'f_uses_nti2',
        'f_uses_vsd',
        'f_married',
        'f_growing',
        'f_disablement',
        'f_sex',
        'f_table_nr',
        'f_uses_pi',
        'f_fired',
        'f_userid',
        'f_holiday_balance',
        'f_bank_account',
        'f_direct_debit_bank',
        'f_cash',
        'f_work_shedule_template',
        'f_disability_perc',
    ];

    protected $attributes = [
        'f_uses_nti2' => null,
        'f_growing' => null,
        'f_table_nr' => null,
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
     * Get the employee's department.
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'f_id', 'f_subdivision');
    }

    /**
     * Get the employee's user.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'f_id', 'f_userid');
    }

    /**
     * Get the employee's bank.
     */
    public function bank()
    {
        return $this->hasOne(Bank::class, 'f_id', 'f_direct_debit_bank');
    }

    /**
     * Get the employee's work shedule template.
     */
    public function workSheduleTemplate()
    {
        return $this->hasOne(WorkSheduleTemplate::class, 'f_id', 'f_work_shedule_template');
    }

    /**
     * Get the bonuses for the employee.
     */
    public function bonuses()
    {
        return $this->hasMany(Bonus::class, 'f_employee_id', 'f_id');
    }
}
