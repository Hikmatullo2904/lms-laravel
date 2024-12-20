<?php

namespace App\Repositories\Impl;

use App\Models\Permission;
use App\Repositories\Contracts\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}