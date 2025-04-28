<?php

namespace App\Services;

use App\Models\Produit;
use App\Repositories\PanierRepositoryInterface;

class PanierService implements IPanierService{

protected    PanierRepositoryInterface $panierRepo;

public function __construct(PanierRepositoryInterface $panierRepo){
    $this->panierRepo = $panierRepo;
}


public function ajouterProduit($quantite, $produitId)
    {
        $produit = Produit::findOrFail($produitId);
        // dd($produit);
        $this->panierRepo->ajouter( $quantite,$produit);
    }

public function getContenuPanier()
{
    return $this->panierRepo->getPanier();
}


public function obtenirContenu(){
    return $this->panierRepo->getContenu();
}

public function supprimerProduit( $produitId)
{
    // dd($produitId);
    $this->panierRepo->supprimer($produitId);
}

public function mettreAJourQuantite( $produitId,  $quantite)
{
    $this->panierRepo->mettreAJourQuantite($produitId, $quantite);
}


public function viderPanier()
{
    $this->panierRepo->viderPanier();
}

}
