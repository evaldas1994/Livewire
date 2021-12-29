<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class ProductionCardComponent extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_bom_components';

    protected $perPage = 500;

    public static $types = [
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
        'f_hid',
        'f_type',
        'f_stockid',
        'f_price',
        'f_unitid',
        'f_quant',
        'f_alter_stockid',
        'f_neto',
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
     * Get the bank production card component's production card.
     */
    public function productionCard()
    {
        return $this->hasOne(ProductionCard::class, 'f_id', 'f_hid');
    }

    /**
     * Get the production card component's stock.
     */
    public function stock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_stockid');
    }

    /**
     * Get the production card component's alternative stock.
     */
    public function alterStock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_alter_stockid');
    }

    /**
     * Get the production card component's unit.
     */
    public function unit()
    {
        return $this->hasOne(Unit::class, 'f_id', 'f_unitid');
    }
}
