<?php
namespace App\Repositories;

interface RecetteRepositoryInterface{
    public function all();
    public function find( $id);
    public function create( $recette);
    public function update( $data);
    public function delete( $id);
}
