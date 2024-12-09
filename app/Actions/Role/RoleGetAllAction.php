<?php

namespace App\Actions\Role;

use App\Repositories\Contracts\RoleRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

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
    public function handle() : Collection {
        return $this->roleRepository->all();
    }
}