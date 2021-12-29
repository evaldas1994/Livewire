<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class PricePartner extends Model
{

    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_price_partner';

    protected $perPage = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_stockid',
        'f_partnerid',
        'f_price',
        'f_valid_from',
        'f_valid_till',
        'f_active',
        'f_vat_perc',
        'f_quant',
        'f_system1',
        'f_system2',
        'f_system3',
    ];

    protected $attributes = [
        'f_type' => 'S',
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
     * Get the bank partner price's stock.
     */
    public function stock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_stockid');
    }

    /**
     * Get the bank partner price's partner.
     */
    public function partner()
    {
        return $this->hasOne(Partner::class, 'f_id', 'f_partnerid');
    }
}
