<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-08-27
 */

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait UpdateCreatedModifiedUserIdColumns
{
    /**
     * Boot update created_userid and f_modified_userid
     *
     * @return void
     */
    public static function bootUpdateCreatedModifiedUserIdColumns()
    {
        static::updating(function (Model $model) {
            $model->{$model->getModifiedUserIdColumn()} = auth()->user()->f_id;
        });

        static::creating(function (Model $model) {
            $model->{$model->getCreatedUseridColumn()} = auth()->user()->f_id;
        });
    }

    /**
     * Get the name of the "created_userid" column.
     *
     * @return string
     */
    public function getCreatedUseridColumn()
    {
        return defined(get_class($this) . "::CREATED_USERID") ? static::CREATED_USERID : 'f_create_userid';
    }

    /**
     * Get the name of the "modified_userid" column.
     *
     * @return string
     */
    public function getModifiedUserIdColumn()
    {
        return defined(get_class($this) . "::MODIFIED_USERID") ? static::MODIFIED_USERID : 'f_modified_userid';
    }

}
