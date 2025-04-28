<?php

namespace App\Repositories;

interface PanierRepositoryInterface{
    public function ajouter($produit,$quantite);
    public function getPanier();
    public function getContenu();
    public function supprimer( $produitId);
    public function viderPanier();
    public function mettreAJourQuantite( $produitId,  $quantite);
}
