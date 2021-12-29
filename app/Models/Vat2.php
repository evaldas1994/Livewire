<?php

namespace App\Models;

use App\Traits\IdToUppercase;
use App\Traits\UpdateCreatedModifiedUserIdColumns;
use Illuminate\Database\Eloquent\Model;

class Vat2 extends Model
{
     use IdToUppercase, UpdateCreatedModifiedUserIdColumns;

        protected $table = 't_vat2';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'f_id',
            'f_name',
            'f_vat_perc',
            'f_list_vat_perc',
            'f_order',
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
