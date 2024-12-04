<?php

namespace App\Actions\Role;

use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\RoleRepositoryInterface;

class RoleCreateAction 
{

    public function __construct(
        public RoleRepositoryInterface $roleRepository
    ) {}
    
    /**
     * Handle the creation of a new role with associated permissions.
     *
     * @param array $data The validated request data containing 'name' and 'permissions'.
     * @return void
     */
    public function handle(array $data) {
        $role = $this->roleRepository->create($data);
        $role->permissions()->attach($data['permissions']);
    }
}