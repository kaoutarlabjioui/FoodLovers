<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B6B',
                        secondary: '#4ECDC4',
                        accent: '#FFE66D',
                        dark: '#292F36',
                        light: '#F7F9F9'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Playfair Display', 'serif']
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('css')
</head>

<body class="font-sans bg-light text-dark">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="bg-dark text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-4 border-b border-gray-700">
                <div class="flex items-center">
                    <span class="text-xl font-display font-bold text-primary">Food<span class="text-white">Lovers</span></span>
                    <span class="ml-2 bg-primary/20 text-primary text-xs px-2 py-1 rounded">Admin</span>
                </div>
            </div>

            <nav class="mt-4">
                <div class="px-4 py-2 text-xs text-gray-400 uppercase">Principal</div>
                <a href="#" class="flex items-center px-4 py-3 text-white bg-primary/20 border-l-4 border-primary">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span class="ml-2">Tableau de bord</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-chart-line w-5"></i>
                    <span class="ml-2">Statistiques</span>
                </a>

                <div class="px-4 py-2 mt-4 text-xs text-gray-400 uppercase">Gestion</div>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-2">Utilisateurs</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-utensils w-5"></i>
                    <span class="ml-2">Recettes</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-trophy w-5"></i>
                    <span class="ml-2">Compétitions</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-comment w-5"></i>
                    <span class="ml-2">Commentaires</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-shopping-bag w-5"></i>
                    <span class="ml-2">Boutique</span>
                </a>

                <div class="px-4 py-2 mt-4 text-xs text-gray-400 uppercase">Configuration</div>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-cog w-5"></i>
                    <span class="ml-2">Paramètres</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-palette w-5"></i>
                    <span class="ml-2">Apparence</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-envelope w-5"></i>
                    <span class="ml-2">Newsletters</span>
                </a>
            </nav>

            <div class="absolute bottom-0 w-64 p-4 border-t border-gray-700">
                <a href="#" class="flex items-center text-gray-300 hover:text-white transition-colors">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span class="ml-2">Déconnexion</span>
                </a>
            </div>
        </aside>

        <!-- Mobile sidebar -->
        <div class="md:hidden fixed inset-0 z-20 bg-black bg-opacity-50 transition-opacity hidden" id="mobile-overlay"></div>

        <aside class="md:hidden fixed inset-y-0 left-0 z-30 w-64 bg-dark text-white transform -translate-x-full transition-transform duration-300" id="mobile-sidebar">
            <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                <div class="flex items-center">
                    <span class="text-xl font-display font-bold text-primary">Food<span class="text-white">Lovers</span></span>
                    <span class="ml-2 bg-primary/20 text-primary text-xs px-2 py-1 rounded">Admin</span>
                </div>
                <button id="close-sidebar" class="text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="mt-4">
                <div class="px-4 py-2 text-xs text-gray-400 uppercase">Principal</div>
                <a href="#" class="flex items-center px-4 py-3 text-white bg-primary/20 border-l-4 border-primary">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span class="ml-2">Tableau de bord</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-chart-line w-5"></i>
                    <span class="ml-2">Statistiques</span>
                </a>

                <div class="px-4 py-2 mt-4 text-xs text-gray-400 uppercase">Gestion</div>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-2">Utilisateurs</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-utensils w-5"></i>
                    <span class="ml-2">Recettes</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-trophy w-5"></i>
                    <span class="ml-2">Compétitions</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-comment w-5"></i>
                    <span class="ml-2">Commentaires</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-shopping-bag w-5"></i>
                    <span class="ml-2">Boutique</span>
                </a>

                <div class="px-4 py-2 mt-4 text-xs text-gray-400 uppercase">Configuration</div>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-cog w-5"></i>
                    <span class="ml-2">Paramètres</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-palette w-5"></i>
                    <span class="ml-2">Apparence</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-envelope w-5"></i>
                    <span class="ml-2">Newsletters</span>
                </a>
            </nav>
        </aside>
        @yield('content')

    </div>
    @yield('modal')
    @yield('js')

</body>

</html>
