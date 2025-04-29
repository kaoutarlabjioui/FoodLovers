<?php
namespace App\Services;

use App\Models\Commande;
use App\Repositories\CommandeRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommandeService implements ICommandeService{

    protected CommandeRepositoryInterface $commandeRepo;
    protected ICommandeItemsService $commandeItemsService;

    public function __construct(CommandeRepositoryInterface $commandeRepo,ICommandeItemsService  $commandeItemsService){
        $this->commandeRepo = $commandeRepo;
        $this->commandeItemsService = $commandeItemsService;
    }

    public function creerCommande(){

        $panier = session()->get('panier');

        if(empty($panier)){
            return null;
        }

        if(!Auth::check()){
            redirect()->route('register')->send();
        }

        $user = auth()->user();
        $total = $this->calculerTotal($panier);

        try{
        DB::beginTransaction();
        $commande = new Commande([
            'status' => 'pending',
            'prix_totale' => $total,

        ]);
        $commande->user()->associate($user);
       $this->commandeRepo->create($commande);



        foreach($panier as $produitId=>$item){

            $this->commandeItemsService->ajouterItem($commande,[
                'quantite' => $item['quantite'],
                'prix' => $item['prix'],
                'produit' => $produitId

            ]);

        }
        DB::commit();
        // session()->forget('panier');
        return [
            'commande' => $commande,
            'produits' => $panier,
            'total' => $total
        ];

    }catch(Exception $e){
        DB::rollBack();
        Log::error('Erreur lors de la création de commande : '.$e->getMessage());
        session()->flash('error', 'Erreur lors de la création de commande : '.$e->getMessage());
    }
    }


    private function calculerTotal($panier)
    {
        $total = 0;
        foreach ($panier as $item) {
            $total += $item['prix'] * $item['quantite'];
        }
        return $total;
    }

    public function updateStatus($commande_id){

        // dd($commande_id);
        $commande = $this->commandeRepo->findById($commande_id);
        if (!$commande) {
            throw new \Exception('Commande introuvable.');
        }

        $commande->status = 'terminer';
        $commande->save();
        // dd('hi');
        return $commande;
    }




}


