<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    protected IProduitService $produitService;

public function __construct(IProduit $produitService){
    $this->$produitService=$produitService;
}


    public function index()
    {


    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show(Produit $produit)
    {

    }


    public function edit(Produit $produit)
    {

    }


    public function update(Request $request, Produit $produit)
    {

    }


    public function destroy(Produit $produit)
    {

    }
}
