<?php
namespace App\Services;


interface ICategoryService{
    public function getAll();
    public function getById($id);
    public function create($data);
    public function update($category,$data);
    public function findByName($category);
    public function delete($category);
}
