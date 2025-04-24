<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommandeRequest;
use App\Models\Commande;
use App\Services\ICommandeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{

    protected ICommandeService $commandeService;

    public function __construct(ICommandeService $commandeService)
    {
        $this->commandeService = $commandeService;
    }


    public function index()
    {
        //
    }


    public function store(StoreCommandeRequest $request)
    {
        $data = $request->validated();
        $data['client_id'] = Auth::id();

        $data['status']=$data['status']??'pending';
        $commande = $this->commandeService->creerCommande($data,$data['items']);
        return redirect("/commandeshow");
    }


    public function show(Commande $commande)
    {
        //
    }


    public function edit(Commande $commande)
    {
        //
    }


    public function update(Request $request, Commande $commande)
    {
        //
    }


    public function destroy(Commande $commande)
    {
        //
    }
}
