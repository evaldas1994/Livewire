<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Bonus extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    const CREATED_AT = null;
    protected $table = 't_bonus';

    public static $types = [
      '1',
      '2',
    ];

    public static $reasons = [
        'DN',
        'VD',
        'FD',
        'BN',
        'KS',
        'DP',
        'BI',
        'ID',
        'MD',
        'V' ,
        'M' ,
        'D' ,
        'L' ,
        'N' ,
        'NS',
        'A' ,
        'MA',
        'NA',
        'KA',
        'G' ,
        'TA',
        'PV',
        'KR',
        'K' ,
        'SZ',
        'KV',
        'PR',
        'VV',
        'KT',
        'KM',
        'PK',
        'PN',
        'PB',
        'ND',
        'NP',
        'NN',
        'P' ,
        'S' ,
        'ST',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_employee_id',
        'f_bonus_name',
        'f_description',
        'f_value',
        'f_date_from',
        'f_date_till',
        'f_reason',
        'f_type',
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
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'f_modified_date';

    /**
     * The name of the "f create userid" column.
     *
     * @var string|null
     */
    const CREATED_USERID = 'f_modified_userid';
}
