<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\Produit;
use App\Services\IProduitService;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    protected IProduitService $produitService;

public function __construct(IProduitService $produitService){
    $this->produitService=$produitService;
}


    public function index()
    {
        $produits = $this->produitService->getAll();

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


    // public function show(Produit $produit)
    // {

    // }


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
        $produit = $this->produitService->getById($request->produit);

        return view('detailproduit',compact('produit'));
    }
}
