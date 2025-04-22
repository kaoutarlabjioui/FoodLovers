<?php
namespace App\Repositories;

interface ProduitRepositoryInterface {
    public function getAll();
    public function create($produit);
    public function getByName($produit);
    public function find($id);
    public function update($data,$produit);
    public function delete($produit);
}
