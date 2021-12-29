<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Price extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_price';

    protected $perPage = 500;

    public static $types = [
        'P',
        'S',
    ];

    public static $secondPriceTypes = [
        '0',
        '1',
        '2',
        '3',
    ];

    public static $paperColorTypes = [
        '0',
        '1',
        '2',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_stockid',
        'f_type',
        'f_price',
        'f_price_orig',
        'f_storeid',
        'f_valid_from',
        'f_valid_till',
        'f_promotion',
        'f_active',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_secondprice',
        'f_partner_groupid',
        'f_barcodeid',
        'f_papercolor',
        'f_partnerid',
        'f_quant',
        'f_daily',
    ];

    protected $attributes = [
        'f_promotion_name' => null,
        'f_linkedid' => null,
        'f_disc_perc' => null,
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
     * Get the price's store.
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_storeid');
    }

    /**
     * Get the price's partner group.
     */
    public function partnerGroup()
    {
        return $this->hasOne(PartnerGroup::class, 'f_id', 'f_partner_groupid');
    }

    /**
     * Get the price's barcode.
     */
    public function barcode()
    {
        return $this->hasOne(Barcode::class, 'f_id', 'f_barcodeid');
    }

    /**
     * Get the price's partner.
     */
    public function partner()
    {
        return $this->hasOne(Partner::class, 'f_id', 'f_partnerid');
    }
}
