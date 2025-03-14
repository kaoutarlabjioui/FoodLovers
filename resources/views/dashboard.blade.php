@extends('layout')
@section('title','Tableau de bord - Administration FoodLovers')
@section('css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');

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

    /* Chart styling */
    .chart-container {
      position: relative;
      height: 250px;
      width: 100%;
    }

    /* Modal animation */
    .modal-enter {
      opacity: 0;
      transform: scale(0.95);
    }
    .modal-enter-active {
      opacity: 1;
      transform: scale(1);
      transition: opacity 300ms, transform 300ms;
    }
    .modal-exit {
      opacity: 1;
    }
    .modal-exit-active {
      opacity: 0;
      transform: scale(0.95);
      transition: opacity 300ms, transform 300ms;
    }
  </style>
@endsection('css')
@section('content')


    <!-- Main Content -->
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

        <!-- Recent Activity and Tasks -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
          <!-- Recent Activity -->
          <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="flex justify-between items-center mb-4">
              <h3 class="font-bold text-lg">Activité récente</h3>
              <button class="text-primary hover:text-primary/80 text-sm">Voir tout</button>
            </div>

            <div class="space-y-4">
              <div class="flex items-start">
                <div class="bg-primary/10 p-2 rounded-full mr-3">
                  <i class="fas fa-user-plus text-primary"></i>
                </div>
                <div class="flex-1">
                  <p class="font-medium">Nouvel utilisateur inscrit</p>
                  <p class="text-gray-500 text-sm">Sophie Martin s'est inscrite sur la plateforme.</p>
                  <p class="text-gray-400 text-xs mt-1">Il y a 10 minutes</p>
                </div>
              </div>

              <div class="flex items-start">
                <div class="bg-secondary/10 p-2 rounded-full mr-3">
                  <i class="fas fa-utensils text-secondary"></i>
                </div>
                <div class="flex-1">
                  <p class="font-medium">Nouvelle recette publiée</p>
                  <p class="text-gray-500 text-sm">Thomas Dubois a publié "Risotto aux champignons".</p>
                  <p class="text-gray-400 text-xs mt-1">Il y a 25 minutes</p>
                </div>
              </div>

              <div class="flex items-start">
                <div class="bg-accent/10 p-2 rounded-full mr-3">
                  <i class="fas fa-trophy text-accent"></i>
                </div>
                <div class="flex-1">
                  <p class="font-medium">Nouvelle compétition créée</p>
                  <p class="text-gray-500 text-sm">La compétition "Défi Pâtisserie de Printemps" a été créée.</p>
                  <p class="text-gray-400 text-xs mt-1">Il y a 1 heure</p>
                </div>
              </div>

              <div class="flex items-start">
                <div class="bg-primary/10 p-2 rounded-full mr-3">
                  <i class="fas fa-comment text-primary"></i>
                </div>
                <div class="flex-1">
                  <p class="font-medium">Nouveau commentaire</p>
                  <p class="text-gray-500 text-sm">Léa Petit a commenté la recette "Tarte aux pommes traditionnelle".</p>
                  <p class="text-gray-400 text-xs mt-1">Il y a 2 heures</p>
                </div>
              </div>

              <div class="flex items-start">
                <div class="bg-secondary/10 p-2 rounded-full mr-3">
                  <i class="fas fa-star text-secondary"></i>
                </div>
                <div class="flex-1">
                  <p class="font-medium">Nouvelle note</p>
                  <p class="text-gray-500 text-sm">Paul Durand a noté 5 étoiles la recette "Crumble aux pommes".</p>
                  <p class="text-gray-400 text-xs mt-1">Il y a 3 heures</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Tasks -->
          <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="flex justify-between items-center mb-4">
              <h3 class="font-bold text-lg">Tâches à faire</h3>
              <button id="add-task-btn" class="bg-primary text-white px-3 py-1 rounded text-sm hover:bg-primary/90 transition-colors">
                <i class="fas fa-plus mr-1"></i> Ajouter
              </button>
            </div>

            <div class="space-y-3">
              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <input type="checkbox" class="h-5 w-5 text-primary rounded focus:ring-primary mr-3">
                <div class="flex-1">
                  <p class="font-medium">Valider les nouvelles recettes</p>
                  <p class="text-gray-500 text-sm">15 recettes en attente de validation</p>
                </div>
                <span class="bg-red-100 text-red-600 text-xs px-2 py-1 rounded">Urgent</span>
              </div>

              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <input type="checkbox" class="h-5 w-5 text-primary rounded focus:ring-primary mr-3">
                <div class="flex-1">
                  <p class="font-medium">Modérer les commentaires signalés</p>
                  <p class="text-gray-500 text-sm">8 commentaires signalés à vérifier</p>
                </div>
                <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded">Important</span>
              </div>

              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <input type="checkbox" class="h-5 w-5 text-primary rounded focus:ring-primary mr-3">
                <div class="flex-1">
                  <p class="font-medium">Préparer la newsletter hebdomadaire</p>
                  <p class="text-gray-500 text-sm">À envoyer vendredi</p>
                </div>
                <span class="bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded">Normal</span>
              </div>

              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <input type="checkbox" class="h-5 w-5 text-primary rounded focus:ring-primary mr-3">
                <div class="flex-1">
                  <p class="font-medium">Mettre à jour les règles de la compétition</p>
                  <p class="text-gray-500 text-sm">Défi Pâtisserie de Printemps</p>
                </div>
                <span class="bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded">Normal</span>
              </div>

              <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <input type="checkbox" class="h-5 w-5 text-primary rounded focus:ring-primary mr-3">
                <div class="flex-1">
                  <p class="font-medium">Répondre aux messages de support</p>
                  <p class="text-gray-500 text-sm">12 messages non lus</p>
                </div>
                <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded">Important</span>
              </div>
            </div>

            <div class="mt-4 text-center">
              <button class="text-primary hover:text-primary/80 text-sm">
                Voir toutes les tâches
              </button>
            </div>
          </div>
        </div>

        <!-- Recent Recipes Table -->
        <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-bold text-lg">Recettes récentes</h3>
            <div class="flex space-x-2">
              <div class="relative">
                <input
                  type="text"
                  placeholder="Rechercher..."
                  class="px-3 py-1 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary"
                >
                <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-xs"></i>
              </div>
              <button id="add-recipe-btn" class="bg-primary text-white px-3 py-1 rounded text-sm hover:bg-primary/90 transition-colors">
                <i class="fas fa-plus mr-1"></i> Ajouter
              </button>
            </div>
          </div>

          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recette</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auteur</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1488477304112-4944851de03d" alt="Tarte aux pommes">
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Tarte aux pommes traditionnelle</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Emma Wilson</div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary/10 text-primary">
                      Dessert
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    14 mars 2025
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Publiée
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex space-x-2">
                      <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-yellow-600 hover:text-yellow-800">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1605522561233-768ad7a8fabf" alt="Risotto">
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Risotto aux champignons</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Thomas Dubois</div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary/10 text-secondary">
                      Plat principal
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    13 mars 2025
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Publiée
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex space-x-2">
                      <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-yellow-600 hover:text-yellow-800">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd" alt="Salade">
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Salade César au poulet grillé</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Léa Petit</div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-accent/10 text-accent">
                      Entrée
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    12 mars 2025
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                      En attente
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex space-x-2">
                      <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-yellow-600 hover:text-yellow-800">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1551024506-0bccd828d307" alt="Chausson">
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Chausson aux pommes</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Paul Durand</div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary/10 text-primary">
                      Dessert
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    11 mars 2025
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Rejetée
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex space-x-2">
                      <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-yellow-600 hover:text-yellow-800">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1607478900766-efe13248b125" alt="Smoothie">
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">Smoothie aux fruits rouges</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Marie Lambert</div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary/10 text-secondary">
                      Boisson
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    10 mars 2025
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Publiée
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    <div class="flex space-x-2">
                      <button class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="text-yellow-600 hover:text-yellow-800">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="text-red-600 hover:text-red-800">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="flex justify-between items-center mt-4">
            <div class="text-sm text-gray-500">
              Affichage de 1 à 5 sur 253 recettes
            </div>
            <div class="flex space-x-1">
              <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200 text-sm">Précédent</button>
              <button class="px-3 py-1 rounded bg-primary text-white text-sm">1</button>
              <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200 text-sm">2</button>
              <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200 text-sm">3</button>
              <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200 text-sm">...</button>
              <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200 text-sm">51</button>
              <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200 text-sm">Suivant</button>
            </div>
          </div>
        </div>
      </main>
    </div>




