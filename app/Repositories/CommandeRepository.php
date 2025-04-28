<?php

namespace App\Repositories;

use App\Models\Commande;

class CommandeRepository implements CommandeRepositoryInterface {

    public function create($commande)
    {

        return $commande->save();
    }


    public function getAll(){

     return Commande::all();

    }

    public function findById($id){

        return Commande::find($id);

       }

}
