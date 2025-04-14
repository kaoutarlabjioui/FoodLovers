<?php

use App\Repositories\interfaces\RoleRepositoryInterface;
use App\Services\IRoleService;

class RoleService implements IRoleService
{

    protected RoleRepositoryInterface $iRoleRepo;

    public function __construct(RoleRepositoryInterface $iRoleRepo)
    {
        $this->iRoleRepo = $iRoleRepo ;
    }

    public function getAll(){
        return $this->iRoleRepo->getAll();
    }

    public function findById( $id){

        $role = $this->iRoleRepo->findById($id);
        if(!$role){
            throw new Exception("Role introuvable");
        }
        return $role;
    }

    public function findByName($data){

        return $this->iRoleRepo->findByName($data);
    }

    public function store($data){
        return $this->iRoleRepo->store($data);
    }

    public function update($role,$data){
        if($role->role_name === 'admin'){
            throw new Exception("Le role admin ne peut pas etre modifie.");
        }
        return $this->iRoleRepo->update($role,$data);
    }

    public function delete($role){
        if($role->role_name === 'admin'){
            throw new Exception("Le rôle admin ne peut pas etre supprime .");
        }

        return $this->iRoleRepo->delete($role);
    }
}
