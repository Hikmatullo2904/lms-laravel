<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Closure;

/**
 * BaseRepositoryInterface interface
 */
interface BaseRepositoryInterface
{
    /**
     * @param array $columns
     * @param array $relations
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection;

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allTrashed(): Collection;

    /**
     * @param int|\Closure|null $perPage
     * @param array|string $columns
     * @param string $pageName
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(
        int|null|Closure $perPage = null,
        array|string $columns = ['*'],
        string $pageName = 'page'
    ): LengthAwarePaginator;

    /**
     * @param array $relations
     * @param string $order
     * @param bool $hasPagination
     * @param int|null $itemsPerPage
     * @return Collection|LengthAwarePaginator
     */
    public function getAllByOrder(
        array $relations = [],
        string $order = 'asc',
        bool $hasPagination = false,
        ?int $itemsPerPage = null
    ): Collection | LengthAwarePaginator;

    /**
     * @param string|null $searchedString
     * @param array $relations
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getSearchedSortedData(
        ?string $searchedString,
        array $relations = [],
        int $perPage = 10
    ): LengthAwarePaginator;

    /**
     * @param int|string $id
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findById(
        int|string $id,
        array $columns = ["*"],
        array $relations = [],
        array $appends = []
    ): ?Model;

    /**
     * @param array $where
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findOne(
        array $where = [],
        array $columns = ["*"],
        array $relations = [],
        array $appends = []
    ): ?Model;

    /**
     * @param array $where
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Collection|null
     */
    public function findAll(
        array $where = [],
        array $columns = ["*"],
        array $relations = [],
        array $appends = []
    ): ?Collection;

    /**
     * @param int|string $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findWithTrashedById(int|string $id): ?Model;

    /**
     * @param int|string $id
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findOnlyTrashedById(int|string $id): ?Model;

    /**
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function create(array $data): ?Model;

    /**
     * @param int|string $id
     * @param array $data
     * @return bool
     */
    public function update(int|string $id, array $data): bool;

    /**
     * @param array $attributes
     * @param array $values
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder;
     */
    public function updateOrCreate(array $attributes, array $values = []): Model|Builder;

    /**
     * @param array $attributes
     * @param array $values
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    public function firstOrCreate(array $attributes = [], array $values = []): Model|Builder;

    /**
     * @param int|string $id
     * @return bool
     */
    public function deleteById(int|string $id): bool;

    /**
     * @param int|string $id
     * @return bool
     */
    public function restoreById(int|string $id): bool;

    /**
     * @param int|string $id
     * @return bool
     */
    public function permanentlyDeleteById(int|string $id): bool;
}