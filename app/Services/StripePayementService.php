<?php
namespace App\Services;

use App\Models\Commande;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class StripePayementService implements IStripePaymentService{
protected ICommandeService $commandeService;
 public function __construct(ICommandeService $commandeService){
    $this->commandeService = $commandeService;
 }

    public function makePayment($total){
            // dd($total);
        $totalAPaye = $total["totalAmont"];
        $tax = 99;
        $livraison = 'Gratuite';
        $finalAPaye = $totalAPaye + $tax;
        $commandeId = $total['id'];
        return[
            "totalApaye"=>$totalAPaye,
            "tax"=>$tax,
            "livraison"=>$livraison,
            "finalAPaye"=>$finalAPaye,
            "commande_id"=>$commandeId
        ];

    }

    public function processPayment($data){
        // dd($data);

        Stripe::setApiKey(config('stripe.secret'));
        try{
            Charge::create([
                'amount' => $data['balance'] * 100,
                'currency' => 'mad',
                'source' => $data['stripeToken'],
                'description' => '',
            ]);

            session()->forget('panier');
                // dd($data['commande_id']);
          $commande = $this->commandeService->updateStatus($data['commande_id']);
          return    $commande;

        }catch(CardException $e){
            echo $e->getMessage();
        }


    }









}
