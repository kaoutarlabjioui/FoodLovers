<?php
namespace App\Repositories;



interface RoleRepositoryInterface{

    public function getAll();
    public function findById( $id);
    public function findByName($data);
    public function Store($data);
    public function Update($role,$data);
    public function delete($role);
}
