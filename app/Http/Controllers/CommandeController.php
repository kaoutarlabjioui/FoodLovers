<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommandeRequest;
use App\Models\Commande;
use App\Repositories\CommandeRepositoryInterface;
use App\Services\ICommandeService;
use App\Services\IStripePaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{

    protected ICommandeService $commandeService;
    protected CommandeRepositoryInterface $commandeRepo;
    protected IStripePaymentService $stripePaymentService;

    public function __construct(ICommandeService $commandeService,CommandeRepositoryInterface $commandeRepo,IStripePaymentService $stripePaymentService)
    {
        $this->commandeService = $commandeService;
        $this->commandeRepo = $commandeRepo;
        $this->stripePaymentService= $stripePaymentService;
    }


    public function index()
    {
        $commandes = $this->commandeRepo->getAll();

        return view('admin.admincommande',compact('commandes'));

    }


    public function store()
    {


        $resultat = $this->commandeService->creerCommande();


        if ($resultat === null) {
            return back();
        }

        $commande = $resultat['commande'];
        $produits = $resultat['produits'];
        $total = $resultat['total'];

        return view("commandepage", compact('commande', 'produits', 'total'));
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
