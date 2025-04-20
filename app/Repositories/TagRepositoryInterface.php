<?php

namespace App\Repositories;


interface TagRepositoryInterface
{
    public function getAll();
    public function find( $id);
    public function create($data);
    public function update($tag,$data);
    public function findByName($tag);
    public function delete($tag);
}
