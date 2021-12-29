<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-09-17
 */

use App\Models\Param;

if (!function_exists('newrecord')) {
    function newrecord()
    {
        return collect(\Illuminate\Support\Facades\DB::select('select newrecord() as value'))->first()->value;
    }
}
if (!function_exists('counter')) {
    function counter($counterId)
    {
        return collect(
            \Illuminate\Support\Facades\DB::select('select counter(?) as value', [$counterId])
        )->first()->value;
    }
}

if (!function_exists('get_counter')) {
    function get_counter($op, $storeId, $groupId)
    {
        return collect(
            \Illuminate\Support\Facades\DB::select('select get_counter(?,?,?) as value', [$op, $storeId, $groupId])
        )->first()->value;
    }
}

if (!function_exists('setParams')) {
    function setParams()
    {
        $params = Param::all(['f_id', 'f_value']);
        session()->remove('params');
        foreach ($params as $param) {
            session()->put('params.' . $param->f_id, $param->f_value);
        }
    }
}

if (!function_exists('setUserParams')) {
    function setUserParams()
    {
        $params = auth()->user()->params;
        session()->remove('user_params');
        foreach ($params as $param) {
            session()->put('user_params.' . $param->f_id, $param->f_value);
        }
    }
}
