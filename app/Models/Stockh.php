<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\UpdateCreatedModifiedUserIdColumns;
use Illuminate\Database\Eloquent\Model;

class Stockh extends Model
{
    use UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_stockh';

    const SALE_TYPE = 'A';
    const MOVE_TYPE = 'E';
    const PURCHASE_TYPE = 'I';
    const STOCK_OUT_TYPE = 'N';
    const STOCK_IN_TYPE = 'P';
    const SALE_RETURN_TYPE = 'R';
    const ORDER_TYPE = 'U';
    const PURCHASE_RETURN_TYPE = 'Z';

    public static $opTypes = [
        self::SALE_TYPE,
        self::MOVE_TYPE,
        self::PURCHASE_TYPE,
        self::STOCK_OUT_TYPE,
        self::STOCK_IN_TYPE,
        self::SALE_RETURN_TYPE,
        self::ORDER_TYPE,
        self::PURCHASE_RETURN_TYPE,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_op',
        'f_groupid',
        'f_docdate',
        'f_opdate',
        'f_userid',
        'f_docno',
        'f_blankno',
        'f_storeid1',
        'f_storeid2',
        'f_partnerid1',
        'f_partnerid2',
        'f_description',
        'f_templateid',
        'f_method',
        'f_enter_type',
        'f_disc_type',
        'f_vat_type',
        'f_pay_days',
        'f_curid',
        'f_rate',
        'f_dim',
        'f_adate',
        'f_ano',
        'f_calc_vat',
        'f_confirmed_stock',
        'f_confirmed_payment',
        'f_confirmed_ledger',
        'f_invoice_register',
        'f_invoice_sent',
        'f_linkedid',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_discount_card',
        'f_cargo_waybill_id',
        'f_package_vmi_id',
        'f_orderid',
        'f_imp_doc_id',
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

    public function stockd()
    {
        return $this->hasMany(Stockd::class, 'f_hid', 'f_id');
    }

    public function partner1()
    {
        return $this->hasOne(Partner::class, 'f_id', 'f_partnerid1');
    }

    public function partner2()
    {
        return $this->hasOne(Partner::class, 'f_id', 'f_partnerid2');
    }

    public function store1()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_storeid1');
    }

    public function store2()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_storeid2');
    }

    /*


    public function scopeReturnSales($query)
    {
        return $query->where('f_op', 'R');
    }

    public function scopePurchases($query)
    {
        return $query->where('f_op', 'I');
    }

    public function scopeReturnPurchases($query)
    {
        return $query->where('f_op', 'Z');
    }

    */

    public function scopeSales($query)
    {
        return $query->where('f_op', self::SALE_TYPE);
    }
}
