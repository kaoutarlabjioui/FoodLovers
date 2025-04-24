<?php
namespace App\Services;

use App\Repositories\CommandeRepositoryInterface;

class CommandeService implements ICommandeService{

    protected CommandeRepositoryInterface $commandeRepo;
    protected ICommandeItemsService $commandeItemsService;

    public function __construct(CommandeRepositoryInterface $commandeRepo,ICommandeItemsService  $commandeItemsService){
        $this->commandeRepo = $commandeRepo;
        $this->commandeItemsService = $commandeItemsService;
    }

    public function creerCommande($data,$items){
        $commande = $this->commandeRepo->create($data);

        foreach($items as $item){
            $this->commandeItemsService->ajouterItem($commande,$item);
        }

        return $commande;
    }

}
