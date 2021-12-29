<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Stock extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_stock';

    protected $perPage = 10;

    public static $defaultUnit = 'VNT';

    public static $types = [
        '1',
        '2',
        '3',
        '4',
        '5',
    ];

    public static $gpaisPacTypes = [
        '0',
        '1',
        '2',
        '3',
        '4',
        '5',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_name2',
        'f_type',
        'f_groupid',
        'f_unitid',
        'f_pack_unitid',
        'f_pack_quant',
        'f_volume',
        'f_weight',
        'f_valid_days',
        'f_valid_date',
        'f_partnerid',
        'f_code',
        'f_price_purch',
        'f_price_sale1',
        'f_price_sale2',
        'f_price_sale3',
        'f_price_sale4',
        'f_price_sale5',
        'f_discid',
        'f_vat_perc',
        'f_vatid',
        'f_curid',
        'f_accountid',
        'f_f1',
        'f_f2',
        'f_f3',
        'f_f4',
        'f_f5',
        'f_r1id',
        'f_r2id',
        'f_r3id',
        'f_r4id',
        'f_r5id',
        'f_departmentid',
        'f_personid',
        'f_projectid',
        'f_min_quant',
        'f_weightsign',
        'f_product',
        'f_locked',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_scalesign',
        'f_ingredients',
        'f_originating',
        'f_manufacturerid',
        'f_quantity',
        'f_stock_text1',
        'f_stock_text2',
        'f_stock_text3',
        'f_packing',
        'f_partner_discount',
        'f_main_stockid',
        'f_mark1',
        'f_mark2',
        'f_mark3',
        'f_mark4',
        'f_mark5',
        'f_mark6',
        'f_mark7',
        'f_mark8',
        'f_order_block',
        'f_sales_block',
        'f_purch_block',
        'f_height',
        'f_width',
        'f_length',
        'f_image',
        'f_gpais_i',
        'f_gpais_n',
        'f_gpais_a',
        'f_empty_pack',
        'f_pack_type',
        'f_gross_weight',
        'f_catalog_item',
        'f_disp_priority',
        'f_alternative_group_id',
        'f_imgurl',
        'f_ignor_gross_weight',
        'f_prevent_manual_entry',
        'f_diviation_percentage',
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
     * Get the stock's stock group.
     */
    public function stockGroup()
    {
        return $this->hasOne(StockGroup::class, 'f_id', 'f_groupid');
    }

    /**
     * Get the stock's unit.
     */
    public function unit()
    {
        return $this->hasOne(Unit::class, 'f_id', 'f_unitid');
    }

    /**
     * Get the stock's pacK unit.
     */
    public function packUnit()
    {
        return $this->hasOne(Unit::class, 'f_id', 'f_pack_unitid');
    }

    /**
     * Get the stock's manufacturer.
     */
    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class, 'f_id', 'f_manufacturerid');
    }

    /**
     * Get the stock's discounth.
     */
    public function discounth()
    {
        return $this->hasOne(Disch::class, 'f_id', 'f_discid');
    }

    /**
     * Get the stock's vat.
     */
    public function vat()
    {
        return $this->hasOne(Vat::class, 'f_id', 'f_vatid');
    }

    /**
     * Get the stock's alternative stock.
     */
    public function alternativeStock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'alter_stockid');
    }

    /**
     * Get the stock's currency.
     */
    public function currency()
    {
        return $this->hasOne(Currency::class, 'f_id', 'f_curid');
    }

    /**
     * Get the stock's partner.
     */
    public function partner()
    {
        return $this->hasOne(Partner::class, 'f_id', 'f_partnerid');
    }

    /**
     * Get the stock's account.
     */
    public function account()
    {
        return $this->hasOne(Account::class, 'f_id', 'f_accountid');
    }

    /**
     * Get the stock's alternative stock group.
     */
    public function alternativeStockGroup()
    {
        return $this->hasOne(StockGroup::class, 'f_id', 'f_alternative_group_id');
    }

    /**
     * Get the stock's register 1.
     */
    public function register1()
    {
        return $this->hasOne(Register1::class, 'f_id', 'f_r1id');
    }

    /**
     * Get the stock's register 2.
     */
    public function register2()
    {
        return $this->hasOne(Register2::class, 'f_id', 'f_r2id');
    }

    /**
     * Get the stock's register 3.
     */
    public function register3()
    {
        return $this->hasOne(Register3::class, 'f_id', 'f_r3id');
    }

    /**
     * Get the stock's register 4.
     */
    public function register4()
    {
        return $this->hasOne(Register4::class, 'f_id', 'f_r4id');
    }

    /**
     * Get the stock's register 5.
     */
    public function register5()
    {
        return $this->hasOne(Register5::class, 'f_id', 'f_r5id');
    }

    /**
     * Get the stock's department.
     */
    public function department()
    {
        return $this->hasOne(Department::class, 'f_id', 'f_departmentid');
    }

    /**
     * Get the stock's person.
     */
    public function person()
    {
        return $this->hasOne(Person::class, 'f_id', 'f_personid');
    }

    /**
     * Get the stock's project.
     */
    public function project()
    {
        return $this->hasOne(Project::class, 'f_id', 'f_projectid');
    }

    /**
     * Get the stock's main stock.
     */
    public function mainStock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_main_stockid');
    }

    /**
     * Get the prices for the stock.
     */
    public function prices()
    {
        return $this->hasMany(Price::class, 'f_stockid', 'f_id');
    }

    /**
     * Get the joined stocks for the stock.
     */
    public function joinedStocks()
    {
        return $this->hasMany(JoinedStock::class, 'f_stockid', 'f_id');
    }


}
