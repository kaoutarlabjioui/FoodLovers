@extends('client.layouts')
@section('title', 'Paiement réussi - FoodLovers')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto">
        <!-- Carte de succès -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- En-tête avec icône -->
            <div class="bg-green-50 p-8 flex flex-col items-center">
                <div class="w-20 h-20 rounded-full bg-green-100 flex items-center justify-center mb-4">
                    <i class="fas fa-check-circle text-4xl text-green-500"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 text-center">Paiement réussi !</h1>
                <p class="text-gray-600 text-center mt-2">Votre commande a été confirmée et est en cours de traitement.</p>
            </div>

            <!-- Détails de la commande -->
            <div class="p-8">
                <!-- Message de succès -->
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Résumé de la commande -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-4">Détails de la commande</h2>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Numéro de commande:</span>
                            <span class="font-medium">Commande #FL-{{ $commande->id }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Date:</span>
                            <span class="font-medium">{{ date('d/m/Y') }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Méthode de paiement:</span>
                            <span class="font-medium">Carte de crédit</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="text-gray-600">Total:</span>
                            <span class="font-medium text-primary">{{ $commande->prix_totale ?? number_format(rand(50, 200), 2, ',', ' ') }} Dh</span>
                        </div>
                    </div>
                </div>

                <!-- Informations de livraison -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold mb-4">Livraison</h2>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-600 mb-2">Votre commande sera livrée à l'adresse suivante:</p>
                        <p class="font-medium">{{  auth()->user()->address->address ?? '123 Rue de la Cuisine' }}</p>
                        <p class="font-medium">{{  auth()->user()->address->ville ?? 'Paris' }}, {{  auth()->user()->address->code_postal ?? '75001' }}</p>
                        <p class="font-medium">{{ auth()->user()->address->pays ?? 'France' }}</p>

                        <div class="mt-4 flex items-center text-gray-600">
                            <i class="fas fa-truck mr-2 text-primary"></i>
                            <span>Livraison estimée: <span class="font-medium">{{ date('d/m/Y', strtotime('+3 days')) }} - {{ date('d/m/Y', strtotime('+5 days')) }}</span></span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8">
                    <a href="/client/clientcommande" class="flex-1 bg-primary hover:bg-primary/90 text-white text-center py-3 px-4 rounded-lg transition-colors">
                        <i class="fas fa-shopping-bag mr-2"></i> Voir mes commandes
                    </a>
                    <a href="/boutique" class="flex-1 bg-white border border-primary text-primary hover:bg-primary hover:text-white text-center py-3 px-4 rounded-lg transition-colors">
                        <i class="fas fa-store mr-2"></i> Continuer les achats
                    </a>
                </div>
            </div>
        </div>

        <!-- Aide et support -->
        <div class="mt-8 bg-white rounded-xl shadow-sm p-6">
            <h3 class="font-semibold mb-4">Besoin d'aide ?</h3>
            <p class="text-gray-600 mb-4">Si vous avez des questions concernant votre commande, n'hésitez pas à contacter notre service client.</p>
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
