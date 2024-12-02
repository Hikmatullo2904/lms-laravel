<?php
namespace App\Repositories;

interface RoleRepositoryInterface
{

    /**
     * Create a new role with the given attributes.
     * 
     * @param array $request
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function create(array $request);
}