<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Discountd extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_discountd';

    protected $perPage = 500;

    public static $actionTypes = [
        '0',
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
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_hid',
        'f_actiontype',
        'f_actionid',
        'f_barcodeid',
        'f_discount_price',
        'f_system1',
        'f_system2',
        'f_system3',
    ];

    protected $attributes = [
        'f_quant' => '0.0000',
        'f_filter_condition' => null,
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
     * Get the discountd's discounth.
     */
    public function discounth()
    {
        return $this->hasOne(Discounth::class, 'f_id', 'f_hid');
    }

    /**
     * Get the discountd's stock.
     */
    public function stock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_actionid');
    }

    /**
     * Get the discountd's barcode.
     */
    public function barcode()
    {
        return $this->hasOne(Barcode::class, 'f_id', 'f_barcodeid');
    }
}
