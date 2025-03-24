@extends('dashboard')
@section('title','Gestion des recettes')
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
   
  </script>
@endsection
