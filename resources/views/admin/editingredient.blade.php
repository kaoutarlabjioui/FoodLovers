@extends('admin.dashboard')
@section('title','Modifier un ingredient')
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
  </style>
@endsection('css')

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
      <div>
        <h1 class="text-2xl font-bold">Modifier l'Ingredient</h1>
        <p class="text-gray-600">Modifiez les informations d'ingredient</p>
      </div>

    </div>

    <!-- Category Form Card -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="p-6">
        <form id="edit-tag-form" action="/admin/ingredient/update"  method="POST"   class="space-y-6">
            @csrf
          <input type="hidden" id="id" name="id" value="{{ $ingredient->id }}">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="tag-name"  class="block text-sm font-medium text-gray-700 mb-1">Nom d'ingredient</label>
              <input type="text" id="tag-name" name="ingredient" value="{{$ingredient->ingredient}}" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
            </div>


          </div>

          <div>
            <label for="tag-description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <input id="tag-description" name="etat" value="{{$ingredient->etat}}" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
          </div>



          <div class="flex items-center">
            <label for="tag-status" class="block text-sm font-medium text-gray-700 mr-3">Statut</label>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="tag-status" name="status" checked>
              <label class="form-check-label ml-2" for="tag-status">Actif</label>
            </div>
          </div>

          <div class="bg-gray-50 -mx-6 -mb-6 px-6 py-4 flex justify-end space-x-3">

          <input type="submit" name="submit" class="bg-primary text-white px-4 py-2 rounded-md text-sm hover:bg-primary/90 cursor-pointer" value="Enregistrer les modifications">
          </div>
        </form>
      </div>
    </div>












@endsection




