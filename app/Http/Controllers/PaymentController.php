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
        // dd($commande->all());
       $result= $this->iStripePaymentService->makePayment($commande);
       $totalApaye=$result['totalApaye'];
       $tax = $result['tax'];
       $livraison = $result['livraison'];
       $finalAPaye = $result['finalAPaye'];
        return View('client.clientpayment', compact('totalApaye','tax','livraison','finalAPaye'));

    }


    public function processPayment(Request $request){
            // dd($request);
     $payment= $this->iStripePaymentService->processPayment($request->all());

        if($payment){
            session()->forget('panier');
            return view('client.success');
        }else{
            return view('client.failure');
        }

    }








}
