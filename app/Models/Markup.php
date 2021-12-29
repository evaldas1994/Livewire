<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Markup extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_markup';

    protected $perPage = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_partnerid',
        'f_groupid',
        'f_storeid',
        'f_markup_perc',
        'f_include_vat',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_r1id',
        'f_r2id',
        'f_r3id',
        'f_r4id',
        'f_r5id',
        'f_stockid',
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
     * Get the markup's stock.
     */
    public function stock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_stockid');
    }

    /**
     * Get the markup's partner.
     */
    public function partner()
    {
        return $this->hasOne(Partner::class, 'f_id', 'f_partnerid');
    }

    /**
     * Get the markup's stock group.
     */
    public function stockGroup()
    {
        return $this->hasOne(StockGroup::class, 'f_id', 'f_groupid');
    }

    /**
     * Get the markup's store.
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_storeid');
    }

    /**
     * Get the markup's register1.
     */
    public function register1()
    {
        return $this->hasOne(Register1::class, 'f_id', 'f_r1id');
    }

    /**
     * Get the markup's register2.
     */
    public function register2()
    {
        return $this->hasOne(Register2::class, 'f_id', 'f_r2id');
    }

    /**
     * Get the markup's register3.
     */
    public function register3()
    {
        return $this->hasOne(Register3::class, 'f_id', 'f_r3id');
    }

    /**
     * Get the markup's register4.
     */
    public function register4()
    {
        return $this->hasOne(Register4::class, 'f_id', 'f_r4id');
    }

    /**
     * Get the markup's register5.
     */
    public function register5()
    {
        return $this->hasOne(Register5::class, 'f_id', 'f_r5id');
    }
}
