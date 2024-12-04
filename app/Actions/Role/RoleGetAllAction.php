<?php

namespace App\Actions\Role;

use App\Models\Role;
use App\Repositories\RoleRepositoryInterface;

class RoleGetAllAction
{


    public function __construct(
        public RoleRepositoryInterface $roleRepository
    ) {}
    
    /**
     * Retrieve all roles.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Role[]
     */
    public function handle() {
        return $this->roleRepository->all();
    }
}