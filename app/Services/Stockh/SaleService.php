<?php

namespace App\Services\Stockh;

use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;


/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-09-28
 */
class SaleService extends BaseService
{
    /**
     * @param array $payloads
     *
     * @return Model|null
     */
    public function create(array $payloads): ?Model
    {
        $payloads = array_merge($payloads,[
            'f_op' => $this->model::SALE_TYPE,
            'f_docno' => counter($this->model::SALE_TYPE)
        ]);
        $model = $this->model->create($payloads);

        return $model->refresh();
    }
}
