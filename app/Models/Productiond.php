<?php

namespace App\Models;

use App\Traits\IdNextRecord;
use App\Traits\IdToUppercase;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UpdateCreatedModifiedUserIdColumns;

class Productiond extends Model
{
    use IdToUppercase, UpdateCreatedModifiedUserIdColumns, IdNextRecord;

    protected $table = 't_productiond';

    protected $perPage = 500;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_id',
        'f_hid',
        'f_bomid',
        'f_quant',
        'f_description',
        'f_r1id',
        'f_r2id',
        'f_r3id',
        'f_r4id',
        'f_r5id',
        'f_f1',
        'f_f2',
        'f_f3',
        'f_f4',
        'f_f5',
        'f_storeid',
        'f_system1',
        'f_system2',
        'f_system3'
    ];

    protected $attributes = [
        'f_type' => '1'
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
     * Get the productiond's production card.
     */
    public function productionCard()
    {
        return $this->hasOne(ProductionCard::class, 'f_id', 'f_bomid');
    }

    /**
     * Get the productiond's store.
     */
    public function store()
    {
        return $this->hasOne(Store::class, 'f_id', 'f_storeid');
    }

    /**
     * Get the productiond's prosuctionh.
     */
    public function prosuctionh()
    {
        return $this->hasOne(Productionh::class, 'f_id', 'f_hid');
    }

    /**
     * Get the productiond's register1.
     */
    public function register1()
    {
        return $this->hasOne(Register1::class, 'f_id', 'f_r1id');
    }

    /**
     * Get the productiond's register2.
     */
    public function register2()
    {
        return $this->hasOne(Register2::class, 'f_id', 'f_r2id');
    }

    /**
     * Get the productiond's register3.
     */
    public function register3()
    {
        return $this->hasOne(Register3::class, 'f_id', 'f_r3id');
    }

    /**
     * Get the productiond's register4.
     */
    public function register4()
    {
        return $this->hasOne(Register4::class, 'f_id', 'f_r4id');
    }

    /**
     * Get the productiond's register5.
     */
    public function register5()
    {
        return $this->hasOne(Register5::class, 'f_id', 'f_r5id');
    }

}
