<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Profil - FoodLovers</title>

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
          <a href="/shop" class="text-gray-600 hover:text-primary">Boutique</a>
          <a href="/blog" class="text-gray-600 hover:text-primary">Blog</a>
        </nav>
        <div class="flex items-center space-x-4">
          <a href="/cart" class="text-gray-600 hover:text-primary">
            <i class="fas fa-shopping-cart"></i>
            <span class="ml-1">Panier</span>
          </a>
          <div class="relative">
            <button class="flex items-center text-gray-600 hover:text-primary focus:outline-none">
              <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Photo de profil" class="w-8 h-8 rounded-full object-cover">
              <span class="ml-1">Marie</span>
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
            <h1 class="text-2xl font-bold">Marie Dupont</h1>
            <p class="text-gray-600">Membre depuis Janvier 2023</p>
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
          <div class="mt-4 md:mt-0">
            <button class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
              <i class="fas fa-edit mr-2"></i>
              Modifier mon profil
            </button>
          </div>
        </div>
      </div>

      <!-- Profile Tabs -->
      <div class="mb-6">
        <div class="border-b border-gray-200">
          <nav class="flex -mb-px overflow-x-auto" aria-label="Tabs">
            <button class="tab-button whitespace-nowrap py-4 px-6 border-b-2 border-primary text-primary font-medium" data-tab="info">
              <i class="fas fa-user mr-2"></i> Informations
            </button>
            <button class="tab-button whitespace-nowrap py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium" data-tab="orders">
              <i class="fas fa-shopping-bag mr-2"></i> Mes commandes
            </button>
            <button class="tab-button whitespace-nowrap py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium" data-tab="competitions">
              <i class="fas fa-trophy mr-2"></i> Mes compétitions
            </button>
            <button class="tab-button whitespace-nowrap py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium" data-tab="recipes">
              <i class="fas fa-utensils mr-2"></i> Mes recettes
            </button>
            <button class="tab-button whitespace-nowrap py-4 px-6 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium" data-tab="settings">
              <i class="fas fa-cog mr-2"></i> Paramètres
            </button>
          </nav>
        </div>
      </div>

      <!-- Tab Content -->
      <div class="tab-content-container">
        <!-- Personal Information Tab -->
        <div id="info-tab" class="tab-content block">
          <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Informations personnelles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Nom complet</h3>
                <p class="text-gray-900">Marie Dupont</p>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Email</h3>
                <p class="text-gray-900">marie.dupont@example.com</p>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Téléphone</h3>
                <p class="text-gray-900">+33 6 12 34 56 78</p>
              </div>
              <div>
                <h3 class="text-sm font-medium text-gray-500 mb-1">Date de naissance</h3>
                <p class="text-gray-900">15 mars 1985</p>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Adresses</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="border border-gray-200 rounded-lg p-4">
                <div class="flex justify-between items-start mb-2">
                  <h3 class="font-medium">Adresse de livraison</h3>
                  <button class="text-primary hover:text-primary/80">
                    <i class="fas fa-edit"></i>
                  </button>
                </div>
                <p class="text-gray-600">Marie Dupont</p>
                <p class="text-gray-600">123 Rue de Paris</p>
                <p class="text-gray-600">75001 Paris</p>
                <p class="text-gray-600">France</p>
                <p class="text-gray-600">+33 6 12 34 56 78</p>
              </div>
              <div class="border border-gray-200 rounded-lg p-4">
                <div class="flex justify-between items-start mb-2">
                  <h3 class="font-medium">Adresse de facturation</h3>
                  <button class="text-primary hover:text-primary/80">
                    <i class="fas fa-edit"></i>
                  </button>
                </div>
                <p class="text-gray-600">Marie Dupont</p>
                <p class="text-gray-600">123 Rue de Paris</p>
                <p class="text-gray-600">75001 Paris</p>
                <p class="text-gray-600">France</p>
                <p class="text-gray-600">+33 6 12 34 56 78</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Orders Tab -->
        <div id="orders-tab" class="tab-content hidden">
          <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-bold">Historique des commandes</h2>
              <div class="relative">
                <select class="pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                  <option value="all">Toutes les commandes</option>
                  <option value="processing">En cours</option>
                  <option value="shipped">Expédiées</option>
                  <option value="delivered">Livrées</option>
                  <option value="cancelled">Annulées</option>
                </select>
              </div>
            </div>

            <!-- Orders List -->
            <div class="space-y-4">
              <!-- Order 1 -->
              <div class="border border-gray-200 rounded-lg p-4 order-card">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                  <div>
                    <div class="flex items-center">
                      <h3 class="font-bold">Commande #FL-2023-1845</h3>
                      <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Livrée
                      </span>
                    </div>
                    <p class="text-sm text-gray-500">Passée le 15 mars 2023</p>
                  </div>
                  <div class="mt-2 md:mt-0">
                    <span class="font-bold text-lg">89,97 €</span>
                  </div>
                </div>
                <div class="mt-4 border-t border-gray-200 pt-4">
                  <div class="flex flex-wrap gap-2">
                    <div class="flex items-center bg-gray-100 rounded-lg p-2">
                      <img src="https://images.unsplash.com/photo-1556911220-bda9f7b24446" alt="Couteau de Chef" class="w-12 h-12 object-cover rounded-md">
                      <div class="ml-2">
                        <p class="text-sm font-medium">Couteau de Chef Professionnel</p>
                        <p class="text-xs text-gray-500">Qté: 1</p>
                      </div>
                    </div>
                    <div class="flex items-center bg-gray-100 rounded-lg p-2">
                      <img src="https://images.unsplash.com/photo-1594041680534-e8c8cdebd659" alt="Planche à découper" class="w-12 h-12 object-cover rounded-md">
                      <div class="ml-2">
                        <p class="text-sm font-medium">Planche à Découper en Bois d'Acacia</p>
                        <p class="text-xs text-gray-500">Qté: 1</p>
                      </div>
                    </div>
                    <div class="flex items-center bg-gray-100 rounded-lg p-2">
                      <img src="https://images.unsplash.com/photo-1589187151053-5ec8818e661b" alt="Livre de recettes" class="w-12 h-12 object-cover rounded-md">
                      <div class="ml-2">
                        <p class="text-sm font-medium">Livre de Recettes Méditerranéennes</p>
                        <p class="text-xs text-gray-500">Qté: 1</p>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 flex justify-between items-center">
                    <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium">
                      Voir les détails
                    </a>
                    <button class="bg-primary hover:bg-primary/90 text-white font-medium py-1 px-3 rounded-lg transition-colors text-sm">
                      Acheter à nouveau
                    </button>
                  </div>
                </div>
              </div>

              <!-- Order 2 -->
              <div class="border border-gray-200 rounded-lg p-4 order-card">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                  <div>
                    <div class="flex items-center">
                      <h3 class="font-bold">Commande #FL-2023-1732</h3>
                      <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                        Expédiée
                      </span>
                    </div>
                    <p class="text-sm text-gray-500">Passée le 28 février 2023</p>
                  </div>
                  <div class="mt-2 md:mt-0">
                    <span class="font-bold text-lg">199,99 €</span>
                  </div>
                </div>
                <div class="mt-4 border-t border-gray-200 pt-4">
                  <div class="flex flex-wrap gap-2">
                    <div class="flex items-center bg-gray-100 rounded-lg p-2">
                      <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246" alt="Robot Culinaire" class="w-12 h-12 object-cover rounded-md">
                      <div class="ml-2">
                        <p class="text-sm font-medium">Robot Culinaire Multifonction</p>
                        <p class="text-xs text-gray-500">Qté: 1</p>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 flex justify-between items-center">
                    <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium">
                      Voir les détails
                    </a>
                    <button class="bg-primary hover:bg-primary/90 text-white font-medium py-1 px-3 rounded-lg transition-colors text-sm">
                      Acheter à nouveau
                    </button>
                  </div>
                </div>
              </div>

              <!-- Order 3 -->
              <div class="border border-gray-200 rounded-lg p-4 order-card">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                  <div>
                    <div class="flex items-center">
                      <h3 class="font-bold">Commande #FL-2023-1621</h3>
                      <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Livrée
                      </span>
                    </div>
                    <p class="text-sm text-gray-500">Passée le 15 janvier 2023</p>
                  </div>
                  <div class="mt-2 md:mt-0">
                    <span class="font-bold text-lg">54,98 €</span>
                  </div>
                </div>
                <div class="mt-4 border-t border-gray-200 pt-4">
                  <div class="flex flex-wrap gap-2">
                    <div class="flex items-center bg-gray-100 rounded-lg p-2">
                      <img src="https://images.unsplash.com/photo-1574269909862-7e1d70bb3ed5" alt="Balance de Cuisine" class="w-12 h-12 object-cover rounded-md">
                      <div class="ml-2">
                        <p class="text-sm font-medium">Balance de Cuisine Digitale</p>
                        <p class="text-xs text-gray-500">Qté: 1</p>
                      </div>
                    </div>
                    <div class="flex items-center bg-gray-100 rounded-lg p-2">
                      <img src="https://images.unsplash.com/photo-1516876437184-593fda40c7ce" alt="Tablier de Chef" class="w-12 h-12 object-cover rounded-md">
                      <div class="ml-2">
                        <p class="text-sm font-medium">Tablier de Chef Personnalisable</p>
                        <p class="text-xs text-gray-500">Qté: 2</p>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 flex justify-between items-center">
                    <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium">
                      Voir les détails
                    </a>
                    <button class="bg-primary hover:bg-primary/90 text-white font-medium py-1 px-3 rounded-lg transition-colors text-sm">
                      Acheter à nouveau
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex items-center justify-between">
              <div>
                <p class="text-sm text-gray-700">
                  Affichage de <span class="font-medium">1</span> à <span class="font-medium">3</span> sur <span class="font-medium">8</span> commandes
                </p>
              </div>
              <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                  <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Précédent</span>
                    <i class="fas fa-chevron-left text-xs"></i>
                  </a>
                  <a href="#" aria-current="page" class="z-10 bg-primary text-white relative inline-flex items-center px-4 py-2 border border-primary text-sm font-medium">
                    1
                  </a>
                  <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    2
                  </a>
                  <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                    3
                  </a>
                  <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Suivant</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                  </a>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <!-- Competitions Tab -->
        <div id="competitions-tab" class="tab-content hidden">
          <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
              <h2 class="text-xl font-bold">Mes compétitions</h2>
              <div class="relative">
                <select class="pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm">
                  <option value="all">Toutes les compétitions</option>
                  <option value="active">En cours</option>
                  <option value="upcoming">À venir</option>
                  <option value="completed">Terminées</option>
                </select>
              </div>
            </div>

            <!-- Competitions List -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Competition 1 -->
              <div class="border border-gray-200 rounded-lg overflow-hidden competition-card">
                <div class="relative">
                  <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e" alt="Tarte Tatin Challenge" class="w-full h-48 object-cover">
                  <div class="absolute top-0 right-0 mt-2 mr-2">
                    <span class="px-2 py-1 bg-green-500 text-white text-xs rounded-full">En cours</span>
                  </div>
                </div>
                <div class="p-4">
                  <h3 class="text-lg font-bold">Tarte Tatin Challenge</h3>
                  <p class="text-sm text-gray-500">15/04/2025 - 30/04/2025</p>
                  <div class="mt-2">
                    <div class="flex items-center text-sm text-gray-600">
                      <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                      <span>Prix: 500€</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 mt-1">
                      <i class="fas fa-users text-blue-500 mr-2"></i>
                      <span>128 participants</span>
                    </div>
                  </div>
                  <div class="mt-4">
                    <div class="flex items-center">
                      <div class="flex-1">
                        <p class="text-xs text-gray-500 mb-1">Votre participation</p>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                          <div class="bg-primary h-2 rounded-full" style="width: 75%"></div>
                        </div>
                      </div>
                      <span class="ml-2 text-sm font-medium">75%</span>
                    </div>
                  </div>
                  <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-600">Soumission: 25/04/2025</span>
                    <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium">
                      Voir les détails
                    </a>
                  </div>
                </div>
              </div>

              <!-- Competition 2 -->
              <div class="border border-gray-200 rounded-lg overflow-hidden competition-card">
                <div class="relative">
                  <img src="https://images.unsplash.com/photo-1555126634-323283e090fa" alt="Cuisine Asiatique" class="w-full h-48 object-cover">
                  <div class="absolute top-0 right-0 mt-2 mr-2">
                    <span class="px-2 py-1 bg-gray-500 text-white text-xs rounded-full">Terminée</span>
                  </div>
                </div>
                <div class="p-4">
                  <h3 class="text-lg font-bold">Cuisine Asiatique</h3>
                  <p class="text-sm text-gray-500">01/03/2025 - 31/03/2025</p>
                  <div class="mt-2">
                    <div class="flex items-center text-sm text-gray-600">
                      <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                      <span>Prix: 750€</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 mt-1">
                      <i class="fas fa-users text-blue-500 mr-2"></i>
                      <span>156 participants</span>
                    </div>
                  </div>
                  <div class="mt-4">
                    <div class="flex items-center">
                      <div class="flex-1">
                        <p class="text-xs text-gray-500 mb-1">Votre résultat</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                          <i class="fas fa-medal mr-1"></i> 3ème place
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-600">Soumis le: 28/03/2025</span>
                    <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium">
                      Voir les détails
                    </a>
                  </div>
                </div>
              </div>

              <!-- Competition 3 -->
              <div class="border border-gray-200 rounded-lg overflow-hidden competition-card">
                <div class="relative">
                  <img src="https://images.unsplash.com/photo-1607478900766-efe13248b125" alt="Smoothie Challenge" class="w-full h-48 object-cover">
                  <div class="absolute top-0 right-0 mt-2 mr-2">
                    <span class="px-2 py-1 bg-green-500 text-white text-xs rounded-full">En cours</span>
                  </div>
                </div>
                <div class="p-4">
                  <h3 class="text-lg font-bold">Smoothie Challenge</h3>
                  <p class="text-sm text-gray-500">10/04/2025 - 20/04/2025</p>
                  <div class="mt-2">
                    <div class="flex items-center text-sm text-gray-600">
                      <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                      <span>Prix: 250€</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 mt-1">
                      <i class="fas fa-users text-blue-500 mr-2"></i>
                      <span>93 participants</span>
                    </div>
                  </div>
                  <div class="mt-4">
                    <div class="flex items-center">
                      <div class="flex-1">
                        <p class="text-xs text-gray-500 mb-1">Votre participation</p>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                          <div class="bg-primary h-2 rounded-full" style="width: 30%"></div>
                        </div>
                      </div>
                      <span class="ml-2 text-sm font-medium">30%</span>
                    </div>
                  </div>
                  <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm font-medium text-gray-600">Soumission: 18/04/2025</span>
                    <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium">
                      Voir les détails
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex items-center justify-between">
              <div>
                <p class="text-sm text-gray-700">
                  Affichage de <span class="font-medium">1</span> à <span class="font-medium">3</span> sur <span class="font-medium">3</span> compétitions
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Recipes Tab -->
        <div id="recipes-tab" class="tab-content hidden">
          <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Mes recettes</h2>
            <p class="text-gray-600">Contenu de l'onglet Mes recettes à venir prochainement.</p>
          </div>
        </div>

        <!-- Settings Tab -->
        <div id="settings-tab" class="tab-content hidden">
          <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Paramètres du compte</h2>

            <div class="space-y-6">
              <div>
                <h3 class="text-lg font-medium mb-3">Informations de connexion</h3>
                <div class="space-y-4">
                  <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" value="marie.dupont@example.com" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>
                  <div>
                    <label for="current-password" class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
                    <input type="password" id="current-password" placeholder="••••••••" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>
                  <div>
                    <label for="new-password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                    <input type="password" id="new-password" placeholder="••••••••" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>
                  <div>
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input type="password" id="confirm-password" placeholder="••••••••" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>
                  <div>
                    <button class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                      Mettre à jour
                    </button>
                  </div>
                </div>
              </div>

              <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium mb-3">Préférences de notification</h3>
                <div class="space-y-3">
                  <div class="flex items-center">
                    <input type="checkbox" id="email-notifications" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                    <label for="email-notifications" class="ml-2 block text-sm text-gray-700">
                      Recevoir des notifications par email
                    </label>
                  </div>
                  <div class="flex items-center">
                    <input type="checkbox" id="order-updates" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                    <label for="order-updates" class="ml-2 block text-sm text-gray-700">
                      Mises à jour des commandes
                    </label>
                  </div>
                  <div class="flex items-center">
                    <input type="checkbox" id="competition-notifications" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                    <label for="competition-notifications" class="ml-2 block text-sm text-gray-700">
                      Nouvelles compétitions
                    </label>
                  </div>
                  <div class="flex items-center">
                    <input type="checkbox" id="newsletter" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                    <label for="newsletter" class="ml-2 block text-sm text-gray-700">
                      Newsletter mensuelle
                    </label>
                  </div>
                  <div>
                    <button class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                      Enregistrer les préférences
                    </button>
                  </div>
                </div>
              </div>

              <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium mb-3">Supprimer le compte</h3>
                <p class="text-sm text-gray-600 mb-4">Une fois que vous supprimez votre compte, toutes vos données seront définitivement effacées. Cette action ne peut pas être annulée.</p>
                <button class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                  Supprimer mon compte
                </button>
              </div>
            </div>
          </div>
        </div>
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

  <!-- JavaScript -->
  <script>
    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
      const tabButtons = document.querySelectorAll('.tab-button');
      const tabContents = document.querySelectorAll('.tab-content');

      tabButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Remove active class from all buttons
          tabButtons.forEach(btn => {
            btn.classList.remove('border-primary', 'text-primary');
            btn.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
          });

          // Add active class to clicked button
          this.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
          this.classList.add('border-primary', 'text-primary');

          // Hide all tab contents
          tabContents.forEach(content => {
            content.classList.add('hidden');
          });

          // Show the selected tab content
          const tabId = this.getAttribute('data-tab');
          document.getElementById(`${tabId}-tab`).classList.remove('hidden');
        });
      });
    });
  </script>
</body>
</html>
