<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-08-31
 */

namespace App\Traits;

trait IdToUppercase
{
    public function setFIdAttribute($value)
    {
        $this->attributes['f_id'] = strtoupper($value);
    }
}
