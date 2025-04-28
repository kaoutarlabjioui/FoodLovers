<?php
namespace App\Services;

interface IPanierService{
    public function ajouterProduit($produitId,$quantite);
    public function getContenuPanier();
    public function supprimerProduit($produitId);
    public function mettreAJourQuantite( $produitId,  $quantite);
    public function obtenirContenu();
    public function viderPanier();
}
