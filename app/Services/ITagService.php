<?php

namespace App\Services;

interface ITagService{

    public function getAll();
    public function getById($id);
    public function create($data);
    public function update($tag,$data);
    public function findByName($tag);
    public function delete($tag);
}





