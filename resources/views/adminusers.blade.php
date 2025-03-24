@extends('dashboard')
@section('title','Gestion des utilisateurs')
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
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
      <div>
        <h1 class="text-2xl font-bold">Gestion des Utilisateurs</h1>
        <p class="text-gray-600">Gérez tous les utilisateurs de la plateforme</p>
      </div>
      <div class="mt-4 md:mt-0">
        <button id="add-user-btn" class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
          <i class="fas fa-plus mr-2"></i>
          Ajouter un utilisateur
        </button>
      </div>
    </div>

    <!-- Stats Cards -->
    <!-- <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
      <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-primary/10 text-primary">
            <i class="fas fa-users text-xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-gray-500 text-sm">Total Utilisateurs</p>
            <h3 class="font-bold text-xl">1,248</h3>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-green-100 text-green-600">
            <i class="fas fa-user-check text-xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-gray-500 text-sm">Actifs</p>
            <h3 class="font-bold text-xl">1,156</h3>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-blue-100 text-blue-600">
            <i class="fas fa-user-plus text-xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-gray-500 text-sm">Nouveaux ce mois</p>
            <h3 class="font-bold text-xl">48</h3>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-red-100 text-red-600">
            <i class="fas fa-user-slash text-xl"></i>
          </div>
          <div class="ml-4">
            <p class="text-gray-500 text-sm">Suspendus</p>
            <h3 class="font-bold text-xl">12</h3>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <h2 class="text-lg font-bold mb-4 md:mb-0">Filtres</h2>
        <div class="flex flex-col md:flex-row gap-4">
          <div>
            <select class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
              <option value="">Tous les rôles</option>
              <option value="user">Utilisateur</option>
              <option value="contributor">Contributeur</option>
              <option value="moderator">Modérateur</option>
              <option value="admin">Administrateur</option>
            </select>
          </div>
          <div>
            <select class="w-full md:w-auto px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
              <option value="">Tous les statuts</option>
              <option value="active">Actif</option>
              <option value="pending">En attente</option>
              <option value="suspended">Suspendu</option>
              <option value="banned">Banni</option>
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

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôle</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'inscription</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <!-- User 1 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Marie Dupont">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Marie Dupont</div>
                    <div class="text-sm text-gray-500">@mariedupont</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">marie.dupont@example.com</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">Contributeur</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Actif
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                15/03/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-user">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- User 2 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e" alt="Thomas Martin">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Thomas Martin</div>
                    <div class="text-sm text-gray-500">@thomasmartin</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">thomas.martin@example.com</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">Utilisateur</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Actif
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                22/05/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-user">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- User 3 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1580489944761-15a19d654956" alt="Sophie Leroy">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Sophie Leroy</div>
                    <div class="text-sm text-gray-500">@sophieleroy</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">sophie.leroy@example.com</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">Modérateur</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Actif
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                10/01/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-user">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- User 4 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Lucas Bernard">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Lucas Bernard</div>
                    <div class="text-sm text-gray-500">@lucasbernard</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">lucas.bernard@example.com</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">Utilisateur</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                  En attente
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                05/06/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-user">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>

            <!-- User 5 -->
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="h-10 w-10 flex-shrink-0">
                    <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80" alt="Julie Petit">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">Julie Petit</div>
                    <div class="text-sm text-gray-500">@juliepetit</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">julie.petit@example.com</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">Utilisateur</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                  Suspendu
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                18/04/2023
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex space-x-2 justify-end">
                  <button class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-eye"></i>
                  </button>
                  <button class="text-yellow-600 hover:text-yellow-800 edit-user">
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

      <!-- Pagination -->
      <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
          <div>
            <p class="text-sm text-gray-700">
              Affichage de <span class="font-medium">1</span> à <span class="font-medium">5</span> sur <span class="font-medium">1,248</span> résultats
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
                125
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

  <!-- Modale Ajouter/Modifier Utilisateur -->
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
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="user-modal-title">
                Ajouter un nouvel utilisateur
              </h3>

              <div class="mt-2">
                <form id="user-form" class="space-y-4">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label for="user-firstname" class="block text-sm font-medium text-gray-700">Prénom</label>
                      <input type="text" id="user-firstname" name="firstname" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>

                    <div>
                      <label for="user-lastname" class="block text-sm font-medium text-gray-700">Nom</label>
                      <input type="text" id="user-lastname" name="lastname" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                  </div>

                  <div>
                    <label for="user-email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="user-email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="user-username" class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
                    <input type="text" id="user-username" name="username" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div id="password-container">
                    <label for="user-password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="user-password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>

                  <div>
                    <label for="user-role" class="block text-sm font-medium text-gray-700">Rôle</label>
                    <select id="user-role" name="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="user">Utilisateur</option>
                      <option value="contributor">Contributeur</option>
                      <option value="moderator">Modérateur</option>
                      <option value="admin">Administrateur</option>
                    </select>
                  </div>

                  <div>
                    <label for="user-status" class="block text-sm font-medium text-gray-700">Statut</label>
                    <select id="user-status" name="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="active">Actif</option>
                      <option value="pending">En attente</option>
                      <option value="suspended">Suspendu</option>
                      <option value="banned">Banni</option>
                    </select>
                  </div>

                  <div>
                    <label for="user-avatar" class="block text-sm font-medium text-gray-700">Avatar</label>
                    <div class="mt-1 flex items-center">
                      <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                        <img id="user-avatar-preview" src="/placeholder.svg?height=48&width=48" alt="Avatar" class="h-full w-full object-cover">
                      </span>
                      <button type="button" id="user-avatar-button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Changer
                      </button>
                      <input type="file" id="user-avatar" name="avatar" class="hidden" accept="image/*">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="save-user-btn" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
            <span id="user-save-button-text">Ajouter</span>
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
    const userModal = document.getElementById('add-user-modal');
    const userModalTitle = document.getElementById('user-modal-title');
    const userSaveButtonText = document.getElementById('user-save-button-text');
    const userForm = document.getElementById('user-form');
    const passwordContainer = document.getElementById('password-container');

    // Image upload preview
    const userAvatarInput = document.getElementById('user-avatar');
    const userAvatarButton = document.getElementById('user-avatar-button');
    const userAvatarPreview = document.getElementById('user-avatar-preview');

    // Open modal
    document.getElementById('add-user-btn').addEventListener('click', function() {
      userModalTitle.textContent = 'Ajouter un nouvel utilisateur';
      userSaveButtonText.textContent = 'Ajouter';
      userForm.reset();
      userAvatarPreview.src = '/placeholder.svg?height=48&width=48';
      passwordContainer.style.display = 'block';
      userModal.classList.remove('hidden');
    });

    // Edit user
    document.querySelectorAll('.edit-user').forEach(button => {
      button.addEventListener('click', function() {
        userModalTitle.textContent = 'Modifier l\'utilisateur';
        userSaveButtonText.textContent = 'Enregistrer les modifications';
        passwordContainer.style.display = 'none';

        // Ici, vous chargeriez les données de l'utilisateur à modifier
        // Pour cet exemple, nous allons simplement remplir avec des données fictives
        document.getElementById('user-firstname').value = 'Marie';
        document.getElementById('user-lastname').value = 'Dupont';
        document.getElementById('user-email').value = 'marie.dupont@example.com';
        document.getElementById('user-username').value = 'mariedupont';
        document.getElementById('user-role').value = 'contributor';
        document.getElementById('user-status').value = 'active';

        userModal.classList.remove('hidden');
      });
    });

    // Close modal
    document.querySelectorAll('.close-modal').forEach(button => {
      button.addEventListener('click', function() {
        userModal.classList.add('hidden');
      });
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
      if (event.target === userModal) {
        userModal.classList.add('hidden');
      }
    });

    // Avatar preview
    userAvatarButton.addEventListener('click', function() {
      userAvatarInput.click();
    });

    userAvatarInput.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          userAvatarPreview.src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
      }
    });

    // Save user
    document.getElementById('save-user-btn').addEventListener('click', function() {
      // Ici, vous ajouteriez le code pour envoyer les données au serveur
      alert('Utilisateur enregistré avec succès !');
      userModal.classList.add('hidden');
    });
  </script>
@endsection
