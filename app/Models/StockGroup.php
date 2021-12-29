<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class StockGroup extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_stockgroup';

    protected $perPage = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_name',
        'f_name2',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_allowed_from',
        'f_allowed_to',
        'f_ignore_promotion',
        'f_ignore_voucher',
        'f_group_level',
        'f_group_parent',
        'f_catalog_group',
        'f_ignor_gross_weight',
        'f_disp_priority',
        'f_name_short_lt',
        'f_name_short_en',
        'f_name_short_ru',
        'f_imgurl',
        'f_perishable_goods',
        'f_age_restriction',
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
     * Get the stock group's parent group.
     */
    public function parentGroup()
    {
        return $this->hasOne(StockGroup::class, 'f_id', 'f_group_parent');
    }
}
