<?php

namespace App\Actions\Permission;

use App\Models\Permission;
use App\Repositories\Contracts\PermissionRepositoryInterface;

class PermissionGetAllAction 
{

    public function __construct(
        public PermissionRepositoryInterface $permissionRepository
    ) {}
    
    /**
     * Return all permissions.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[]
     */
    public function handle() {
        return $this->permissionRepository->all();
    }
}