<?php
namespace App\Services;

interface ICommandeService{
   public function creerCommande();
   public function updateStatus($commande_id);
}

