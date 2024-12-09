<?php

namespace App\Actions\Role;

use App\Repositories\Contracts\RoleRepositoryInterface;

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
    public function handle(array $data) : void {
        $role = $this->roleRepository->create($data);
        $role->permissions()->attach($data['permissions']);
    }
}