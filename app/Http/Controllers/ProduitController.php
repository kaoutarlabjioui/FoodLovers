<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\Produit;
use App\Services\IPanierService;
use App\Services\IProduitService;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    protected IProduitService $produitService;
    protected IPanierService  $panierService;
public function __construct(IProduitService $produitService, IPanierService $panierService){
    $this->produitService=$produitService;
    $this->panierService=$panierService;
}


    public function index()
    {
        $produits = $this->produitService->getAll();
        // $user =auth()->user();

        return view('admin.adminshop',compact('produits'));

    }

    public function show()
    {
        $produits = $this->produitService->getAll();

        return view('boutique',compact('produits'));

    }

    public function store(StoreProduitRequest $request)
    {
        $produit=$request->validated();

        $this->produitService->create($produit);

        return redirect()->back();

    }

    public function edit($id)
    {
        $produit = $this->produitService->getById($id);
        return view('admin.editproduit',compact('produit'));
    }


    public function update(UpdateProduitRequest $request)
    {
        $data = $request->validated();
       $produit= $this->produitService->getById($data['id']);
    //    dd($produit);
        $this->produitService->update($produit,$data);
        return redirect('/admin/adminshop');
    }


    public function destroy(Request $produit)
    {
        $this->produitService->delete($produit);
        return redirect()->back();
    }


    public function detailsProduit(Request $request){
        // dd($request);

        $produit = $this->produitService->getById($request->produit);

        return view('detailproduit',compact('produit'));
    }


    public function ajouterAuPanier(Request $request)
    {

        $quantite = $request->input('quantite', 1);
        $this->panierService->ajouterProduit($quantite,$request->produit_id);
        return redirect('/panier')->with('success', 'Produit ajouté au panier.');
    }

    public function voirPanier(){
        $panier = $this->panierService->getContenuPanier();
        $total = array_sum(array_column($panier,'sous_total'));
        return view('panier',compact('panier'));
    }

    public function supprimerDuPanier(Request $request)
    {
        // dd($request);
        $this->panierService->supprimerProduit($request->produit_id);
        return redirect()->back()->with('success', 'Produit supprimé du panier.');
    }

    public function updateQuantite(Request $request, $id)
        {
            $request->validate([
                'quantite' => 'required|integer|min:1'
            ]);

            $this->panierService->mettreAJourQuantite($id, $request->quantite);

            return redirect()->back()->with('success', 'Quantité mise à jour.');
        }

        public function viderPanier()
    {
        $this->panierService->viderPanier();
        return redirect()->back()->with('success', 'Le panier a été vidé.');
    }


}
