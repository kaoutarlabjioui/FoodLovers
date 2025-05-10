<?php

namespace App\Http\Controllers;

use App\Services\IStripePaymentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    protected IStripePaymentService $iStripePaymentService;
    public function __construct(IStripePaymentService $iStripePaymentService)
    {
        $this->iStripePaymentService= $iStripePaymentService;
    }

    public function makePay(Request $commande)
    {
        $result= $this->iStripePaymentService->makePayment($commande);
        $totalApaye=$result['totalApaye'];
        $tax = $result['tax'];
        $livraison = $result['livraison'];
        $finalAPaye = $result['finalAPaye'];
        $commandeId = $commande->commande_id;
    //    dd($commandeId);
        return View('client.clientpayment', compact('totalApaye','tax','livraison','finalAPaye','commandeId'));

    }


    public function processPayment(Request $request){
     $commande= $this->iStripePaymentService->processPayment($request->all());


        if($commande){
            session()->forget('panier');
            return view('client.success',compact('commande'));
        }else{
            return view('client.failure');
        }

    }








}
