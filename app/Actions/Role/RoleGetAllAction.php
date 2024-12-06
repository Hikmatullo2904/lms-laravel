<?php

namespace App\Actions\Role;

use App\Repositories\Contracts\RoleRepositoryInterface;

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