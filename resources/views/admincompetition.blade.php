@extends('dashboard')
@section('title','Gestion des compétitions')
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

    /* Card hover effect */
    .competition-card {
      transition: all 0.3s ease;
    }
    .competition-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
  </style>
@endsection('css')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
      <div>
        <h1 class="text-2xl font-bold">Gestion des Compétitions</h1>
        <p class="text-gray-600">Gérez toutes les compétitions culinaires de la plateforme</p>
      </div>
      <div class="mt-4 md:mt-0 flex space-x-2">
        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
          <i class="fas fa-file-export mr-2"></i>
          Exporter
        </button>
        <button id="add-competition-btn" class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
          <i class="fas fa-plus mr-2"></i>
          Ajouter une compétition
        </button>
      </div>
    </div>

    <!-- Filters and View Toggle -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <h2 class="text-lg font-bold mb-4 md:mb-0">Filtres</h2>
        <div class="flex flex-col md:flex-row gap-4">
          <div>
            <select class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
              <option value="">Tous les statuts</option>
              <option value="upcoming">À venir</option>
              <option value="active">En cours</option>
              <option value="completed">Terminée</option>
              <option value="cancelled">Annulée</option>
            </select>
          </div>
          <div>
            <select class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
              <option value="">Toutes les catégories</option>
              <option value="dessert">Desserts</option>
              <option value="main">Plats principaux</option>
              <option value="appetizer">Entrées</option>
              <option value="drink">Boissons</option>
              <option value="all">Toutes catégories</option>
            </select>
          </div>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fas fa-search text-gray-400"></i>
            </span>
            <input type="text" placeholder="Rechercher..." class="w-full md:w-auto pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
          </div>
          <div class="flex space-x-2">
            <button id="view-grid" class="bg-primary text-white p-2 rounded-lg">
              <i class="fas fa-th-large"></i>
            </button>
            <button id="view-list" class="bg-gray-200 text-gray-700 p-2 rounded-lg">
              <i class="fas fa-list"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Grid View (Default) -->
    <div id="grid-view" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
      <!-- Competition Card 1 -->
      <div class="bg-white rounded-lg shadow-sm overflow-hidden competition-card">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e" alt="Tarte Tatin Challenge">
          <div class="absolute top-0 right-0 mt-2 mr-2">
            <span class="px-2 py-1 bg-green-500 text-white text-xs rounded-full">En cours</span>
          </div>
        </div>
        <div class="p-4">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-bold">Tarte Tatin Challenge</h3>
              <p class="text-sm text-gray-500">15/04/2025 - 30/04/2025</p>
            </div>
            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">Desserts</span>
          </div>
          <div class="mt-3">
            <p class="text-sm text-gray-600">Concours de la meilleure tarte tatin traditionnelle.</p>
          </div>
          <div class="mt-4 flex justify-between items-center">
            <div>
              <span class="text-sm font-bold">Prix: 500€</span>
              <p class="text-xs text-gray-500">128 participants</p>
            </div>
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-800 p-1">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-competition">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-800 p-1">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Competition Card 2 -->
      <div class="bg-white rounded-lg shadow-sm overflow-hidden competition-card">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1551024506-0bccd828d307" alt="Pâtisserie Française">
          <div class="absolute top-0 right-0 mt-2 mr-2">
            <span class="px-2 py-1 bg-blue-500 text-white text-xs rounded-full">À venir</span>
          </div>
        </div>
        <div class="p-4">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-bold">Pâtisserie Française</h3>
              <p class="text-sm text-gray-500">01/05/2025 - 15/05/2025</p>
            </div>
            <span class="px-2 py-1 bg-primary/10 text-primary text-xs rounded-full">Desserts</span>
          </div>
          <div class="mt-3">
            <p class="text-sm text-gray-600">Concours de pâtisserie française traditionnelle.</p>
          </div>
          <div class="mt-4 flex justify-between items-center">
            <div>
              <span class="text-sm font-bold">Prix: 1000€</span>
              <p class="text-xs text-gray-500">87 participants</p>
            </div>
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-800 p-1">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-competition">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-800 p-1">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Competition Card 3 -->
      <div class="bg-white rounded-lg shadow-sm overflow-hidden competition-card">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" alt="Salade Créative">
          <div class="absolute top-0 right-0 mt-2 mr-2">
            <span class="px-2 py-1 bg-blue-500 text-white text-xs rounded-full">À venir</span>
          </div>
        </div>
        <div class="p-4">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-bold">Salade Créative</h3>
              <p class="text-sm text-gray-500">20/05/2025 - 30/05/2025</p>
            </div>
            <span class="px-2 py-1 bg-secondary/10 text-secondary text-xs rounded-full">Entrées</span>
          </div>
          <div class="mt-3">
            <p class="text-sm text-gray-600">Concours de salades créatives et originales.</p>
          </div>
          <div class="mt-4 flex justify-between items-center">
            <div>
              <span class="text-sm font-bold">Prix: 300€</span>
              <p class="text-xs text-gray-500">42 participants</p>
            </div>
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-800 p-1">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-competition">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-800 p-1">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Competition Card 4 -->
      <div class="bg-white rounded-lg shadow-sm overflow-hidden competition-card">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1555126634-323283e090fa" alt="Cuisine Asiatique">
          <div class="absolute top-0 right-0 mt-2 mr-2">
            <span class="px-2 py-1 bg-gray-500 text-white text-xs rounded-full">Terminée</span>
          </div>
        </div>
        <div class="p-4">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-bold">Cuisine Asiatique</h3>
              <p class="text-sm text-gray-500">01/03/2025 - 31/03/2025</p>
            </div>
            <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded-full">Plats principaux</span>
          </div>
          <div class="mt-3">
            <p class="text-sm text-gray-600">Concours de cuisine asiatique authentique.</p>
          </div>
          <div class="mt-4 flex justify-between items-center">
            <div>
              <span class="text-sm font-bold">Prix: 750€</span>
              <p class="text-xs text-gray-500">156 participants</p>
            </div>
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-800 p-1">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-competition">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-800 p-1">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Competition Card 5 -->
      <div class="bg-white rounded-lg shadow-sm overflow-hidden competition-card">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1607478900766-efe13248b125" alt="Smoothie Challenge">
          <div class="absolute top-0 right-0 mt-2 mr-2">
            <span class="px-2 py-1 bg-green-500 text-white text-xs rounded-full">En cours</span>
          </div>
        </div>
        <div class="p-4">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-bold">Smoothie Challenge</h3>
              <p class="text-sm text-gray-500">10/04/2025 - 20/04/2025</p>
            </div>
            <span class="px-2 py-1 bg-secondary/10 text-secondary text-xs rounded-full">Boissons</span>
          </div>
          <div class="mt-3">
            <p class="text-sm text-gray-600">Concours de smoothies sains et délicieux.</p>
          </div>
          <div class="mt-4 flex justify-between items-center">
            <div>
              <span class="text-sm font-bold">Prix: 250€</span>
              <p class="text-xs text-gray-500">93 participants</p>
            </div>
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-800 p-1">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-competition">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-800 p-1">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Competition Card 6 -->
      <div class="bg-white rounded-lg shadow-sm overflow-hidden competition-card">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1495147466023-ac5c588e2e94" alt="Cuisine Méditerranéenne">
          <div class="absolute top-0 right-0 mt-2 mr-2">
            <span class="px-2 py-1 bg-blue-500 text-white text-xs rounded-full">À venir</span>
          </div>
        </div>
        <div class="p-4">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-bold">Cuisine Méditerranéenne</h3>
              <p class="text-sm text-gray-500">01/06/2025 - 15/06/2025</p>
            </div>
            <span class="px-2 py-1 bg-accent/10 text-accent text-xs rounded-full">Plats principaux</span>
          </div>
          <div class="mt-3">
            <p class="text-sm text-gray-600">Concours de cuisine méditerranéenne traditionnelle.</p>
          </div>
          <div class="mt-4 flex justify-between items-center">
            <div>
              <span class="text-sm font-bold">Prix: 600€</span>
              <p class="text-xs text-gray-500">65 participants</p>
            </div>
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-800 p-1">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-competition">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-800 p-1">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- List View (Hidden by default) -->
    <div id="list-view" class="bg-white rounded-lg shadow-sm overflow-hidden hidden mb-6">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Compétition</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dates</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Participants</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <!-- Competition 1 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e" alt="Tarte Tatin Challenge">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Tarte Tatin Challenge</div>
                    <div class="text-xs text-gray-500">Prix: 500€</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary/10 text-primary">
                  Desserts
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">15/04/2025 - 30/04/2025</div>
                <div class="text-xs text-gray-500">15 jours restants</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                128
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  En cours
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-competition">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- Competition 2 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1551024506-0bccd828d307" alt="Pâtisserie Française">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Pâtisserie Française</div>
                    <div class="text-xs text-gray-500">Prix: 1000€</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary/10 text-primary">
                  Desserts
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">01/05/2025 - 15/05/2025</div>
                <div class="text-xs text-gray-500">Commence dans 15 jours</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                87
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                  À venir
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-competition">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- Autres compétitions... -->
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="bg-white rounded-lg shadow-sm px-4 py-3 flex items-center justify-between">
      <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
          <p class="text-sm text-gray-700">
            Affichage de <span class="font-medium">1</span> à <span class="font-medium">6</span> sur <span class="font-medium">24</span> résultats
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
            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
              ...
            </span>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
              4
            </a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
              <span class="sr-only">Suivant</span>
              <i class="fas fa-chevron-right text-xs"></i>
            </a>
          </nav>
        </div>
      </div>
    </div>
