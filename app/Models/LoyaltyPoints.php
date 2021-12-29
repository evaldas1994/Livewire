<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class LoyaltyPoints extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_loyalty_points';

    protected $perPage = 500;

    public static $operatorTypes = [
        '',
        'in',
        'not_in',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_partner_groupid',
        'f_discount_card',
        'f_operator',
        'f_validity_points',
        'f_use_points',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_fix_points',
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
    const CREATED_AT = 'f_created_date';

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'f_modified_date';

    /**
     * The name of the "created userid" column.
     *
     * @var string|null
     */
    const CREATED_USERID = 'f_created_userid';

    /**
     * Get the loyalty point's partner group.
     */
    public function partnerGroup()
    {
        return $this->hasOne(PartnerGroup::class, 'f_id', 'f_partner_groupid');
    }
}
