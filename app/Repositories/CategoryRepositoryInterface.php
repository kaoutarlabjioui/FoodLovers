<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function find( $id);
    public function create($data);
    public function update($category,$data);
    public function delete( $category);
    public function findByName($category);
}
