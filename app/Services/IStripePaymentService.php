<?php

namespace App\Services;

use App\Models\Commande;

interface IStripePaymentService
{
    public function makePayment($total);
    public function processPayment($data);
}
