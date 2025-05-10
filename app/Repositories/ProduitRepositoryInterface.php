<?php
namespace App\Repositories;

interface ProduitRepositoryInterface {
    public function getAll();
    public function create($produit);
    public function getByName($produit);
    public function find($id);
    public function update($produit);
    public function delete($produit);
}
