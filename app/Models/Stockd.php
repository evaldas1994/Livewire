<?php

namespace App\Models;

use App\Traits\UpdateCreatedModifiedUserIdColumns;
use Illuminate\Database\Eloquent\Model;

class Stockd extends Model
{
    use UpdateCreatedModifiedUserIdColumns;

    protected $table = 't_stockd';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_hid',
        'f_hid2',
        'f_storeid1',
        'f_storeid2',
        'f_type',
        'f_stockid',
        'f_barcodeid',
        'f_quantid',
        'f_quant',
        'f_price_purch',
        'f_price_cost',
        'f_price_sale',
        'f_price_disc',
        'f_sum_purch',
        'f_sum_cost',
        'f_sum_sale',
        'f_disc_perc',
        'f_disc_sum',
        'f_vat_perc',
        'f_vat_sum',
        'f_curid',
        'f_rate',
        'f_dim',
        'f_description',
        'f_f1',
        'f_f2',
        'f_f3',
        'f_f4',
        'f_f5',
        'f_r1id',
        'f_r2id',
        'f_r3id',
        'f_r4id',
        'f_r5id',
        'f_departmentid',
        'f_personid',
        'f_projectid',
        'f_reserved',
        'f_calculated',
        'f_system1',
        'f_system2',
        'f_system3',
        'f_quant_barcode',
        'f_price_purch_barcode',
        'f_vat2_code_id',
        'f_sale_sum_cost',
        'f_sale_price_cost',
        'f_sale_quant',

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

}
