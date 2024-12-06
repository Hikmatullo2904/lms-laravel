<?php
namespace App\Actions\Role;

use App\Repositories\Contracts\RoleRepositoryInterface;

class RoleAddPermissionAction {

    public function __construct(
        public RoleRepositoryInterface $roleRepository,
    ) {}
    
    /**
     * Handle the incoming request.
     *
     * @param int $id
     * @param array $data
     * @return void
     */
    public function handle($id, array $data) {
        $role = $this->roleRepository->findById($id);
        $role->permissions()->attach($data['permissions']);
    }
}