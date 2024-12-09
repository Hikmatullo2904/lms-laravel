<?php

namespace App\Actions\Role;

use App\Repositories\Contracts\RoleRepositoryInterface;

class RoleRemovePermissionAction
{

    public function __construct(
        public RoleRepositoryInterface $roleRepository,
    ) {}
    
    /**
     * Handle the incoming request to remove permissions from a role.
     *
     * @param int $id The id of the role.
     * @param array $data The validated request data containing 'permissions'.
     * @return void
     */
    public function handle($id, array $data) : void {
        $role = $this->roleRepository->findById($id);
        $role->permissions()->detach($data['permissions']);
    }
}