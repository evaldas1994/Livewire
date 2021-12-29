<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-10-12
 */


if (!function_exists('selected')) {
    function selected($field, $value, $value2 = null)
    {
        if ($value == old($field)) {
            return 'selected';
        } elseif ($value == $value2 && is_null(old($field))) {
            return 'selected';
        }
        return '';
    }
}
