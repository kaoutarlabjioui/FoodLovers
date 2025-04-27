<?php

namespace App\Services;

use App\Models\Commande;

interface IStripePaymentService
{
    public function makePayment();
    public function processPayment($data);
}
