<?php
namespace App\Services;

interface IIngredientService {

    public function getAll();
    public function getById($id);
    public function create($data);
    public function update($ingredient,$data);
    public function findByName($ingredient);
    public function delete($ingredient);

}
