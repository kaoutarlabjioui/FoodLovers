@extends('admin.layout')
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
              <button id="openRecipeModal" class="bg-primary text-white px-3 py-1 rounded text-sm hover:bg-primary/90 transition-colors">
                <i class="fas fa-plus mr-1"></i> Ajouter
              </button>
            </div>
          </div>

          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recette</th>
                  <!-- <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Auteur</th> -->
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                  <!-- <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                  <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> -->
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach($recettes as $recette)
                <tr>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="h-10 w-10 flex-shrink-0">
                        <img class="h-10 w-10 rounded-md object-cover" src="{{url('/storage/' . $recette->photo)}}" >
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">{{$recette->titre}}</div>
                      </div>
                    </div>
                  </td>
                  <!-- <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-900">Emma Wilson</div>
                  </td> -->
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary/10 text-primary">
                      {{$recette->category->title}}
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    {{$recette->created_at}}
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      Publiée
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2 justify-end">
                           <a href="/admin/editrecette/{{$recette->id}}">
                                <button class="text-yellow-600 hover:text-yellow-800 edit-ingredient" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>

                            <form action="{{ route('adminrecette.destroy') }}" method="POST" class="text-red-600 hover:text-red-800 delete-category">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $recette->id }}">
                                <button type="submit" class="flex items-center gap-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
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
  <div id="addRecipeModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        <strong>Succès !</strong> {{ session('success') }}
    </div>
@endif
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
              Ajouter une nouvelle recette
            </h3>

            @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <strong>Oups !</strong> Problèmes lors de la soumission :
        <ul class="mt-2 list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById('addRecipeModal');
            if (modal) {
                modal.classList.remove('hidden');
            }
        });
    </script>
@endif




            <div class="mt-2">
              <form action="/admin/recette/store" method="POST" enctype="multipart/form-data" class="w-full space-y-4">
                @csrf

                <div class="form-element">
                  <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                  <input type="text" name="titre" required placeholder="Titre de la recette"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                </div>

                <div class="form-element">
                  <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                  <textarea name="description" rows="3" required placeholder="Description"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                </div>

                <!-- Multiselect pour les ingrédients -->
                <div class="form-element">
                    <label for="recipe-ingredients" class="block text-sm font-medium text-gray-700 mb-1">Ingrédients</label>
                    <div class="relative">
                      <select id="recipe-ingredients" name="ingredients[]" multiple class="select2-ingredients w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        @foreach($ingredients as $ingredient)
                          <option value="{{$ingredient->ingredient}}">{{$ingredient->ingredient}}</option>
                        @endforeach
                      </select>
                      <p class="text-xs text-gray-500 mt-1">Vous pouvez sélectionner plusieurs ingrédients</p>
                    </div>
                  </div>

                <div class="form-element">
                  <label for="instruction" class="block text-sm font-medium text-gray-700 mb-1">Instruction</label>
                  <textarea name="instruction" rows="6" required placeholder="Instructions"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary"></textarea>
                </div>

                <div class="form-element">
                  <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                  <input type="file" name="photo"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                </div>

                <div>
                    <label for="recipe-status" class="block text-sm font-medium text-gray-700">Categorie</label>
                    <select id="recipe-status" name="category_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    <option value="" disabled selected>Sélectionner une catégorie</option>
                    @foreach($categories as $category)
                      <option value="{{$category->title}}">{{$category->title}}</option>
                    @endforeach
                    </select>
                  </div>

                  <!-- Multiselect pour les tags -->
                  <div class="form-element">
                    <label for="recipe-tags" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                    <div class="relative">
                      <select id="recipe-tags" name="tags[]" multiple class="select2-tags w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        @foreach($tags as $tag)
                          <option value="{{$tag->nom}}">{{$tag->nom}}</option>
                        @endforeach
                      </select>
                      <p class="text-xs text-gray-500 mt-1">Vous pouvez sélectionner plusieurs tags</p>
                    </div>
                  </div>

                <div class="flex justify-end space-x-2 pt-4 border-t border-gray-100 mt-6">
                  <button type="button" id="closeRecipeModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-600">
                    Annuler
                  </button>
                  <input type="submit" value="Ajouter"
                    class="bg-primary text-white px-4 py-2 rounded-md text-sm hover:bg-primary/90 cursor-pointer" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
  <!-- JavaScript -->
  <script>

  document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.getElementById('openRecipeModal');
    const modal = document.getElementById('addRecipeModal');
    const closeBtn = document.getElementById('closeRecipeModal');

    if (openBtn && modal && closeBtn) {
      openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
      closeBtn.addEventListener('click', () => modal.classList.add('hidden'));
    }
  });

  // Initialiser Select2 pour les tags et ingrédients
  $(document).ready(function() {
      $('.select2-tags').select2({
        placeholder: 'Sélectionnez des tags',
        allowClear: true,
        tags: true,
        tokenSeparators: [',', ' '],
        dropdownParent: $('#addRecipeModal')
      });

      $('.select2-ingredients').select2({
        placeholder: 'Sélectionnez des ingrédients',
        allowClear: true,
        tags: true,
        tokenSeparators: [',', ' '],
        dropdownParent: $('#addRecipeModal')
      });
    });




  </script>
@endsection






