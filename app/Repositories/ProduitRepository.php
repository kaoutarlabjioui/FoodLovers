<?php
namespace App\Repositories;

use App\Models\Produit;

class ProduitRepository implements ProduitRepositoryInterface{
    public function getAll(){

        return Produit::all();

    }
    public function create($produit){
        $produit->save();
        return $produit;
    }
    public function getByName($produit){
        $product = Produit::where('nom','=',$produit)->first();
        return $product;
    }
    public function find($id){

      return  Produit::findOrFail($id);

    }

    public function update($produit){
        // dd($produit);
       $produit->save();

       return $produit;
    }
    public function delete($produit){

      $produit =Produit::whereIn('id',$produit)->first();

      return $produit->delete();
    }
}
