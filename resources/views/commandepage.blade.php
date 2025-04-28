@extends('layouts')

@section('title', 'Finaliser votre commande - FoodLovers')

@section('content')
<!-- Page Title -->
<section class="bg-gradient-to-r from-primary/10 to-secondary/10 py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-display font-bold text-center">Finaliser votre commande</h1>
        <p class="text-center text-gray-600 mt-2">Vérifiez vos informations de livraison pour finaliser votre commande</p>
    </div>
</section>

<!-- Checkout Content -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Shipping Information -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold">Informations de livraison</h2>
                            <a href="/panier" class="text-primary hover:underline flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i> Retour au panier
                            </a>
                        </div>
                    </div>

                    <div class="p-6">
                        <form id="payment-form" method="POST" action="/makepay" class="space-y-6">
                            @csrf

                            <fieldset class="space-y-6">
                                <!-- Street Address -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Adresse
                                    </label>
                                    <div class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-800">
                                        {{Auth::user()->address->address ?? 'Aucune adresse enregistrée'}}
                                    </div>
                                    <input type="hidden" name="address" value="{{Auth::user()->address->address ?? ''}}">
                                </div>

                                <!-- City, State, ZIP -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Ville
                                        </label>
                                        <div class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-800">
                                            {{Auth::user()->address->ville ?? 'Non spécifiée'}}
                                        </div>
                                        <input type="hidden" name="ville" value="{{Auth::user()->address->ville ?? ''}}">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">
                                            Code Postal
                                        </label>
                                        <div class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-800">
                                            {{Auth::user()->address->codepostal ?? 'Non spécifié'}}
                                        </div>
                                        <input type="hidden" name="code_postal" value="{{Auth::user()->address->code_postal ?? ''}}">
                                    </div>
                                </div>

                                <!-- Country -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Pays
                                    </label>
                                    <div class="w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 text-gray-800">
                                        {{ Auth::user()->address->pays ?? 'Non spécifié' }}
                                    </div>
                                    <input type="hidden" name="pays" value="{{ Auth::user()->address->pays ?? '' }}">
                                    <input type="hidden" name="pays" value="{{$commande->id}}">
                                </div>
                            </fieldset>
                            <div class="pt-6 border-t border-gray-100">
                            <input type="hidden" name="totalAmont" value="{{ $total}}">
                                <button type="submit" class="w-full bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center">
                                    <i class="fas fa-lock mr-2"></i> Payer {{ number_format($total, 2, ',', ' ') }} Dh
                                </button>
                                <p class="text-center text-sm text-gray-500 mt-3">
                                    <i class="fas fa-shield-alt mr-1"></i> Paiement 100% sécurisé
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden sticky top-24">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold">Récapitulatif de la commande</h2>
                    </div>

                    <div class="p-6">
                        <ul class="divide-y divide-gray-100 mb-6">
                            @if(!is_null($produits) && count($produits) > 0)
                            @foreach($produits as $produit)
                            <li class="py-4 flex">
                                <div class="flex-shrink-0 w-16 h-16 rounded-md overflow-hidden">
                                    <img src="{{ url('/storage/' . $produit['photo']) }}" alt="{{ $produit['nom'] }}" class="w-full h-full object-cover">
                                </div>
                                <div class="ml-4 flex-1">
                                    <h3 class="text-sm font-medium">{{ $produit['nom'] }}</h3>
                                    <div class="flex justify-between mt-1">
                                        <span class="text-sm text-gray-500">{{ $produit['quantite'] }} x {{ number_format($produit['prix'], 2, ',', ' ') }} Dh</span>
                                        <span class="text-sm font-medium text-primary">{{ number_format($produit['quantite'] * $produit['prix'], 2, ',', ' ') }} Dh</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @else
                            <li class="py-4 text-center text-gray-500">
                                Pas de produits
                            </li>
                            @endif
                        </ul>

                        <div class="space-y-4 border-t border-gray-100 pt-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Sous-total</span>
                                <span class="font-medium">{{ number_format($total, 2, ',', ' ') }} Dh</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Frais de livraison</span>
                                <span class="font-medium">Gratuit</span>
                            </div>
                            <div class="border-t border-gray-100 pt-3 flex justify-between items-center">
                                <span class="font-bold text-lg">Total</span>
                                <span class="font-bold text-primary text-xl">{{ number_format($total, 2, ',', ' ') }} Dh</span>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-truck text-primary mr-3"></i>
                                <span class="text-sm text-gray-600">Livraison estimée: <span class="font-medium">3-5 jours ouvrables</span></span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-undo text-primary mr-3"></i>
                                <span class="text-sm text-gray-600">Politique de retour: <span class="font-medium">30 jours</span></span>
                            </div>
                        </div>

                        <!-- Payment Methods -->
                        <div class="flex justify-center space-x-4 mt-6 pt-6 border-t border-gray-100">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" alt="Visa" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" alt="Mastercard" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1280px-PayPal.svg.png" alt="PayPal" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Apple_Pay_logo.svg/1280px-Apple_Pay_logo.svg.png" alt="Apple Pay" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Badges -->
<section class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="flex flex-col items-center">
                <div class="text-3xl text-primary mb-3">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="font-bold mb-1">Paiement sécurisé</h3>
                <p class="text-sm text-gray-600">Transactions 100% sécurisées</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="text-3xl text-primary mb-3">
                    <i class="fas fa-truck"></i>
                </div>
                <h3 class="font-bold mb-1">Livraison rapide</h3>
                <p class="text-sm text-gray-600">Livraison dans tout le pays</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="text-3xl text-primary mb-3">
                    <i class="fas fa-undo"></i>
                </div>
                <h3 class="font-bold mb-1">Retours faciles</h3>
                <p class="text-sm text-gray-600">Retours sous 30 jours</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="text-3xl text-primary mb-3">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="font-bold mb-1">Support 24/7</h3>
                <p class="text-sm text-gray-600">Assistance à tout moment</p>
            </div>
        </div>
    </div>
</section>
@endsection
