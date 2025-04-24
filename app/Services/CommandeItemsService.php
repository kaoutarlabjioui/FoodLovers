<?php
namespace App\Services;

use App\Models\CommandeItems;
use App\Repositories\CommandeItemsRepositoryInterface;

class CommandeItemsService implements ICommandeItemsService{

protected CommandeItemsRepositoryInterface $commandeItemsRepo;


public function __construct(CommandeItemsRepositoryInterface $commandeItemsRepo){
    $this->commandeItemsRepo =$commandeItemsRepo;
}

public function ajouterItem($commande,$item){

    $commandeItem = new CommandeItems([
        'quantite'=> $item['quantite'],
        'prix'=>$item['prix'],
    ]);

    $commandeItem->commande()->associate($commande);
    $commandeItem->produit()->associate($item['produit']);

    $this->commandeItemsRepo->save($commandeItem);



}

}

