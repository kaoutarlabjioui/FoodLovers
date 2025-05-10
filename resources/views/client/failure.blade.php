@extends('client.layouts')
@section('title', 'Paiement échoué - FoodLovers')
@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto">
        <!-- Carte d'échec -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- En-tête avec icône -->
            <div class="bg-red-50 p-8 flex flex-col items-center">
                <div class="w-20 h-20 rounded-full bg-red-100 flex items-center justify-center mb-4">
                    <i class="fas fa-times-circle text-4xl text-red-500"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 text-center">Paiement échoué</h1>
                <p class="text-gray-600 text-center mt-2">Nous n'avons pas pu traiter votre paiement.</p>
            </div>

            <!-- Détails de l'erreur -->
            <div class="p-8">
                <!-- Message d'erreur -->
                @if(session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Raisons possibles -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-4">Raisons possibles</h2>
                    <ul class="bg-gray-50 rounded-lg p-4 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Informations de carte incorrectes ou expirées</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Fonds insuffisants sur votre compte</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Problème temporaire avec notre système de paiement</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Transaction refusée par votre banque</span>
                        </li>
                    </ul>
                </div>

                <!-- Que faire maintenant -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-4">Que faire maintenant ?</h2>
                    <div class="bg-gray-50 rounded-lg p-4 space-y-2">
                        <p class="text-gray-700">Voici quelques suggestions pour résoudre ce problème :</p>
                        <ul class="space-y-2 mt-2">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Vérifiez les informations de votre carte</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Essayez une autre méthode de paiement</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Contactez votre banque pour plus d'informations</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                                <span class="text-gray-700">Réessayez ultérieurement</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                <!-- <form id="payment-form" method="POST" action="/makepay" class="space-y-6">
                    @csrf
                   
                     <button class="flex-1 bg-white border border-primary text-primary hover:bg-primary hover:text-white text-center py-3 px-4 rounded-lg transition-colors">
                     <i class="fas fa-redo mr-2"></i>  Réessayer le paiement
                        </button>
                </form> -->
                    <a href="/panier" class="flex-1 bg-white border border-primary text-primary hover:bg-primary hover:text-white text-center py-3 px-4 rounded-lg transition-colors">
                        <i class="fas fa-shopping-cart mr-2"></i> Retour au panier
                    </a>
                </div>
            </div>
        </div>

        <!-- Aide et support -->
        <div class="mt-8 bg-white rounded-xl shadow-sm p-6">
            <h3 class="font-semibold mb-4">Besoin d'aide ?</h3>
            <p class="text-gray-600 mb-4">Notre équipe de support est disponible pour vous aider à résoudre ce problème.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="mailto:support@foodlovers.com" class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg transition-colors">
                    <i class="fas fa-envelope mr-2"></i> support@foodlovers.com
                </a>
                <a href="tel:+33123456789" class="flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg transition-colors">
                    <i class="fas fa-phone mr-2"></i> +33 1 23 45 67 89
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
