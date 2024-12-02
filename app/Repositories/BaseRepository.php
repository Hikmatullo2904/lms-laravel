<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Closure;

/**
 * BaseRepository class
 */
class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @param  array  $columns
     * @param  array  $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    /**
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        return $this->model->onlyTrashed()->get();
    }

    /**
     * @param  int|Closure|null  $perPage
     * @param  array|string  $columns
     * @param  string  $pageName
     * @return LengthAwarePaginator
     */
    public function paginate(
        int|null|Closure $perPage = null,
        array|string $columns = ['*'],
        string $pageName = 'page'
    ): LengthAwarePaginator {
        return $this->model->paginate($perPage, $columns, $pageName);
    }

    /**
     * @param  array  $relations
     * @param  string  $order
     * @param  bool  $hasPagination
     * @param  int|null  $itemsPerPage
     * @return Collection|LengthAwarePaginator
     */
    public function getAllByOrder(
        array $relations = [],
        string $order = 'asc',
        bool $hasPagination = false,
        ?int $itemsPerPage = null
    ): Collection|LengthAwarePaginator {
        if ($hasPagination) {
            return $this->model->with($relations)->orderBy('created_at', $order)->paginate($itemsPerPage);
        }

        return $this->model->with($relations)->orderBy('created_at', $order)->get();
    }

    /**
     * @param  string|null  $searchedString
     * @param  array  $relations
     * @param  int  $perPage
     * @return LengthAwarePaginator
     */
    public function getSearchedSortedData(
        ?string $searchedString,
        array $relations = [],
        int $perPage = 10
    ): LengthAwarePaginator {

        return $this->model->with($relations)->search($searchedString)->sort()->paginate($perPage);
    }

    /**
     * @param  int|string  $id
     * @param  array  $columns
     * @param  array  $relations
     * @param  array  $appends
     * @return Model|null
     */
    public function findById(
        int|string $id,
        array $columns = ["*"],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model->select($columns)->with($relations)->findOrFail($id)->append($appends);
    }

    /**
     * @param  array  $where
     * @param  array  $columns
     * @param  array  $relations
     * @param  array  $appends
     * @return Model|null
     */
    public function findOne(
        array $where = [],
        array $columns = ["*"],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->model
            ->select($columns)
            ->where($where)
            ->with($relations)
            ->firstOrFail()
            ->append($appends);
    }

    /**
     * @param  array  $where
     * @param  array  $columns
     * @param  array  $relations
     * @param  array  $appends
     * @return Collection
     */
    public function findAll(
        array $where = [],
        array $columns = ["*"],
        array $relations = [],
        array $appends = []
    ): Collection {
        return $this->model
            ->select($columns)
            ->where($where)
            ->with($relations)
            ->get()
            ->append($appends);
    }

    /**
     * @param  int|string  $id
     * @return Model|null
     */
    public function findWithTrashedById(int|string $id): ?Model
    {
        return $this->model->withTrashed()->findOrFail($id);
    }

    /**
     * @param  int|string  $id
     * @return Model|null
     */
    public function findOnlyTrashedById(int|string $id): ?Model
    {
        return $this->model->onlyTrashed()->findOrFail($id);
    }

    /**
     * @param  array  $data
     * @return Model|null
     */
    public function create(array $data): ?Model
    {
        $model = $this->model->create($data);

        return $model->fresh();
    }

    /**
     * @param  array  $attributes
     * @param  array  $values
     * @return Model|Builder
     */
    public function updateOrCreate(array $attributes, array $values = []): Model|Builder
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    /**
     * @param  array  $attributes
     * @param  array  $values
     * @return Model|Builder
     */
    public function firstOrCreate(array $attributes = [], array $values = []): Model|Builder
    {
        return $this->model->firstOrCreate($attributes, $values);
    }

    /**
     * @param  int|string  $id
     * @param  array  $data
     * @return bool
     */
    public function update(int|string $id, array $data): bool
    {
        $model = $this->findById($id);

        return $model->update($data);
    }

    /**
     * @param  int|string  $id
     * @return bool
     */
    public function deleteById(int|string $id): bool
    {
        return $this->findById($id)->delete();
    }

    /**
     * @param  int|string  $id
     * @return bool
     */
    public function restoreById(int|string $id): bool
    {
        return $this->findOnlyTrashedById($id)->restore();
    }

    /**
     * @param  int|string  $id
     * @return bool
     */
    public function permanentlyDeleteById(int|string $id): bool
    {
        return $this->findWithTrashedById($id)->forceDelete();
    }
}