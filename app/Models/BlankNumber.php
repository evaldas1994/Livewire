<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class BlankNumber extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_blankno';

    protected $perPage = 500;

    public static $opTypes = [
        'P',
        'N',
        'E',
        'Y',
        'T',
        'A',
        'I',
        'R',
        'Z',
        'L',
    ];

    public static $invoiceRegisterTypes = [
        '1',
        '0',
        '2',
        '3',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_counterid',
        'f_op',
        'f_storeid',
        'f_groupid',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_invoice_register',
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
     * Get the blank number's counter.
     */
    public function counter()
    {
        return $this->hasOne(Counter::class, 'f_id', 'f_counterid');
    }

    /**
     * Get the blank number's store.
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_storeid');
    }

    /**
     * Get the blank number's stock operation group.
     */
    public function stockOperationGroup()
    {
        return $this->hasOne(StockOperationGroup::class, 'f_id', 'f_groupid');
    }
}
