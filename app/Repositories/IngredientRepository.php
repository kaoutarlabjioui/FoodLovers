<?php
namespace App\Repositories;

use App\Models\Ingredient;

class IngredientRepository implements IngredientRepositoryInterface{

    public function getAll(){
        return Ingredient::all();
    }
    public function find( $id){
        return Ingredient::findOrFail($id);
    }
    public function create( $data){

        return Ingredient::create($data);
    }

    public function update( $ingredient,$data){

       return $ingredient->update($data);
    }
    public function findByName($ingredient){
      $ingrediant = Ingredient::where('ingredient','=',$ingredient)->first();

        return $ingrediant;
    }
    public function delete( $id){

        $ingredient = Ingredient::whereIn('id',$id)->first();

        return $ingredient->delete();

    }
}
