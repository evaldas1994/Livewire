<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Productionh extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_productionh';

    protected $perPage = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_groupid',
        'f_docdate',
        'f_docno',
        'f_blankno',
        'f_storeid',
        'f_description',
        'f_templateid1',
        'f_groupid1',
        'f_templateid2',
        'f_groupid2',
        'f_system1',
        'f_system2',
        'f_system3',
    ];

    protected $attributes = [
        'f_op' => 'Y',
        'f_confirmed' => false,
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
     * Get the productionh's production group.
     */
    public function productionGroup()
    {
        return $this->hasOne(ProductionGroup::class, 'f_id', 'f_groupid');
    }

    /**
     * Get the productionh's template1.
     */
    public function template1()
    {
        return $this->hasOne(Template::class, 'f_id', 'f_templateid1');
    }

    /**
     * Get the productionh's stemplate2.
     */
    public function template2()
    {
        return $this->hasOne(Template::class, 'f_id', 'f_templateid2');
    }

    /**
     * Get the productionh's stock operation group.
     */
    public function stockOperationGroup1()
    {
        return $this->hasOne(StockOperationGroup::class, 'f_id', 'f_groupid1');
    }

    /**
     * Get the productionh's stock operation group 2.
     */
    public function stockOperationGroup2()
    {
        return $this->hasOne(StockOperationGroup::class, 'f_id', 'f_groupid2');
    }

    /**
     * Get the productionh's store.
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_storeid');
    }

    /**
     * Get the productionsd for the productionh.
     */
    public function productionsd()
    {
        return $this->hasMany(Productiond::class, 'f_hid', 'f_id');
    }
}
