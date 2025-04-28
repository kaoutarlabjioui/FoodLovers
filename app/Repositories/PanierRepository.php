<?php
namespace App\Repositories;

use App\Models\Produit;

class PanierRepository implements PanierRepositoryInterface{
    public function ajouter($quantite,$produit){

        $panier = session()->get('panier',[]);

        if (isset($panier[$produit->id])) {
            $panier[$produit->id]['quantite'] += $quantite;
            $panier[$produit->id]['stock'] = $produit->stock;
        } else {
            $panier[$produit->id] = [
                'nom' => $produit->nom,
                'prix' => $produit->prix,
                'photo' => $produit->photo,
                'quantite' => $quantite,
                'stock'=>$produit->stock
            ];
        }

        session()->put('panier', $panier);
// dd($panier);

    }

    public function getPanier()
    {
        return session()->get('panier', []);
    }


    public function supprimer( $produitId)
    {
        $panier = session()->get('panier', []);
        unset($panier[$produitId]);
        session()->put('panier', $panier);
    }

    public function mettreAJourQuantite( $produitId,  $quantite)
    {
        $panier = session()->get('panier', []);
        if (isset($panier[$produitId])) {
            $panier[$produitId]['quantite'] = $quantite;
            session()->put('panier', $panier);
        }
    }



    public function getContenu(): array
{
    $sessionPanier = session()->get('panier', []);
    $contenu = [];

    foreach ($sessionPanier as $produitId => $item) {

        $produit = Produit::find($produitId);
        if ($produit) {
            $contenu[$produitId] = [
                'nom' => $produit->nom,
                'prix' => $produit->prix,
                'photo' => $produit->photo,
                'quantite' => $item['quantite'],
                'sous_total' => $produit->prix * $item['quantite'],
            ];
        }
    }

    return $contenu;
}

public function viderPanier(): void
{
    session()->forget('panier');
}

}
