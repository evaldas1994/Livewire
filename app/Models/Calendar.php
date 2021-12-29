<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Calendar extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_calendar';

    protected $perPage = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_year',
        'f_month',
        'f_month_name',
        'f_d1',
        'f_d2',
        'f_d3',
        'f_d4',
        'f_d5',
        'f_d6',
        'f_d7',
        'f_d8',
        'f_d9',
        'f_d10',
        'f_d11',
        'f_d12',
        'f_d13',
        'f_d14',
        'f_d15',
        'f_d16',
        'f_d17',
        'f_d18',
        'f_d19',
        'f_d20',
        'f_d21',
        'f_d22',
        'f_d23',
        'f_d24',
        'f_d25',
        'f_d26',
        'f_d27',
        'f_d28',
        'f_d29',
        'f_d30',
        'f_d31',
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
     * @var integer
     */
    protected $keyType = 'integer';

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
}
