<?php
namespace App\Services;

use App\Models\CommandeItems;
use App\Models\Produit;
use App\Repositories\CommandeItemsRepositoryInterface;

class CommandeItemsService implements ICommandeItemsService{

protected CommandeItemsRepositoryInterface $commandeItemsRepo;


public function __construct(CommandeItemsRepositoryInterface $commandeItemsRepo){
    $this->commandeItemsRepo =$commandeItemsRepo;
}

public function ajouterItem($commande,$item){

    $produit = $item['produit'] instanceof Produit
    ? $item['produit']
    : Produit::findOrFail($item['produit']);

    $commandeItem = new CommandeItems([
        'quantite'=> $item['quantite'],
        'prix'=>$item['prix'],
    ]);

    $commandeItem->commande()->associate($commande);
    $commandeItem->produit()->associate($produit);

 return   $this->commandeItemsRepo->save($commandeItem);



}

}

