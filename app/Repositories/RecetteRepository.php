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
        return Recette::with('category','tags','ingredients')->findOrFail($id);

    }


    public function create($recette){



        // $recette->user()->associate(auth()->user());

        $recette->save();

        return $recette;
        // return Recette::create($data);
    }


    public function update($recette){

        // $array_recette = $recette->toarray();
        // $recette->update($data);
        // $recette->tags()->attach($data['tags']);
        // $recette->ingredient()->attach($data['ingredients']);
        
        return $recette->save();

    }


    public function delete($id){
        // dd($id);
        $recette = recette::whereIn('id',$id)->first();
        // dd($recette);
        return $recette->delete();
    }

}
