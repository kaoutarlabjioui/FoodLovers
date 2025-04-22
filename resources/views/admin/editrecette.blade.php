@extends('admin.dashboard')
@section('title','Modifier une recette')
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

    /* Image preview */
    .image-preview {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 0.375rem;
      border: 1px solid #e5e7eb;
    }

    /* Ingredient row */
    .ingredient-row {
      display: flex;
      gap: 10px;
      margin-bottom: 10px;
      align-items: center;
    }

    .ingredient-row input, .ingredient-row select {
      flex: 1;
    }

    .ingredient-row button {
      flex-shrink: 0;
    }

    /* Step row */
    .step-row {
      display: flex;
      gap: 10px;
      margin-bottom: 15px;
      align-items: flex-start;
    }

    .step-number {
      background-color: #FF6B6B;
      color: white;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      flex-shrink: 0;
    }

    .step-row textarea {
      flex: 1;
    }

    .step-row button {
      flex-shrink: 0;
      margin-top: 3px;
    }

    /* Tag selector */
    .tag-selector {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 8px;
    }

    .tag-item {
      background-color: #f3f4f6;
      border-radius: 9999px;
      padding: 4px 12px;
      font-size: 0.875rem;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .tag-item.selected {
      background-color: #FF6B6B;
      color: white;
    }

    .tag-item:hover {
      cursor: pointer;
      background-color: #e5e7eb;
    }

    .tag-item.selected:hover {
      background-color: #ff5252;
    }
</style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
      <div>
        <h1 class="text-2xl font-bold">Modifier la Recette</h1>
        <p class="text-gray-600">Modifiez les informations de la recette</p>
      </div>
      <div class="mt-4 md:mt-0">
        <a href="/adminrecette" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm hover:bg-gray-300 transition-colors">
          <i class="fas fa-arrow-left mr-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    <!-- Recipe Form Card -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="p-6">
        <form id="edit-recipe-form" action="/admin/recette/update" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
          <input type="hidden" id="id" name="id" value="{{ $recette->id }}">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="recipe-title" class="block text-sm font-medium text-gray-700 mb-1">Titre de la recette</label>
              <input type="text" id="recipe-title" name="titre" value="{{ $recette->titre }}" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
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
          </div>

          <div>
            <label for="recipe-description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="recipe-description" name="description" rows="3" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">{{ $recette->description }}</textarea>
          </div>

          <div>
            <label for="recipe-description" class="block text-sm font-medium text-gray-700 mb-1">Instructions</label>
            <textarea id="recipe-description" name="instruction" rows="5" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">{{ $recette->instruction }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Image principale</label>
            <div class="flex items-start space-x-4">
              <div>
                <img id="image-preview" src="{{ url('/storage/'. $recette->photo) }}" alt="{{ $recette->titre }}" class="image-preview">
              </div>
              <div class="flex-1">
                  <label for="product-image" class="block text-sm font-medium text-gray-700 mb-1">Changer l'image</label>
                  <input type="file" id="product-image" name="photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-primary file:text-white hover:file:bg-primary/90">
                  <p class="mt-1 text-xs text-gray-500">PNG, JPG ou JPEG. Max 2MB.</p>
                </div>
            </div>
          </div>
          <div>
                <label class="block text-sm font-medium text-gray-700 mb-3">Ingrédients</label>
                   <div class="form-element">
                    <div class="relative">
                      <select id="recipe-ingredients" name="ingredients[]" multiple class="select2-ingredients w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                        @foreach($ingredients as $ingredient)
                          <option value="{{$ingredient->ingredient}}">{{$ingredient->ingredient}}</option>
                        @endforeach
                      </select>
                      <p class="text-xs text-gray-500 mt-1">Vous pouvez sélectionner plusieurs ingrédients</p>
                    </div>
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

          <div class="bg-gray-50 -mx-6 -mb-6 px-6 py-4 flex justify-between">
            <button type="button" onclick="window.location.href='/admin/adminrecette'" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm hover:bg-gray-300">
              Annuler
            </button>
            <input type="submit" name="submit" class="bg-primary text-white px-4 py-2 rounded-md text-sm hover:bg-primary/90 cursor-pointer" value="Enregistrer les modifications">
          </div>
        </form>
      </div>
    </div>
@endsection

@section('js')
<script>
  // Image preview
  document.getElementById('recipe-image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('image-preview').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  });

  // Add ingredient
  document.getElementById('add-ingredient').addEventListener('click', function() {
    const container = document.getElementById('ingredients-container');
    const ingredientRow = document.createElement('div');
    ingredientRow.className = 'ingredient-row';

    // Clone the first ingredient row to get all the options
    const firstRow = container.querySelector('.ingredient-row');
    if (firstRow) {
      const newRow = firstRow.cloneNode(true);

      // Reset values
      newRow.querySelector('input[name="ingredient_quantities[]"]').value = '';
      newRow.querySelector('select[name="ingredient_units[]"]').selectedIndex = 0;
      newRow.querySelector('select[name="ingredient_ids[]"]').selectedIndex = 0;

      container.appendChild(newRow);

      // Add event listener to remove button
      newRow.querySelector('.remove-ingredient').addEventListener('click', function() {
        newRow.remove();
      });
    }
  });

  // Remove ingredient
  document.querySelectorAll('.remove-ingredient').forEach(button => {
    button.addEventListener('click', function() {
      const ingredientRow = this.parentElement;
      ingredientRow.remove();
    });
  });

  // Add step
  document.getElementById('add-step').addEventListener('click', function() {
    const container = document.getElementById('steps-container');
    const stepRow = document.createElement('div');
    stepRow.className = 'step-row';

    // Get the current number of steps
    const stepCount = container.querySelectorAll('.step-row').length + 1;

    stepRow.innerHTML = `
      <div class="step-number">${stepCount}</div>
      <textarea name="steps[]" rows="2" placeholder="Décrivez cette étape..." class="block border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"></textarea>
      <button type="button" class="remove-step bg-red-500 text-white px-3 py-2 rounded-md text-sm hover:bg-red-600">
        <i class="fas fa-trash"></i>
      </button>
    `;

    container.appendChild(stepRow);

    // Add event listener to remove button
    stepRow.querySelector('.remove-step').addEventListener('click', function() {
      stepRow.remove();
      // Update step numbers
      updateStepNumbers();
    });
  });

  // Remove step
  document.querySelectorAll('.remove-step').forEach(button => {
    button.addEventListener('click', function() {
      const stepRow = this.parentElement;
      stepRow.remove();
      // Update step numbers
      updateStepNumbers();
    });
  });

  // Update step numbers
  function updateStepNumbers() {
    const stepRows = document.querySelectorAll('#steps-container .step-row');
    stepRows.forEach((row, index) => {
      row.querySelector('.step-number').textContent = index + 1;
    });
  }

  // Tag selector
  document.querySelectorAll('.tag-item').forEach(tag => {
    tag.addEventListener('click', function() {
      this.classList.toggle('selected');
      const checkbox = this.querySelector('input[type="checkbox"]');
      checkbox.checked = !checkbox.checked;
    });
  });
</script>
@endsection
