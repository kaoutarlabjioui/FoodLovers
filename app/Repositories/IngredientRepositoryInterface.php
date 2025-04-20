<?php
namespace App\Repositories;

interface IngredientRepositoryInterface{

    public function getAll();
    public function find( $id);
    public function create( $ingredient);
    public function update( $id,$data);
    public function findByName($ingredient);
    public function delete( $id);


}
