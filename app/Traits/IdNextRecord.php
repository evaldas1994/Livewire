<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-09-17
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait IdNextRecord
{
    public static function bootIdNextRecord()
    {
        static::creating(function (Model $model) {
            $model->f_id = newrecord();
        });
    }

}
