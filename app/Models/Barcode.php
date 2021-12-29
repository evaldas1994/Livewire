<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Barcode extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_barcode';

    protected $perPage = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_stockid',
        'f_default',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_ratio',
        'f_name',
        'f_neto',
        'f_plastic',
        'f_paper',
        'f_glass',
        'f_wood',
        'f_pap1',
        'f_pap2',
        'f_usadid',
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
     * Get the barcode's stock.
     */
    public function stock()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_stockid');
    }

    /**
     * Get the barcode's usad.
     */
    public function usad()
    {
        return $this->hasOne(Stock::class, 'f_id', 'f_usadid');
    }
}
