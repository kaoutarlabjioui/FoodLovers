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
                <a href="/dashboard" class="flex items-center px-4 py-3 text-white bg-primary/20 border-l-4 border-primary">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span class="ml-2">Tableau de bord</span>
                </a>
                <a href="" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-chart-line w-5"></i>
                    <span class="ml-2">Statistiques</span>
                </a>

                <div class="px-4 py-2 mt-4 text-xs text-gray-400 uppercase">Gestion</div>
                <a href="/adminusers" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-2">Utilisateurs</span>
                </a>
                <a href="/adminrecette" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-utensils w-5"></i>
                    <span class="ml-2">Recettes</span>
                </a>
                <a href="/admincompetition" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-trophy w-5"></i>
                    <span class="ml-2">Compétitions</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-comment w-5"></i>
                    <span class="ml-2">Commentaires</span>
                </a>
                <a href="/adminboutique" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
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
                <a href="" class="flex items-center px-4 py-3 text-white bg-primary/20 border-l-4 border-primary">
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
                <a href="/adminrecette" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
                    <i class="fas fa-utensils w-5"></i>
                    <span class="ml-2">Recettes</span>
                </a>
                <a href="{{url('/admincompetition')}}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-dark/80 hover:text-white transition-colors">
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
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm z-10">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button id="mobile-menu-button" class="md:hidden mr-4 text-gray-600">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="text-xl font-semibold">Tableau de bord</h1>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="text-gray-600 hover:text-gray-800 transition-colors">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                        <div class="relative">
                            <button class="text-gray-600 hover:text-gray-800 transition-colors">
                                <i class="fas fa-bell"></i>
                                <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                            </button>
                        </div>

                        <div class="relative">
                            <button class="flex items-center text-gray-600 hover:text-gray-800 transition-colors">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin" class="w-8 h-8 rounded-full mr-2">
                                <span class="hidden md:block">Admin</span>
                                <i class="fas fa-chevron-down ml-2 text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Utilisateurs</p>
                                <h3 class="text-2xl font-bold">2,845</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i> +12.5%
                                </p>
                            </div>
                            <div class="bg-primary/10 p-3 rounded-full">
                                <i class="fas fa-users text-primary text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Recettes</p>
                                <h3 class="text-2xl font-bold">1,253</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i> +8.3%
                                </p>
                            </div>
                            <div class="bg-secondary/10 p-3 rounded-full">
                                <i class="fas fa-utensils text-secondary text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Compétitions</p>
                                <h3 class="text-2xl font-bold">12</h3>
                                <p class="text-green-500 text-sm mt-1">
                                    <i class="fas fa-arrow-up mr-1"></i> +33.3%
                                </p>
                            </div>
                            <div class="bg-accent/10 p-3 rounded-full">
                                <i class="fas fa-trophy text-accent text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-500 text-sm">Commentaires</p>
                                <h3 class="text-2xl font-bold">5,724</h3>
                                <p class="text-red-500 text-sm mt-1">
                                    <i class="fas fa-arrow-down mr-1"></i> -2.7%
                                </p>
                            </div>
                            <div class="bg-primary/10 p-3 rounded-full">
                                <i class="fas fa-comment text-primary text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- User Growth Chart -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-lg">Croissance des utilisateurs</h3>
                            <div class="flex space-x-2">
                                <button class="text-xs bg-primary/10 text-primary px-2 py-1 rounded">Mois</button>
                                <button class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded hover:bg-gray-200">Année</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="userGrowthChart"></canvas>
                        </div>
                    </div>

                    <!-- Recipe Categories Chart -->
                    <div class="bg-white rounded-lg shadow-sm p-4">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-bold text-lg">Catégories de recettes</h3>
                            <button class="text-primary hover:text-primary/80 text-sm">
                                <i class="fas fa-download mr-1"></i> Exporter
                            </button>
                        </div>
                        <div class="chart-container">
                            <canvas id="recipeCategoriesChart"></canvas>
                        </div>
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
    @yield('modal')
    <script>
        const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
        const userGrowthChart = new Chart(userGrowthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                    label: 'Nouveaux utilisateurs',
                    data: [120, 145, 180, 220, 210, 250, 285, 320, 350, 370, 410, 430],
                    backgroundColor: 'rgba(255, 107, 107, 0.1)',
                    borderColor: '#FF6B6B',
                    borderWidth: 2,
                    tension: 0.3,
                    pointBackgroundColor: '#FF6B6B',
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        const recipeCategoriesCtx = document.getElementById('recipeCategoriesChart').getContext('2d');
        const recipeCategoriesChart = new Chart(recipeCategoriesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Desserts', 'Plats principaux', 'Entrées', 'Boissons', 'Petit-déjeuner', 'Autres'],
                datasets: [{
                    data: [35, 25, 15, 10, 10, 5],
                    backgroundColor: [
                        '#FF6B6B',
                        '#4ECDC4',
                        '#FFE66D',
                        '#1A535C',
                        '#F7B267',
                        '#A5A58D'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            padding: 15
                        }
                    }
                },
                cutout: '70%'
            }
        });
    </script>
    @yield('js')

</body>

</html>
