<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Recette;

class RecetteRepository implements RecetteRepositoryInterface
{
    public function all(){
        return Recette::with('category')->latest()->get();
    }

    public function find($id){
        return Recette::with('category')->findOrFail($id);

    }


    public function create($data,$category){

        
        $recette = new recette();
        $recette->name=$data["name"];
        $recette->category()->associate($category);

        // $recette->user()->associate(auth()->user());

        $recette->save();

        return $recette;
        // return Recette::create($data);
    }


    public function update($id,$data){
        $recette = Recette::findOrFail($id);
        $recette->update($data);
        return $recette;
    }


    public function delete($id){
        $recette = recette::findOrFail($id);
        return $recette->delete();
    }

}
