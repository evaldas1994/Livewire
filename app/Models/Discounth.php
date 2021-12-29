<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Discounth extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_discounth';

    protected $perPage = 500;

    public static $buyStockTypes = [
        '0',
        '1',
        '2',
        '3',
    ];

    public static $notBuyStockTypes = [
        '0',
        '1',
        '2',
        '3',
    ];

    public static $winStockTypes = [
        '0',
        '1',
        '2',
        '3',
    ];

    public static $notWinStockTypes = [
        '0',
        '1',
        '2',
        '3',
    ];

    public static $buyingTypes = [
        '0',
        '1',
        '2',
    ];

    public static $winningTypes = [
        '0',
        '1',
        '2',
        '3',
        '4',
    ];

    public static $discountTypes = [
        '0',
        '1',
        '2',
        '3',
        '4',
    ];

    public static $repeatedTypes = [
        '0',
        '1',
    ];

    public static $manualTypes = [
        '0',
        '1',
    ];

    public static $manualInputTypes = [
        '0',
        '1',
        '2',
    ];

    public static $buyLinesWithDiscTypes = [
        '0',
        '1',
        '2',
    ];

    public static $winLinesWithDiscTypes = [
        '0',
        '1',
        '2',
        '3',
    ];

    public static $addDiscountTypes = [
        '0',
        '1',
    ];

    public static $buyLinesForBidDiscTypes = [
        '0',
        '1',
        '2',
    ];

    public static $winLinesForBidDiscTypes = [
        '0',
        '1',
        '2',
    ];

    public static $printMessageTypes = [
        '0',
        '1',
        '2',
    ];

    public static $repeatTypes = [
        '0',
        '1',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_stockid',
        'f_valid_from',
        'f_valid_till',
        'f_buystocktype',
        'f_notbuystocktype',
        'f_winstocktype',
        'f_notwinstocktype',
        'f_minamount',
        'f_maxamount',
        'f_buyingtype',
        'f_winningtype',
        'f_maxwinning',
        'f_discounttype',
        'f_repeated',
        'f_manual',
        'f_manualinput',
        'f_buylineswithdisc',
        'f_winlineswithdisc',
        'f_adddiscount',
        'f_buylinesforbiddisc',
        'f_winlinesforbiddisc',
        'f_showmessage',
        'f_showtext',
        'f_printmessage',
        'f_printtext',
        'f_repeat_type',
        'f_showpopup',
        'f_daily',
        'f_system1',
        'f_system2',
        'f_system3',
    ];

    protected $attributes = [
        'f_groupid' => null,
        'f_storeid' => null,
        'f_priority' => 0,
        'f_minwinning' => '0.0000',
        'f_onlyone' => 0,
        'f_restorediscount' => 0,
        'f_printcheck' => 0,
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
     * Get the discounth's stock.
     */
    public function stock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_stockid');
    }

    /**
     * Get the stores for the discounth.
     */
    public function stores()
    {
        return $this->hasMany(DiscountStore::class, 'f_hid', 'f_id');
    }

    /**
     * Get the discountsd for the discounth.
     */
    public function discountsd()
    {
        return $this->hasMany(Discountd::class, 'f_hid', 'f_id');
    }
}
