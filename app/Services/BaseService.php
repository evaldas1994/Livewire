<?php
/**
 * Created by
 * User: Nerijus Bartoševičius
 * Date: 2021-09-28
 */

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Support\Collection;

class BaseService
{
    protected $model;

    public function __construct($model)
    {
        $this->model = new $model();
    }

    /**
     * @param array|string[] $columns
     * @param array $relations
     *
     * @return Collection|PaginationServiceProvider
     */
    public function all(array $columns = ['*'], array $relations = [])
    {
        return $this->model->with($relations)->get($columns);

    }

    /**
     * @param int|string $modelId
     * @param array|string[] $columns
     * @param array $relations
     * @param array $appends
     *
     * @return Model|null
     */
    public function findById(
        int|string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    /**
     * @param array $payloads
     *
     * @return Model|null
     */
    public function create(array $payloads): ?Model
    {
        $model = $this->model->create($payloads);

        return $model->refresh();
    }

    /**
     * @param int $modelId
     * @param array $payload
     *
     * @return bool
     */
    public function update(int|string $modelId, array $payload): bool
    {
        $model = $this->findById($modelId);

        return $model->update($payload);
    }

    /**
     * @param int|string $modelId
     *
     * @return bool
     */
    public function destroy(int|string $modelId): bool
    {
        return $this->findById($modelId)->delete();
    }

}
