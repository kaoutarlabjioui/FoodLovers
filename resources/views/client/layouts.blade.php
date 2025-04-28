<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Mon Profil') - FoodLovers</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              DEFAULT: '#e67e22',
              50: '#fef9f3',
              100: '#fdf3e7',
              200: '#fbe0c2',
              300: '#f8cd9d',
              400: '#f2a754',
              500: '#e67e22',
              600: '#cf721f',
              700: '#ad5f1a',
              800: '#8a4c15',
              900: '#713e11',
            },
            secondary: {
              DEFAULT: '#2ecc71',
              50: '#f4fdf7',
              100: '#e9fbef',
              200: '#c7f5d8',
              300: '#a5efc0',
              400: '#62e391',
              500: '#2ecc71',
              600: '#29b866',
              700: '#239955',
              800: '#1c7a44',
              900: '#176437',
            },
            accent: {
              DEFAULT: '#3498db',
              50: '#f5fafd',
              100: '#ebf5fb',
              200: '#cce7f5',
              300: '#add8ef',
              400: '#70bbe2',
              500: '#3498db',
              600: '#2f89c5',
              700: '#2772a4',
              800: '#1f5b83',
              900: '#194a6b',
            }
          },
          fontFamily: {
            'sans': ['Inter', 'sans-serif'],
            'display': ['Playfair Display', 'serif'],
          },
        }
      }
    }
  </script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    /* Scrollbar styling */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
      background: #c5c5c5;
      border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #a8a8a8;
    }

    /* Tab transition */
    .tab-content {
      transition: all 0.3s ease;
    }

    /* Order card styling */
    .order-card {
      transition: all 0.3s ease;
    }
    .order-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    /* Competition card styling */
    .competition-card {
      transition: all 0.3s ease;
    }
    .competition-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
  </style>

  @yield('css')
</head>
<body class="font-sans">
  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center py-4">
        <div class="flex items-center">
          <a href="/" class="text-2xl font-display font-bold text-primary">FoodLovers</a>
        </div>
        <nav class="hidden md:flex space-x-8">
          <a href="/" class="text-gray-600 hover:text-primary">Accueil</a>
          <a href="/recipes" class="text-gray-600 hover:text-primary">Recettes</a>
          <a href="/competitions" class="text-gray-600 hover:text-primary">Compétitions</a>
          <a href="/boutique" class="text-gray-600 hover:text-primary">Boutique</a>
          <!-- <a href="/blog" class="text-gray-600 hover:text-primary">Blog</a> -->
        </nav>
        <div class="flex items-center space-x-4">
          <a href="/panier" class="text-gray-600 hover:text-primary">
            <i class="fas fa-shopping-cart"></i>
            <span class="ml-1">Panier</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>

          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="hidden md:block font-medium text-red-500 hover:text-red-700 transition-colors">
            Logout
          </a>
          <div class="relative">
            <button class="flex items-center text-gray-600 hover:text-primary focus:outline-none">
              <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Photo de profil" class="w-8 h-8 rounded-full object-cover">
              <span class="ml-1">{{auth()->user()->first_name}}</span>
              <i class="fas fa-chevron-down ml-1 text-xs"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Profile Header -->
      <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row items-center">
          <div class="md:mr-6 mb-4 md:mb-0">
            <div class="relative">
              <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Photo de profil" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow">
              <button class="absolute bottom-0 right-0 bg-primary text-white rounded-full p-1 shadow-md hover:bg-primary/90 transition-colors">
                <i class="fas fa-camera text-xs"></i>
              </button>
            </div>
          </div>
          <div class="flex-1 text-center md:text-left">
            <h1 class="text-2xl font-bold">{{auth()->user()->first_name}}</h1>
            <p class="text-gray-600">Membre depuis {{auth()->user()->created_at}}</p>
            <div class="mt-2 flex flex-wrap justify-center md:justify-start gap-2">
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary">
                <i class="fas fa-utensils mr-1"></i> 12 Recettes
              </span>
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                <i class="fas fa-trophy mr-1"></i> 3 Compétitions
              </span>
              <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                <i class="fas fa-shopping-bag mr-1"></i> 8 Commandes
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Profile Tabs -->
      <div class="mb-6">
        <div class="border-b border-gray-200">
          <nav class="flex -mb-px overflow-x-auto" aria-label="Tabs">
            <a href="/profile" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 {{ request()->routeIs('profile.info') ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} font-medium">
              <i class="fas fa-user mr-2"></i> Informations
            </a>
            <a href="/client/clientcommande" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 {{ request()->routeIs('profile.orders') ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} font-medium">
              <i class="fas fa-shopping-bag mr-2"></i> Mes commandes
            </a>
            <a href="" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 {{ request()->routeIs('profile.competitions') ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} font-medium">
              <i class="fas fa-trophy mr-2"></i> Mes compétitions
            </a>
            <a href="/client/clientrecette" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 {{ request()->routeIs('profile.recipes') ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} font-medium">
              <i class="fas fa-utensils mr-2"></i> Mes recettes
            </a>
          </nav>
        </div>
      </div>

      <!-- Tab Content -->
      <div class="tab-content-container">
        @yield('content')
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-white border-t border-gray-200 mt-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-lg font-bold mb-4">FoodLovers</h3>
          <p class="text-gray-600 mb-4">La communauté des passionnés de cuisine et de gastronomie.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-primary">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-primary">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-primary">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-primary">
              <i class="fab fa-pinterest"></i>
            </a>
          </div>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Liens rapides</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-600 hover:text-primary">Accueil</a></li>
            <li><a href="#" class="text-gray-600 hover:text-primary">Recettes</a></li>
            <li><a href="#" class="text-gray-600 hover:text-primary">Compétitions</a></li>
            <li><a href="#" class="text-gray-600 hover:text-primary">Boutique</a></li>
            <li><a href="#" class="text-gray-600 hover:text-primary">Blog</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Informations</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-600 hover:text-primary">À propos de nous</a></li>
            <li><a href="#" class="text-gray-600 hover:text-primary">Conditions générales</a></li>
            <li><a href="#" class="text-gray-600 hover:text-primary">Politique de confidentialité</a></li>
            <li><a href="#" class="text-gray-600 hover:text-primary">Livraisons et retours</a></li>
            <li><a href="#" class="text-gray-600 hover:text-primary">FAQ</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Contact</h3>
          <ul class="space-y-2">
            <li class="flex items-start">
              <i class="fas fa-map-marker-alt text-primary mt-1 mr-2"></i>
              <span class="text-gray-600">123 Rue de la Cuisine, 75001 Paris, France</span>
            </li>
            <li class="flex items-start">
              <i class="fas fa-phone text-primary mt-1 mr-2"></i>
              <span class="text-gray-600">+33 1 23 45 67 89</span>
            </li>
            <li class="flex items-start">
              <i class="fas fa-envelope text-primary mt-1 mr-2"></i>
              <span class="text-gray-600">contact@foodlovers.com</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-200 mt-8 pt-8 text-center">
        <p class="text-gray-600">&copy; 2023 FoodLovers. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  @yield('modals')

  @yield('js')
</body>
</html>
