@extends('client.layouts')

@section('title', 'Mes Recettes')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold">Mes recettes</h2>
    <button id="addRecipeBtn" class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors flex items-center">
      <i class="fas fa-plus mr-2"></i> Ajouter une recette
    </button>
  </div>

  <!-- Recipes Table -->
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Recette
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Catégorie
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Date de création
          </th>
          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            Actions
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach($recettes as $recette)
        <!-- Recipe Row -->
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-md object-cover" src="{{url('/storage/' . $recette->photo )}}" alt="{{$recette->titre}}">
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">{{$recette->titre}}</div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              {{$recette->category->title ?? 'sans categorie'}}
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{$recette->created_at}}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <div class="flex space-x-2">
              <a href="/recipes/{{$recette->id}}" class="text-accent hover:text-accent/80" title="Voir">
                <i class="fas fa-eye"></i>
              </a>
              <a href="/recipes/{{$recette->id}}/edit" class="text-primary hover:text-primary/80" title="Modifier">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('clientrecette.destroy') }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette recette?')">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $recette->id }}">
                <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-6 flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Affichage de
        <span class="font-medium">{{ $recettes->firstItem() }}</span> à
        <span class="font-medium">{{ $recettes->lastItem() }}</span> sur
        <span class="font-medium">{{ $recettes->total() }}</span> recettes
      </p>
    </div>

    <div>
      {{ $recettes->links() }}
    </div>
  </div>
</div>
@endsection

@section('modals')
<!-- Add Recipe Modal -->
<div id="addRecipeModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
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
            @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
        <strong>Oups !</strong> Problèmes lors de la soumission :
        <ul class="mt-2 list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        <strong>Succès !</strong> {{ session('success') }}
    </div>
@endif

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
              <form action="/client/clientrecettestor" method="POST" enctype="multipart/form-data" class="w-full space-y-4">
                @csrf
                <div class="form-element">
                  <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre de la recette</label>
                  <input type="text" name="titre" required placeholder="Ex: Tarte aux pommes maison"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                </div>

                <div class="form-element">
                  <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                  <textarea name="description" required placeholder="Une courte description de votre recette"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" rows="3"></textarea>
                </div>

                <div class="form-element">
                  <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Instruction</label>
                  <textarea name="instruction" required placeholder="Une courte description de votre recette"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" rows="3"></textarea>
                </div>
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

                <div class="grid grid-cols-2 gap-4">
                  <div class="form-element">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                    <select name="category_name" required
                      class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                      <option value="">Sélectionner une catégorie</option>
                      @foreach($categories as $category)
                        <option value="{{$category->title}}">{{ $category->title }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

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

                <div class="form-element">
                  <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Photo de la recette</label>
                  <input type="file" name="photo" required accept="image/*"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                </div>

                <div class="flex justify-end space-x-2 pt-4 border-t border-gray-100 mt-6">
                  <button type="button" id="closeRecipeModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-600">
                    Annuler
                  </button>
                  <button type="submit"
                    class="bg-primary text-white px-4 py-2 rounded-md text-sm hover:bg-primary/90 cursor-pointer">
                    Créer la recette
                  </button>
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
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const addRecipeBtn = document.getElementById('addRecipeBtn');
    const addRecipeModal = document.getElementById('addRecipeModal');
    const closeRecipeModal = document.getElementById('closeRecipeModal');

    if (addRecipeBtn && addRecipeModal && closeRecipeModal) {
      addRecipeBtn.addEventListener('click', function() {
        addRecipeModal.classList.remove('hidden');
      });

      closeRecipeModal.addEventListener('click', function() {
        addRecipeModal.classList.add('hidden');
      });
    }
  });
</script>
@endsection
