<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class ProductionCard extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_bom';

    protected $perPage = 5;

    public static $gridColumns = [
        'f_id',
        'f_name',
        'f_name2',
        'f_stockid',
        'f_unitid',
        'f_quant',
        'f_description',
        'f_create_date',
        'f_create_userid',
        'f_modified_date',
        'f_modified_userid',

        'stock_name',
    ];

    public static $defaultGridColumns = [
        'f_id',
        'f_name',
        'f_stockid',
        'f_unitid',
        'f_quant',
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
        'f_stockid',
        'f_unitid',
        'f_quant',
        'f_description',
        'f_image1',
        'f_image2',
        'f_image3',
        'f_image4',
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
     * Get the production card's stock.
     */
    public function stock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_stockid');
    }

    /**
     * Get the production card's unit.
     */
    public function unit()
    {
        return $this->hasOne(Unit::class, 'f_id', 'f_unitid');
    }

    /**
     * Get the components for the production card.
     */
    public function components()
    {
        return $this->hasMany(ProductionCardComponent::class, 'f_hid', 'f_id');
    }

    /**
     * @return string
     * Create stockName
     */
    function getStockNameAttribute(): string
    {
        return $this->stock->f_name;
    }
}
