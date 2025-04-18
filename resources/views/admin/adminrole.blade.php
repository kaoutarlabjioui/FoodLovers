@extends('admin.dashboard')
@section('title','Gestion des rôles')
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
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
      <div>
        <h1 class="text-2xl font-bold">Gestion des Rôles</h1>
        <p class="text-gray-600">Gérez tous les rôles utilisateurs de la plateforme</p>
      </div>
      <div class="mt-4 md:mt-0">
        <button id="add-role-btn" class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
          <i class="fas fa-plus mr-2"></i>
          Ajouter un rôle
        </button>
      </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <h2 class="text-lg font-bold mb-4 md:mb-0">Filtres</h2>
        <div class="flex flex-col md:flex-row gap-4">
          <div>
            <select class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
              <option value="">Tous les statuts</option>
              <option value="active">Actif</option>
              <option value="inactive">Inactif</option>
            </select>
          </div>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
              <i class="fas fa-search text-gray-400"></i>
            </span>
            <input type="text" placeholder="Rechercher..." class="w-full md:w-auto pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
          </div>
        </div>
      </div>
    </div>

    <!-- Roles Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du rôle</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateurs</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <!-- Role 1 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-8 w-8 flex-shrink-0 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                    <i class="fas fa-user-shield"></i>
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Administrateur</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900 max-w-xs truncate">Accès complet à toutes les fonctionnalités du site</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">3</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex flex-wrap gap-1">
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Tout</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Actif
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                01/01/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-role" data-id="1">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800 delete-role" data-id="1">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- Role 2 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-8 w-8 flex-shrink-0 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                    <i class="fas fa-user-cog"></i>
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Modérateur</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900 max-w-xs truncate">Gestion des contenus et modération des commentaires</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">5</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex flex-wrap gap-1">
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Recettes</span>
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Commentaires</span>
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Blog</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Actif
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                15/01/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-role" data-id="2">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800 delete-role" data-id="2">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- Role 3 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-8 w-8 flex-shrink-0 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                    <i class="fas fa-user-edit"></i>
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Éditeur</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900 max-w-xs truncate">Création et édition de contenu sur le blog</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">8</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex flex-wrap gap-1">
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Blog</span>
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Recettes</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Actif
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                22/01/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-role" data-id="3">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800 delete-role" data-id="3">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- Role 4 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-8 w-8 flex-shrink-0 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Utilisateur</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900 max-w-xs truncate">Accès standard aux fonctionnalités du site</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">1254</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex flex-wrap gap-1">
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Commentaires</span>
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Profil</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Actif
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                01/02/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-role" data-id="4">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800 delete-role" data-id="4">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- Role 5 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-8 w-8 flex-shrink-0 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                    <i class="fas fa-user-tag"></i>
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Chef Premium</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-sm text-gray-900 max-w-xs truncate">Accès aux fonctionnalités premium pour les chefs professionnels</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">42</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex flex-wrap gap-1">
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Recettes Pro</span>
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Compétitions</span>
                  <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Formations</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                  Inactif
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                15/02/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-role" data-id="5">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800 delete-role" data-id="5">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
          <div>
            <p class="text-sm text-gray-700">
              Affichage de <span class="font-medium">1</span> à <span class="font-medium">5</span> sur <span class="font-medium">5</span> rôles
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
              <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Suivant</span>
                <i class="fas fa-chevron-right text-xs"></i>
              </a>
            </nav>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('modal')
  <!-- Modales -->

  <!-- Modale Ajouter/Modifier Rôle -->
  <div id="role-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="role-modal-title">
                Ajouter un nouveau rôle
              </h3>

              <div class="mt-2">
                <form id="role-form" class="space-y-4">
                  <input type="hidden" id="role-id" name="id">
                  <div>
                    <label for="role-name" class="block text-sm font-medium text-gray-700">Nom du rôle</label>
                    <input type="text" id="role-name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="role-description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="role-description" name="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                  </div>

                  <div>
                    <label for="role-icon" class="block text-sm font-medium text-gray-700">Icône</label>
                    <div class="mt-1 flex items-center">
                      <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <i id="selected-role-icon" class="fas fa-user-shield"></i>
                      </div>
                      <div class="ml-5 grid grid-cols-6 gap-2">
                        <button type="button" class="role-icon-option h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary/10 hover:text-primary" data-icon="fa-user-shield">
                          <i class="fas fa-user-shield"></i>
                        </button>
                        <button type="button" class="role-icon-option h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary/10 hover:text-primary" data-icon="fa-user-cog">
                          <i class="fas fa-user-cog"></i>
                        </button>
                        <button type="button" class="role-icon-option h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary/10 hover:text-primary" data-icon="fa-user-edit">
                          <i class="fas fa-user-edit"></i>
                        </button>
                        <button type="button" class="role-icon-option h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary/10 hover:text-primary" data-icon="fa-user">
                          <i class="fas fa-user"></i>
                        </button>
                        <button type="button" class="role-icon-option h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary/10 hover:text-primary" data-icon="fa-user-tag">
                          <i class="fas fa-user-tag"></i>
                        </button>
                        <button type="button" class="role-icon-option h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary/10 hover:text-primary" data-icon="fa-user-tie">
                          <i class="fas fa-user-tie"></i>
                        </button>
                      </div>
                      <input type="hidden" id="role-icon-input" name="icon" value="fa-user-shield">
                    </div>
                  </div>

                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
                    <div class="space-y-2 max-h-48 overflow-y-auto border border-gray-200 rounded-md p-3">
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-dashboard" name="permissions[]" value="dashboard" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-dashboard" class="ml-2 block text-sm text-gray-700">
                          Tableau de bord
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-users" name="permissions[]" value="users" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-users" class="ml-2 block text-sm text-gray-700">
                          Gestion des utilisateurs
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-recipes" name="permissions[]" value="recipes" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-recipes" class="ml-2 block text-sm text-gray-700">
                          Gestion des recettes
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-competitions" name="permissions[]" value="competitions" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-competitions" class="ml-2 block text-sm text-gray-700">
                          Gestion des compétitions
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-products" name="permissions[]" value="products" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-products" class="ml-2 block text-sm text-gray-700">
                          Gestion des produits
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-categories" name="permissions[]" value="categories" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-categories" class="ml-2 block text-sm text-gray-700">
                          Gestion des catégories
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-roles" name="permissions[]" value="roles" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-roles" class="ml-2 block text-sm text-gray-700">
                          Gestion des rôles
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-blog" name="permissions[]" value="blog" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-blog" class="ml-2 block text-sm text-gray-700">
                          Gestion du blog
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-comments" name="permissions[]" value="comments" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-comments" class="ml-2 block text-sm text-gray-700">
                          Gestion des commentaires
                        </label>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="perm-settings" name="permissions[]" value="settings" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="perm-settings" class="ml-2 block text-sm text-gray-700">
                          Paramètres du site
                        </label>
                      </div>
                    </div>
                  </div>

                  <div>
                    <label for="role-status" class="block text-sm font-medium text-gray-700">Statut</label>
                    <div class="mt-1 flex items-center">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="role-status" checked>
                        <label class="form-check-label ml-2" for="role-status">Actif</label>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="save-role-btn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
            <span id="role-save-button-text">Ajouter</span>
          </button>
          <button type="button" class="close-modal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Annuler
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modale Confirmation Suppression -->
  <div id="delete-role-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
              <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Supprimer le rôle
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">
                  Êtes-vous sûr de vouloir supprimer ce rôle ? Cette action est irréversible et pourrait affecter les utilisateurs associés à ce rôle.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="confirm-delete-role-btn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Supprimer
          </button>
          <button type="button" class="close-delete-modal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
    document.addEventListener('DOMContentLoaded', function() {
      // Modal handling
      const roleModal = document.getElementById('role-modal');
      const roleModalTitle = document.getElementById('role-modal-title');
      const roleSaveButtonText = document.getElementById('role-save-button-text');
      const roleForm = document.getElementById('role-form');
      const deleteRoleModal = document.getElementById('delete-role-modal');
      const confirmDeleteRoleBtn = document.getElementById('confirm-delete-role-btn');
      let currentRoleId = null;

      // Icon selection
      const roleIconOptions = document.querySelectorAll('.role-icon-option');
      const selectedRoleIcon = document.getElementById('selected-role-icon');
      const roleIconInput = document.getElementById('role-icon-input');

      // Open add modal
      document.getElementById('add-role-btn').addEventListener('click', function() {
        roleModalTitle.textContent = 'Ajouter un nouveau rôle';
        roleSaveButtonText.textContent = 'Ajouter';
        roleForm.reset();
        selectedRoleIcon.className = 'fas fa-user-shield';
        roleIconInput.value = 'fa-user-shield';
        document.getElementById('role-id').value = '';
        roleModal.classList.remove('hidden');
      });

      // Edit role
      document.querySelectorAll('.edit-role').forEach(button => {
        button.addEventListener('click', function() {
          const roleId = this.getAttribute('data-id');
          roleModalTitle.textContent = 'Modifier le rôle';
          roleSaveButtonText.textContent = 'Enregistrer les modifications';
          document.getElementById('role-id').value = roleId;

          // Ici, vous chargeriez les données du rôle à modifier
          // Pour cet exemple, nous allons simplement remplir avec des données fictives
          if (roleId === '1') {
            document.getElementById('role-name').value = 'Administrateur';
            document.getElementById('role-description').value = 'Accès complet à toutes les fonctionnalités du site';
            document.getElementById('role-icon-input').value = 'fa-user-shield';
            selectedRoleIcon.className = 'fas fa-user-shield';
            document.getElementById('role-status').checked = true;

            // Check all permissions
            document.querySelectorAll('#role-form input[name="permissions[]"]').forEach(checkbox => {
              checkbox.checked = true;
            });
          } else if (roleId === '2') {
            document.getElementById('role-name').value = 'Modérateur';
            document.getElementById('role-description').value = 'Gestion des contenus et modération des commentaires';
            document.getElementById('role-icon-input').value = 'fa-user-cog';
            selectedRoleIcon.className = 'fas fa-user-cog';
            document.getElementById('role-status').checked = true;

            // Check specific permissions
            document.getElementById('perm-recipes').checked = true;
            document.getElementById('perm-comments').checked = true;
            document.getElementById('perm-blog').checked = true;
          }

          roleModal.classList.remove('hidden');
        });
      });

      // Delete role
      document.querySelectorAll('.delete-role').forEach(button => {
        button.addEventListener('click', function() {
          currentRoleId = this.getAttribute('data-id');
          deleteRoleModal.classList.remove('hidden');
        });
      });

      // Close modals
      document.querySelectorAll('.close-modal').forEach(button => {
        button.addEventListener('click', function() {
          roleModal.classList.add('hidden');
        });
      });

      document.querySelectorAll('.close-delete-modal').forEach(button => {
        button.addEventListener('click', function() {
          deleteRoleModal.classList.add('hidden');
        });
      });

      // Close modals when clicking outside
      window.addEventListener('click', function(event) {
        if (event.target === roleModal) {
          roleModal.classList.add('hidden');
        }
        if (event.target === deleteRoleModal) {
          deleteRoleModal.classList.add('hidden');
        }
      });

      // Icon selection
      if (roleIconOptions.length > 0 && selectedRoleIcon && roleIconInput) {
        roleIconOptions.forEach(option => {
          option.addEventListener('click', function() {
            const icon = this.getAttribute('data-icon');
            selectedRoleIcon.className = 'fas ' + icon;
            roleIconInput.value = icon;
          });
        });
      }

      // Save role
      document.getElementById('save-role-btn').addEventListener('click', function() {
        // Ici, vous ajouteriez le code pour envoyer les données au serveur
        alert('Rôle enregistré avec succès !');
        roleModal.classList.add('hidden');
      });

      // Confirm delete
      confirmDeleteRoleBtn.addEventListener('click', function() {
        // Ici, vous ajouteriez le code pour envoyer la demande de suppression au serveur
        alert('Rôle supprimé avec succès !');
        deleteRoleModal.classList.add('hidden');
      });
    });
  </script>
@endsection
