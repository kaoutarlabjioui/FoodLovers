<?php
namespace App\Services;


interface IProduitService{
    public function getAll();
    public function create($data);
    public  function getById($id);
    public function getByName($produit);
    public function update($data,$produit);
    public function delete($produit);
}