@endsection

@section('modal')
  <!-- Modales -->

  <!-- Modale Ajouter/Modifier Compétition -->
  <div id="add-competition-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="competition-modal-title">
                Ajouter une nouvelle compétition
              </h3>

              <div class="mt-2">
                <form id="competition-form" class="space-y-4">
                  <div>
                    <label for="competition-title" class="block text-sm font-medium text-gray-700">Titre de la compétition</label>
                    <input type="text" id="competition-title" name="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="competition-category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select id="competition-category" name="category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="dessert">Desserts</option>
                      <option value="main">Plats principaux</option>
                      <option value="appetizer">Entrées</option>
                      <option value="drink">Boissons</option>
                      <option value="all">Toutes catégories</option>
                    </select>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label for="competition-start-date" class="block text-sm font-medium text-gray-700">Date de début</label>
                      <input type="date" id="competition-start-date" name="start_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>

                    <div>
                      <label for="competition-end-date" class="block text-sm font-medium text-gray-700">Date de fin</label>
                      <input type="date" id="competition-end-date" name="end_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                  </div>

                  <div>
                    <label for="competition-prize" class="block text-sm font-medium text-gray-700">Prix (€)</label>
                    <input type="number" id="competition-prize" name="prize" min="0" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="competition-description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="competition-description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                  </div>

                  <div>
                    <label for="competition-rules" class="block text-sm font-medium text-gray-700">Règles</label>
                    <textarea id="competition-rules" name="rules" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                  </div>

                  <div>
                    <label for="competition-image" class="block text-sm font-medium text-gray-700">Image</label>
                    <div class="mt-1 flex items-center">
                      <span class="inline-block h-12 w-12 rounded-md overflow-hidden bg-gray-100">
                        <img id="competition-image-preview" src="/placeholder.svg?height=48&width=48" alt="Image" class="h-full w-full object-cover">
                      </span>
                      <button type="button" id="competition-image-button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Changer
                      </button>
                      <input type="file" id="competition-image" name="image" class="hidden" accept="image/*">
                    </div>
                  </div>

                  <div>
                    <label for="competition-status" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="competition-status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="draft">Brouillon</option>
                      <option value="upcoming">À venir</option>
                      <option value="active">En cours</option>
                      <option value="completed">Terminée</option>
                      <option value="cancelled">Annulée</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="save-competition-btn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
            <span id="competition-save-button-text">Ajouter</span>
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
    // Modal handling
    const competitionModal = document.getElementById('add-competition-modal');
    const competitionModalTitle = document.getElementById('competition-modal-title');
    const competitionSaveButtonText = document.getElementById('competition-save-button-text');
    const competitionForm = document.getElementById('competition-form');

    // Image upload preview
    const competitionImageInput = document.getElementById('competition-image');
    const competitionImageButton = document.getElementById('competition-image-button');
    const competitionImagePreview = document.getElementById('competition-image-preview');

    // View toggle
    const gridView = document.getElementById('grid-view');
    const listView = document.getElementById('list-view');
    const viewGridBtn = document.getElementById('view-grid');
    const viewListBtn = document.getElementById('view-list');

    // Toggle view
    viewGridBtn.addEventListener('click', function() {
      gridView.classList.remove('hidden');
      listView.classList.add('hidden');
      viewGridBtn.classList.remove('bg-gray-200', 'text-gray-700');
      viewGridBtn.classList.add('bg-primary', 'text-white');
      viewListBtn.classList.remove('bg-primary', 'text-white');
      viewListBtn.classList.add('bg-gray-200', 'text-gray-700');
    });

    viewListBtn.addEventListener('click', function() {
      gridView.classList.add('hidden');
      listView.classList.remove('hidden');
      viewListBtn.classList.remove('bg-gray-200', 'text-gray-700');
      viewListBtn.classList.add('bg-primary', 'text-white');
      viewGridBtn.classList.remove('bg-primary', 'text-white');
      viewGridBtn.classList.add('bg-gray-200', 'text-gray-700');
    });

    // Open modal
    document.getElementById('add-competition-btn').addEventListener('click', function() {
      competitionModalTitle.textContent = 'Ajouter une nouvelle compétition';
      competitionSaveButtonText.textContent = 'Ajouter';
      competitionForm.reset();
      competitionImagePreview.src = '/placeholder.svg?height=48&width=48';
      competitionModal.classList.remove('hidden');
    });

    // Edit competition
    document.querySelectorAll('.edit-competition').forEach(button => {
      button.addEventListener('click', function() {
        competitionModalTitle.textContent = 'Modifier la compétition';
        competitionSaveButtonText.textContent = 'Enregistrer les modifications';

        // Ici, vous chargeriez les données de la compétition à modifier
        // Pour cet exemple, nous allons simplement remplir avec des données fictives
        document.getElementById('competition-title').value = 'Tarte Tatin Challenge';
        document.getElementById('competition-category').value = 'dessert';
        document.getElementById('competition-start-date').value = '2025-04-15';
        document.getElementById('competition-end-date').value = '2025-04-30';
        document.getElementById('competition-prize').value = '500';
        document.getElementById('competition-description').value = 'Concours de la meilleure tarte tatin traditionnelle.';
        document.getElementById('competition-status').value = 'active';

        competitionModal.classList.remove('hidden');
      });
    });

    // Close modal
    document.querySelectorAll('.close-modal').forEach(button => {
      button.addEventListener('click', function() {
        competitionModal.classList.add('hidden');
      });
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
      if (event.target === competitionModal) {
        competitionModal.classList.add('hidden');
      }
    });

    // Image preview
    competitionImageButton.addEventListener('click', function() {
      competitionImageInput.click();
    });

    competitionImageInput.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          competitionImagePreview.src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
      }
    });

    // Save competition
    document.getElementById('save-competition-btn').addEventListener('click', function() {
      // Ici, vous ajouteriez le code pour envoyer les données au serveur
      alert('Compétition enregistrée avec succès !');
      competitionModal.classList.add('hidden');
    });
  </script>
@endsection