@endsection
@section('modal')
  <!-- Modales -->

  <!-- Modale Ajouter une recette -->
  <div id="add-recipe-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                Ajouter une nouvelle recette
              </h3>

              <div class="mt-2">
                <form id="add-recipe-form" class="space-y-4">
                  <div>
                    <label for="recipe-title" class="block text-sm font-medium text-gray-700">Titre de la recette</label>
                    <input type="text" id="recipe-title" name="recipe-title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="recipe-author" class="block text-sm font-medium text-gray-700">Auteur</label>
                    <select id="recipe-author" name="recipe-author" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="">Sélectionner un auteur</option>
                      <option value="1">Emma Wilson</option>
                      <option value="2">Thomas Dubois</option>
                      <option value="3">Léa Petit</option>
                      <option value="4">Paul Durand</option>
                      <option value="5">Marie Lambert</option>
                    </select>
                  </div>

                  <div>
                    <label for="recipe-category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select id="recipe-category" name="recipe-category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="">Sélectionner une catégorie</option>
                      <option value="dessert">Dessert</option>
                      <option value="plat-principal">Plat principal</option>
                      <option value="entree">Entrée</option>
                      <option value="boisson">Boisson</option>
                      <option value="petit-dejeuner">Petit-déjeuner</option>
                    </select>
                  </div>

                  <div>
                    <label for="recipe-description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="recipe-description" name="recipe-description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                  </div>

                  <div>
                    <label for="recipe-image" class="block text-sm font-medium text-gray-700">Image</label>
                    <div class="mt-1 flex items-center">
                      <span class="inline-block h-12 w-12 rounded-md overflow-hidden bg-gray-100">
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                      </span>
                      <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Changer
                      </button>
                    </div>
                  </div>

                  <div>
                    <label for="recipe-status" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="recipe-status" name="recipe-status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="draft">Brouillon</option>
                      <option value="pending">En attente</option>
                      <option value="published">Publiée</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
            Ajouter
          </button>
          <button type="button" class="close-modal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Annuler
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modale Ajouter un utilisateur -->
  <div id="add-user-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                Ajouter un nouvel utilisateur
              </h3>

              <div class="mt-2">
                <form id="add-user-form" class="space-y-4">
                  <div>
                    <label for="user-name" class="block text-sm font-medium text-gray-700">Nom complet</label>
                    <input type="text" id="user-name" name="user-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="user-email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="user-email" name="user-email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="user-role" class="block text-sm font-medium text-gray-700">Rôle</label>
                    <select id="user-role" name="user-role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="user">Utilisateur</option>
                      <option value="chef">Chef</option>
                      <option value="moderator">Modérateur</option>
                      <option value="admin">Administrateur</option>
                    </select>
                  </div>

                  <div>
                    <label for="user-password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="user-password" name="user-password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="user-confirm-password" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input type="password" id="user-confirm-password" name="user-confirm-password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="user-status" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="user-status" name="user-status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="active">Actif</option>
                      <option value="pending">En attente</option>
                      <option value="blocked">Bloqué</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
            Ajouter
          </button>
          <button type="button" class="close-modal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Annuler
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modale Ajouter une tâche -->
  <div id="add-task-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                Ajouter une nouvelle tâche
              </h3>

              <div class="mt-2">
                <form id="add-task-form" class="space-y-4">
                  <div>
                    <label for="task-title" class="block text-sm font-medium text-gray-700">Titre de la tâche</label>
                    <input type="text" id="task-title" name="task-title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="task-description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="task-description" name="task-description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                  </div>

                  <div>
                    <label for="task-assignee" class="block text-sm font-medium text-gray-700">Assigné à</label>
                    <select id="task-assignee" name="task-assignee" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="">Sélectionner un utilisateur</option>
                      <option value="1">Admin</option>
                      <option value="2">Emma Wilson</option>
                      <option value="3">Thomas Dubois</option>
                      <option value="4">Léa Petit</option>
                    </select>
                  </div>

                  <div>
                    <label for="task-due-date" class="block text-sm font-medium text-gray-700">Date d'échéance</label>
                    <input type="date" id="task-due-date" name="task-due-date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="task-priority" class="block text-sm font-medium text-gray-700">Priorité</label>
                    <select id="task-priority" name="task-priority" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="normal">Normal</option>
                      <option value="important">Important</option>
                      <option value="urgent">Urgent</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
            Ajouter
          </button>
          <button type="button" class="close-modal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Annuler
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <!-- JavaScript -->
  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      document.getElementById('mobile-sidebar').classList.remove('-translate-x-full');
      document.getElementById('mobile-overlay').classList.remove('hidden');
    });

    document.getElementById('close-sidebar').addEventListener('click', function() {
      document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
      document.getElementById('mobile-overlay').classList.add('hidden');
    });

    document.getElementById('mobile-overlay').addEventListener('click', function() {
      document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
      document.getElementById('mobile-overlay').classList.add('hidden');
    });

    // Modal handling
    const modals = {
      'add-recipe-modal': document.getElementById('add-recipe-modal'),
      'add-user-modal': document.getElementById('add-user-modal'),
      'add-task-modal': document.getElementById('add-task-modal')
    };

    // Open modals
    document.getElementById('add-recipe-btn').addEventListener('click', function() {
      modals['add-recipe-modal'].classList.remove('hidden');
    });

    document.getElementById('add-task-btn').addEventListener('click', function() {
      modals['add-task-modal'].classList.remove('hidden');
    });

    // Close modals
    const closeButtons = document.querySelectorAll('.close-modal');
    closeButtons.forEach(button => {
      button.addEventListener('click', function() {
        for (const key in modals) {
          modals[key].classList.add('hidden');
        }
      });
    });

    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
      for (const key in modals) {
        if (event.target === modals[key]) {
          modals[key].classList.add('hidden');
        }
      }
    });

    // Charts
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
@endsection


