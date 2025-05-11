<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Recette;

class RecetteRepository implements RecetteRepositoryInterface
{
    public function all(){
        return Recette::with('category')->latest()->paginate(5);
    }

    public function find($id){
        return Recette::with('category','tags','ingredients')->findOrFail($id);

    }


    public function create($recette){





        $recette->save();

        return $recette;

    }


    public function update($recette){



        return $recette->save();

    }


    public function delete($id){
        // dd($id);
        $recette = recette::whereIn('id',$id)->first();
        // dd($recette);
        return $recette->delete();
    }

}
