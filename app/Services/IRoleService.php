<?php
namespace App\Services;
use App\Models\Role;

interface IRoleService
{
    public function getAll();
    public function findById( $id);
    public function findByName($data);
    public function store($data);
    public function update($role,$data);
    public function delete($role);
}


