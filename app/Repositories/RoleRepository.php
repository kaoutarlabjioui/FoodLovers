<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\interfaces\RoleRepositoryInterface as InterfacesRoleRepositoryInterface;
use App\Repositories\RoleRepositoryInterface;

class RoleRepository implements InterfacesRoleRepositoryInterface{

    public function getAll(){

        return Role::all();
    }

    public function findById($id){

        return Role::find($id);
    }

    public function findByName($name){

        return Role::where('role_name',$name)->first();
    }

    public function store($data){

        return Role::create($data);
    }

    public function update($role,$data){

        return $role->update($data);
    }

    public function delete($role){

        return $role->delete();
    }

}
