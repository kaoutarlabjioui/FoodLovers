@extends('client.layouts')

@section('title', 'payment page')
@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">
    <!-- Header -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Finaliser votre commande</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Complétez votre paiement pour confirmer votre commande</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Payment Form -->
        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Détails du paiement</h2>

            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg hidden">
                Paiement effectué avec succès!
            </div>

            <form action="/command/pay" method="post" class="require-validation space-y-5" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf
                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-1">Nom complet</label>
                    <input type="text" name="billing_name" value="{{auth()->user()->first_name}} {{auth()->user()->last_name}}" class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500" placeholder="John Doe">
                </div>

                <div>
                    <label class="block text-gray-700 dark:text-gray-300 mb-1">Numéro de carte</label>
                    <div class="relative">
                        <input type="text" class="card-number w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500" placeholder="4242 4242 4242 4242">
                        <i class="fas fa-credit-card absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">CVC</label>
                        <input type="text" class="card-cvc w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500" placeholder="CVC">
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Mois</label>
                        <input type="text" class="card-expiry-month w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500" placeholder="MM">
                    </div>
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 mb-1">Année</label>
                        <input type="text" class="card-expiry-year w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500" placeholder="YYYY">
                    </div>
                </div>

                <div class="error hidden p-4 bg-red-100 text-red-700 rounded-lg">
                    <p>Veuillez corriger les erreurs et réessayer.</p>
                </div>

                <input type="hidden" name="balance" value="{{$finalAPaye}}">
                <input type="hidden" name="commande_id" value="{{ $commandeId }}">


                <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-3 rounded-lg text-lg font-semibold transition duration-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2">
                    Payer maintenant
                </button>

                <p class="text-sm text-gray-500 dark:text-gray-400 text-center mt-4">
                    <i class="fas fa-lock mr-1"></i> Paiement sécurisé - Vos données sont protégées
                </p>
            </form>
        </div>

        <!-- Pricing Details -->
        <div class="mt-6 grow sm:mt-8 lg:mt-0">
            <div class="space-y-4 rounded-lg border border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800 p-8 shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Résumé de la commande</h2>

                <div class="space-y-4">
                    <dl class="flex items-center justify-between">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Prix original</dt>
                        <dd class="text-base font-medium text-green-500">{{$totalApaye}}</dd>
                    </dl>
                    <dl class="flex items-center justify-between">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Livraison</dt>
                        <dd class="text-base font-medium text-blue-500">{{$livraison}}</dd>
                    </dl>
                    <dl class="flex items-center justify-between">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Taxes</dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">{{$tax}}</dd>
                    </dl>
                </div>

                <dl class="flex items-center justify-between border-t border-gray-200 pt-4 mt-4 dark:border-gray-700">
                    <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-lg font-bold text-pink-600 dark:text-pink-400">{{$finalAPaye}}</dd>
                </dl>
            </div>

            <!-- Politique de retour -->
            <div class="mt-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Politique de retour</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Satisfait ou remboursé sous 14 jours. Consultez notre <a href="#" class="text-pink-600 hover:text-pink-700 dark:text-pink-400 dark:hover:text-pink-300">politique de retour</a> pour plus d'informations.
                </p>
            </div>

            <!-- Besoin d'aide -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Besoin d'aide ? <a href="#" class="text-pink-600 hover:text-pink-700 dark:text-pink-400 dark:hover:text-pink-300">Contactez notre service client</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Bouton de basculement mode clair/sombre -->
<div class="fixed bottom-5 right-5">
    <button id="toggleDarkMode" class="p-3 bg-white dark:bg-gray-800 rounded-full shadow-lg text-gray-800 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition-colors duration-200">
        <i class="fas fa-sun text-yellow-500 dark:hidden"></i>
        <i class="fas fa-moon text-blue-300 hidden dark:block"></i>
    </button>
</div>
<script>
    $(function() {
        var $form = $(".require-validation");

        $form.on('submit', function(e) {
            var $inputs = $form.find('.required input');
            var $error = $('.error');
            var valid = true;
            $error.addClass('hidden');

            $inputs.each(function() {
                if (!$(this).val()) {
                    valid = false;
                    $(this).addClass('border-red-500');
                }
            });

            if (!valid) {
                e.preventDefault();
                $error.removeClass('hidden');
                return;
            }

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, function(status, response) {
                    if (response.error) {
                        $error.text(response.error.message).removeClass('hidden');
                    } else {
                        $form.append(`<input type='hidden' name='stripeToken' value='${response.id}'>`);
                        $form.get(0).submit();
                    }
                });
            }
        });
    });
</script>
@endsection
