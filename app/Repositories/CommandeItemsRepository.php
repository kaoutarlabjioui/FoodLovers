<?php

namespace App\Repositories;

class CommandeItemsRepository implements CommandeItemsRepositoryInterface{


public function save($commandeItem){
    $commandeItem->save();
}


}
