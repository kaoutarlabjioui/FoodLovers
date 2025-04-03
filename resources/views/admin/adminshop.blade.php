@extends('dashboard')
@section('title','Gestion de la boutique')
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

  /* Product card styling */
  .product-card {
    transition: all 0.3s ease;
  }
  .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
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

  /* Badge styling */
  .badge-stock {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 4px 8px;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
  }
  .badge-stock.in-stock {
    background-color: rgba(16, 185, 129, 0.1);
    color: rgb(16, 185, 129);
  }
  .badge-stock.low-stock {
    background-color: rgba(245, 158, 11, 0.1);
    color: rgb(245, 158, 11);
  }
  .badge-stock.out-of-stock {
    background-color: rgba(239, 68, 68, 0.1);
    color: rgb(239, 68, 68);
  }
</style>
@endsection('css')

@section('content')
  <!-- Page Header -->
  <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
      <h1 class="text-2xl font-bold">Gestion de la Boutique</h1>
      <p class="text-gray-600">Gérez tous les produits disponibles dans la boutique</p>
    </div>
    <div class="mt-4 md:mt-0 flex space-x-2">
      <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
        <i class="fas fa-file-export mr-2"></i>
        Exporter
      </button>
      <button id="add-product-btn" class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
        <i class="fas fa-plus mr-2"></i>
        Ajouter un produit
      </button>
    </div>
  </div>

  <!-- Stats Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow-sm p-4">
      <div class="flex items-center">
        <div class="p-3 rounded-full bg-primary/10 text-primary">
          <i class="fas fa-shopping-cart text-xl"></i>
        </div>
        <div class="ml-4">
          <p class="text-gray-500 text-sm">Total Produits</p>
          <h3 class="font-bold text-xl">156</h3>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-4">
      <div class="flex items-center">
        <div class="p-3 rounded-full bg-green-100 text-green-600">
          <i class="fas fa-tags text-xl"></i>
        </div>
        <div class="ml-4">
          <p class="text-gray-500 text-sm">En promotion</p>
          <h3 class="font-bold text-xl">24</h3>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-4">
      <div class="flex items-center">
        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
          <i class="fas fa-box-open text-xl"></i>
        </div>
        <div class="ml-4">
          <p class="text-gray-500 text-sm">En stock</p>
          <h3 class="font-bold text-xl">132</h3>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-4">
      <div class="flex items-center">
        <div class="p-3 rounded-full bg-red-100 text-red-600">
          <i class="fas fa-exclamation-circle text-xl"></i>
        </div>
        <div class="ml-4">
          <p class="text-gray-500 text-sm">Rupture de stock</p>
          <h3 class="font-bold text-xl">24</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Filters and View Toggle -->
  <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
      <h2 class="text-lg font-bold mb-4 md:mb-0">Filtres</h2>
      <div class="flex flex-col md:flex-row gap-4">
        <div>
          <select class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="">Toutes les catégories</option>
            <option value="ustensiles">Ustensiles</option>
            <option value="electromenager">Électroménager</option>
            <option value="livres">Livres de cuisine</option>
            <option value="ingredients">Ingrédients</option>
            <option value="accessoires">Accessoires</option>
          </select>
        </div>
        <div>
          <select class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="">Tous les stocks</option>
            <option value="in-stock">En stock</option>
            <option value="low-stock">Stock faible</option>
            <option value="out-of-stock">Rupture de stock</option>
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
  <div id="grid-view" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-6">
    <!-- Product Card 1 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1556911220-bda9f7b24446" alt="Couteau de Chef Professionnel">
        <div class="badge-stock in-stock">En stock</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">Couteau de Chef Professionnel</h3>
            <p class="text-sm text-gray-500">Ustensiles</p>
          </div>
          <span class="text-lg font-bold text-primary">49,99 €</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">Couteau de chef en acier inoxydable avec manche ergonomique.</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">45</span></span>
          </div>
          <div class="flex space-x-2">
            <button class="text-blue-600 hover:text-blue-800 p-1">
              <i class="fas fa-eye"></i>
            </button>
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
              <i class="fas fa-edit"></i>
            </button>
            <button class="text-red-600 hover:text-red-800 p-1">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Card 2 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1585032226651-759b368d7246" alt="Robot Culinaire Multifonction">
        <div class="badge-stock in-stock">En stock</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">Robot Culinaire Multifonction</h3>
            <p class="text-sm text-gray-500">Électroménager</p>
          </div>
          <span class="text-lg font-bold text-primary">199,99 €</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">Robot de cuisine multifonction avec 10 vitesses et 5 accessoires.</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">12</span></span>
          </div>
          <div class="flex space-x-2">
            <button class="text-blue-600 hover:text-blue-800 p-1">
              <i class="fas fa-eye"></i>
            </button>
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
              <i class="fas fa-edit"></i>
            </button>
            <button class="text-red-600 hover:text-red-800 p-1">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Card 3 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1589187151053-5ec8818e661b" alt="Livre de Recettes Méditerranéennes">
        <div class="badge-stock low-stock">Stock faible</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">Livre de Recettes Méditerranéennes</h3>
            <p class="text-sm text-gray-500">Livres de cuisine</p>
          </div>
          <span class="text-lg font-bold text-primary">24,99 €</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">100 recettes authentiques de la cuisine méditerranéenne.</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">3</span></span>
          </div>
          <div class="flex space-x-2">
            <button class="text-blue-600 hover:text-blue-800 p-1">
              <i class="fas fa-eye"></i>
            </button>
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
              <i class="fas fa-edit"></i>
            </button>
            <button class="text-red-600 hover:text-red-800 p-1">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Card 4 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1518977676601-b53f82aba655" alt="Épices Gourmet Set">
        <div class="badge-stock out-of-stock">Rupture de stock</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">Épices Gourmet Set</h3>
            <p class="text-sm text-gray-500">Ingrédients</p>
          </div>
          <span class="text-lg font-bold text-primary">34,99 €</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">Coffret de 12 épices rares du monde entier.</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">0</span></span>
          </div>
          <div class="flex space-x-2">
            <button class="text-blue-600 hover:text-blue-800 p-1">
              <i class="fas fa-eye"></i>
            </button>
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
              <i class="fas fa-edit"></i>
            </button>
            <button class="text-red-600 hover:text-red-800 p-1">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Card 5 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1594041680534-e8c8cdebd659" alt="Planche à Découper en Bois d'Acacia">
        <div class="badge-stock in-stock">En stock</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">Planche à Découper en Bois d'Acacia</h3>
            <p class="text-sm text-gray-500">Ustensiles</p>
          </div>
          <span class="text-lg font-bold text-primary">29,99 €</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">Planche à découper en bois d'acacia massif avec rainures pour jus.</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">28</span></span>
          </div>
          <div class="flex space-x-2">
            <button class="text-blue-600 hover:text-blue-800 p-1">
              <i class="fas fa-eye"></i>
            </button>
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
              <i class="fas fa-edit"></i>
            </button>
            <button class="text-red-600 hover:text-red-800 p-1">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Card 6 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1516876437184-593fda40c7ce" alt="Tablier de Chef Personnalisable">
        <div class="badge-stock in-stock">En stock</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">Tablier de Chef Personnalisable</h3>
            <p class="text-sm text-gray-500">Accessoires</p>
          </div>
          <span class="text-lg font-bold text-primary">19,99 €</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">Tablier de cuisine en coton avec poches et option de personnalisation.</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">52</span></span>
          </div>
          <div class="flex space-x-2">
            <button class="text-blue-600 hover:text-blue-800 p-1">
              <i class="fas fa-eye"></i>
            </button>
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
              <i class="fas fa-edit"></i>
            </button>
            <button class="text-red-600 hover:text-red-800 p-1">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Card 7 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1574269909862-7e1d70bb3ed5" alt="Balance de Cuisine Digitale">
        <div class="badge-stock in-stock">En stock</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">Balance de Cuisine Digitale</h3>
            <p class="text-sm text-gray-500">Ustensiles</p>
          </div>
          <span class="text-lg font-bold text-primary">14,99 €</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">Balance de cuisine digitale précise avec conversion d'unités.</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">37</span></span>
          </div>
          <div class="flex space-x-2">
            <button class="text-blue-600 hover:text-blue-800 p-1">
              <i class="fas fa-eye"></i>
            </button>
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
              <i class="fas fa-edit"></i>
            </button>
            <button class="text-red-600 hover:text-red-800 p-1">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Card 8 -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="https://images.unsplash.com/photo-1607301406259-dfb186e15de8" alt="Moules à Pâtisserie Set">
        <div class="badge-stock low-stock">Stock faible</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">Moules à Pâtisserie Set</h3>
            <p class="text-sm text-gray-500">Ustensiles</p>
          </div>
          <span class="text-lg font-bold text-primary">39,99 €</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">Set de 5 moules à pâtisserie en silicone de différentes formes.</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">5</span></span>
          </div>
          <div class="flex space-x-2">
            <button class="text-blue-600 hover:text-blue-800 p-1">
              <i class="fas fa-eye"></i>
            </button>
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
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
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produit</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <!-- Product 1 -->
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1556911220-bda9f7b24446" alt="Couteau de Chef Professionnel">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">Couteau de Chef Professionnel</div>
                  <div class="text-xs text-gray-500">Réf: KNF-001</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary/10 text-primary">
                Ustensiles
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">49,99 €</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              45
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                En stock
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <div class="flex space-x-2 justify-end">
                <button class="text-blue-600 hover:text-blue-800">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="text-yellow-600 hover:text-yellow-800 edit-product">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="text-red-600 hover:text-red-800">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Product 2 -->
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1585032226651-759b368d7246" alt="Robot Culinaire Multifonction">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">Robot Culinaire Multifonction</div>
                  <div class="text-xs text-gray-500">Réf: RBT-002</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-secondary/10 text-secondary">
                Électroménager
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">199,99 €</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              12
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                En stock
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <div class="flex space-x-2 justify-end">
                <button class="text-blue-600 hover:text-blue-800">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="text-yellow-600 hover:text-yellow-800 edit-product">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="text-red-600 hover:text-red-800">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>

          <!-- Product 3 -->
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  <img class="h-10 w-10 rounded-md object-cover" src="https://images.unsplash.com/photo-1589187151053-5ec8818e661b" alt="Livre de Recettes Méditerranéennes">
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">Livre de Recettes Méditerranéennes</div>
                  <div class="text-xs text-gray-500">Réf: BK-003</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-accent/10 text-accent">
                Livres de cuisine
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="text-sm text-gray-900">24,99 €</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              3
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                Stock faible
              </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <div class="flex space-x-2 justify-end">
                <button class="text-blue-600 hover:text-blue-800">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="text-yellow-600 hover:text-yellow-800 edit-product">
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
  </div>

  <!-- Pagination -->
  <div class="bg-white rounded-lg shadow-sm px-4 py-3 flex items-center justify-between">
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Affichage de <span class="font-medium">1</span> à <span class="font-medium">8</span> sur <span class="font-medium">156</span> résultats
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
            20
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

  <!-- Modale Ajouter/Modifier Produit -->
  <div id="add-product-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="product-modal-title">
                Ajouter un nouveau produit
              </h3>

              <div class="mt-2">
                <form id="product-form" class="space-y-4">
                  <div>
                    <label for="product-name" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                    <input type="text" id="product-name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="product-reference" class="block text-sm font-medium text-gray-700">Référence</label>
                    <input type="text" id="product-reference" name="reference" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="product-category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select id="product-category" name="category" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="ustensiles">Ustensiles</option>
                      <option value="electromenager">Électroménager</option>
                      <option value="livres">Livres de cuisine</option>
                      <option value="ingredients">Ingrédients</option>
                      <option value="accessoires">Accessoires</option>
                    </select>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label for="product-price" class="block text-sm font-medium text-gray-700">Prix (€)</label>
                      <input type="number" id="product-price" name="price" min="0" step="0.01" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>

                    <div>
                      <label for="product-stock" class="block text-sm font-medium text-gray-700">Stock</label>
                      <input type="number" id="product-stock" name="stock" min="0" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                  </div>

                  <div>
                    <label for="product-description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="product-description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                  </div>

                  <div>
                    <label for="product-image" class="block text-sm font-medium text-gray-700">Image</label>
                    <div class="mt-1 flex items-center">
                      <span class="inline-block h-12 w-12 rounded-md overflow-hidden bg-gray-100">
                        <img id="product-image-preview" src="/placeholder.svg?height=48&width=48" alt="Image" class="h-full w-full object-cover">
                      </span>
                      <button type="button" id="product-image-button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Changer
                      </button>
                      <input type="file" id="product-image" name="image" class="hidden" accept="image/*">
                    </div>
                  </div>

                  <div>
                    <label for="product-status" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="product-status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="published">Publié</option>
                      <option value="draft">Brouillon</option>
                      <option value="archived">Archivé</option>
                    </select>
                  </div>

                  <div class="flex items-center">
                    <input type="checkbox" id="product-featured" name="featured" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <label for="product-featured" class="ml-2 block text-sm text-gray-700">
                      Mettre en avant sur la page d'accueil
                    </label>
                  </div>

                  <div class="flex items-center">
                    <input type="checkbox" id="product-sale" name="sale" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <label for="product-sale" class="ml-2 block text-sm text-gray-700">
                      En promotion
                    </label>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="save-product-btn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
            <span id="product-save-button-text">Ajouter</span>
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
    const productModal = document.getElementById('add-product-modal');
    const productModalTitle = document.getElementById('product-modal-title');
    const productSaveButtonText = document.getElementById('product-save-button-text');
    const productForm = document.getElementById('product-form');

    // Image upload preview
    const productImageInput = document.getElementById('product-image');
    const productImageButton = document.getElementById('product-image-button');
    const productImagePreview = document.getElementById('product-image-preview');

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
    document.getElementById('add-product-btn').addEventListener('click', function() {
      productModalTitle.textContent = 'Ajouter un nouveau produit';
      productSaveButtonText.textContent = 'Ajouter';
      productForm.reset();
      productImagePreview.src = '/placeholder.svg?height=48&width=48';
      productModal.classList.remove('hidden');
    });

    // Edit product
    document.querySelectorAll('.edit-product').forEach(button => {
      button.addEventListener('click', function() {
        productModalTitle.textContent = 'Modifier le produit';
        productSaveButtonText.textContent = 'Enregistrer les modifications';

        // Ici, vous chargeriez les données du produit à modifier
        // Pour cet exemple, nous allons simplement remplir avec des données fictives
        document.getElementById('product-name').value = 'Couteau de Chef Professionnel';
        document.getElementById('product-reference').value = 'KNF-001';
        document.getElementById('product-category').value = 'ustensiles';
        document.getElementById('product-price').value = '49.99';
        document.getElementById('product-stock').value = '45';
        document.getElementById('product-description').value = 'Couteau de chef en acier inoxydable avec manche ergonomique.';
        document.getElementById('product-status').value = 'published';

        productModal.classList.remove('hidden');
      });
    });

    // Close modal
    document.querySelectorAll('.close-modal').forEach(button => {
      button.addEventListener('click', function() {
        productModal.classList.add('hidden');
      });
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
      if (event.target === productModal) {
        productModal.classList.add('hidden');
      }
    });

    // Image preview
    productImageButton.addEventListener('click', function() {
      productImageInput.click();
    });

    productImageInput.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          productImagePreview.src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
      }
    });

    // Save product
    document.getElementById('save-product-btn').addEventListener('click', function() {
      // Ici, vous ajouteriez le code pour envoyer les données au serveur
      alert('Produit enregistré avec succès !');
      productModal.classList.add('hidden');
    });
  </script>
@endsection
