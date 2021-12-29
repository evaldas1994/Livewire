<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class PaymentGroup extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_paymentgroup';

    protected $perPage = 500;

    public static $operationTypes = [
        'G',
        'M',
    ];

    public static $types = [
        'K',
        'B',
        'A',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_op',
        'f_type',
        'f_deb_accountid',
        'f_cred_accountid',
        'f_counterid',
        'f_system1',
        'f_system2',
        'f_system3',
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
     * Get the payment groups's debit account.
     */
    public function debitAccount()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_deb_accountid');
    }

    /**
     * Get the payment groups's credit account.
     */
    public function creditAccount()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_cred_accountid');
    }

    /**
     * Get the payment groups's counter.
     */
    public function counter()
    {
        return $this->hasOne(Counter::class, 'f_id', 'f_counterid');
    }
}
