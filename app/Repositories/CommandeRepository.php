<?php

namespace App\Repositories;

use App\Models\Commande;

class CommandeRepository implements CommandeRepositoryInterface {

    public function create($data)
    {
        $commande = Commande::create($data);
        return $commande;
    }
}
