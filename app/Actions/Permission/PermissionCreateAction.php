<?php

namespace App\Actions\Permission;

use App\Repositories\Contracts\PermissionRepositoryInterface;

class PermissionCreateAction {

    public function __construct(
        public PermissionRepositoryInterface $permissionRepository
    ) {} 
    
    /**
     * Handle the creation of a new permission.
     *
     * @param array $data The validated request data containing permission attributes.
     * @return void
     */
    public function handle(array $data) : void {
        $this->permissionRepository->create($data);
    }
}