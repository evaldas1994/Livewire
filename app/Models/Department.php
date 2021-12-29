<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Department extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_department';

    protected $perPage = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_name2',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_parent_id',
        'f_manager_id',
        'f_accountid1',
        'f_accountid2',
    ];

    protected $attributes = [
        'f_doc_confirm_rules' => null,
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
     * Get the department's parent department.
     */
    public function parentDepartment()
    {
        return $this->hasOne(Department::class, 'f_id', 'f_parent_id');
    }

    /**
     * Get the department's employee.
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'f_id', 'f_manager_id');
    }

    /**
     * Get the department's account1.
     */
    public function account1()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_accountid1');
    }

    /**
     * Get the department's account2.
     */
    public function account2()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_accountid2');
    }
}
