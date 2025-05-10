@extends('layouts')

@section('title', 'Compte désactivé - FoodLovers')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-primary/10 to-secondary/10 py-10">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-display font-bold text-center">Compte désactivé</h1>
        <p class="text-center text-gray-600 mt-2">Votre compte a été temporairement désactivé</p>
    </div>
</section>

<!-- Main Content -->
<section class="py-16">
    <div class="container mx-auto px-4 max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <!-- Icon and Title -->
            <div class="p-8 text-center border-b border-gray-100">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-red-100 text-red-500 mb-6">
                    <i class="fas fa-user-lock text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold mb-2">Votre compte a été désactivé</h2>
                <p class="text-gray-600">Nous sommes désolés de vous informer que votre compte a été temporairement désactivé par un administrateur.</p>
            </div>

            <!-- Information -->
            <div class="p-8">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Pourquoi mon compte a-t-il été désactivé?</h3>
                        <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
                            <p>Votre compte peut avoir été désactivé pour l'une des raisons suivantes:</p>
                            <ul class="list-disc ml-5 mt-2 space-y-1">
                                <li>Non-respect des conditions d'utilisation de FoodLovers</li>
                                <li>Activité suspecte ou inhabituelle détectée sur votre compte</li>
                                <li>Plaintes ou signalements d'autres utilisateurs</li>
                                <li>Non-paiement ou problèmes liés à la facturation</li>
                                <li>Inactivité prolongée du compte</li>
                                <li>À votre demande</li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-3">Comment réactiver mon compte?</h3>
                        <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
                            <p>Pour demander la réactivation de votre compte, veuillez contacter notre équipe de support. Assurez-vous de fournir les informations suivantes:</p>
                            <ul class="list-disc ml-5 mt-2 space-y-1">
                                <li>Votre nom complet</li>
                                <li>L'adresse e-mail associée à votre compte</li>
                                <li>La raison pour laquelle vous pensez que votre compte a été désactivé</li>
                                <li>Toute information supplémentaire qui pourrait nous aider à traiter votre demande</li>
                            </ul>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-6">
                        <h3 class="text-lg font-semibold mb-4">Nous contacter</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <a href="mailto:support@foodlovers.com" class="flex items-center justify-center p-4 bg-primary/10 hover:bg-primary/20 text-primary rounded-lg transition-colors">
                                <i class="fas fa-envelope mr-3"></i>
                                <span>support@foodlovers.com</span>
                            </a>
                            <a href="tel:+212600000000" class="flex items-center justify-center p-4 bg-primary/10 hover:bg-primary/20 text-primary rounded-lg transition-colors">
                                <i class="fas fa-phone-alt mr-3"></i>
                                <span>+212 6 00 00 00 00</span>
                            </a>
                        </div>
                    </div>

                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 flex items-start">
                        <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                        <div>
                            <p class="text-blue-800 font-medium">Délai de traitement</p>
                            <p class="text-blue-700 text-sm mt-1">Les demandes de réactivation sont généralement traitées dans un délai de 24 à 48 heures ouvrables. Nous vous remercions pour votre patience.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="p-8 bg-gray-50 border-t border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <a href="/" class="w-full md:w-auto px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg text-center transition-colors">
                        <i class="fas fa-home mr-2"></i> Retour à l'accueil
                    </a>
                    <a href="" class="w-full md:w-auto px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-lg text-center transition-colors">
                        <i class="fas fa-headset mr-2"></i> Contacter le support
                    </a>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="mt-12">
            <h3 class="text-xl font-bold mb-6 text-center">Questions fréquentes</h3>
            <div class="space-y-4">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <button class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors" onclick="toggleFaq(this)">
                        <span>Puis-je créer un nouveau compte?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </button>
                    <div class="hidden p-4 pt-0 border-t border-gray-100">
                        <p class="text-gray-600">La création d'un nouveau compte pour contourner une désactivation est contraire à nos conditions d'utilisation. Nous vous recommandons de contacter notre support pour résoudre les problèmes liés à votre compte existant.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <button class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors" onclick="toggleFaq(this)">
                        <span>Combien de temps mon compte restera-t-il désactivé?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </button>
                    <div class="hidden p-4 pt-0 border-t border-gray-100">
                        <p class="text-gray-600">La durée de désactivation dépend de la raison pour laquelle votre compte a été désactivé. Dans certains cas, la désactivation peut être temporaire, tandis que dans d'autres, elle peut être permanente. Contactez notre équipe de support pour obtenir des informations spécifiques à votre situation.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <button class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors" onclick="toggleFaq(this)">
                        <span>Puis-je récupérer mes données et mes recettes?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </button>
                    <div class="hidden p-4 pt-0 border-t border-gray-100">
                        <p class="text-gray-600">Oui, même si votre compte est désactivé, vos données sont conservées pendant une période limitée conformément à notre politique de confidentialité. Vous pouvez demander une copie de vos données en contactant notre service client.</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <button class="w-full flex justify-between items-center p-4 text-left font-medium hover:bg-gray-50 transition-colors" onclick="toggleFaq(this)">
                        <span>Comment éviter que mon compte soit désactivé à l'avenir?</span>
                        <i class="fas fa-chevron-down text-gray-400 transform transition-transform"></i>
                    </button>
                    <div class="hidden p-4 pt-0 border-t border-gray-100">
                        <p class="text-gray-600">Pour éviter que votre compte ne soit désactivé à l'avenir, assurez-vous de respecter nos conditions d'utilisation, de maintenir des informations de paiement à jour, de sécuriser votre compte avec un mot de passe fort et de répondre rapidement aux notifications importantes que nous vous envoyons.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleFaq(element) {
        const content = element.nextElementSibling;
        const icon = element.querySelector('i');

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            content.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>
@endsection
