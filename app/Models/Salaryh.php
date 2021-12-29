<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Salaryh extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_salaryh';

    protected $perPage = 500;

    public static $months = [
        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
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
        'f_docdate',
        'f_userid',
        'f_docno',
        'f_blankno',
        'f_blankno',
        'f_name',
        'f_description',
        'f_templateid',
        'f_curid',
        'f_salary',
        'f_adate',
        'f_period_year',
        'f_period_month',
        'f_departmentid',
        'f_userid',
        'f_system1',
        'f_system2',
        'f_system3',
    ];

    protected $attributes = [
        'f_confirmed_ledger' => '0',
        'f_opdate' => null,
        'f_ano' => null,
        'f_op' => 'S',
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

    const CREATED_USERID = 'f_create_userid';

    /**
     * Get the salary's template.
     */
    public function template()
    {
        return $this->hasOne(Template::class, 'f_id', 'f_templateid');
    }

    /**
     * Get the salary's department.
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'f_id', 'f_departmentid');
    }
}
