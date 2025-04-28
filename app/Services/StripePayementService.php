<?php
namespace App\Services;

use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class StripePayementService implements IStripePaymentService{
protected ICommandeService $commandeService;
 public function __construct(ICommandeService $commandeService){
    $this->commandeService = $commandeService;
 }

    public function makePayment($total){
            dd($total);
        $totalAPaye = $total["totalAmont"];
        $tax = 99;
        $livraison = 'Gratuite';
        $finalAPaye = $totalAPaye + $tax;
        return[
            "totalApaye"=>$totalAPaye,
            "tax"=>$tax,
            "livraison"=>$livraison,
            "finalAPaye"=>$finalAPaye
        ];

    }

    public function processPayment($data){
        Stripe::setApiKey(config('stripe.secret'));
        try{
            Charge::create([
                'amount' => $data['balance'] * 100,
                'currency' => 'mad',
                'source' => $data['stripeToken'],
                'description' => '',
            ]);
            session()->forget('panier');
             $this->commandeService->updateStatus($data['commande_id']);
         return true;

        }catch(CardException $e){
            echo $e->getMessage();
        }


    }









}
