@extends('admin.dashboard')
@section('title','Modifier un produit')
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

    /* Gallery preview */
    .gallery-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 10px;
    }

    .gallery-item {
      position: relative;
      width: 100px;
      height: 100px;
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 0.375rem;
      border: 1px solid #e5e7eb;
    }

    .gallery-item .remove-image {
      position: absolute;
      top: -8px;
      right: -8px;
      background: #FF6B6B;
      color: white;
      border-radius: 50%;
      width: 22px;
      height: 22px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      cursor: pointer;
    }

    /* Feature fields */
    .feature-row {
      display: flex;
      gap: 10px;
      margin-bottom: 10px;
    }

    .feature-row input {
      flex: 1;
    }

    .feature-row button {
      flex-shrink: 0;
    }
</style>
@endsection

@section('content')
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
      <div>
        <h1 class="text-2xl font-bold">Modifier le Produit</h1>
        <p class="text-gray-600">Modifiez les informations du produit</p>
      </div>
      <div class="mt-4 md:mt-0">
        <a href="/admin/adminproduit" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm hover:bg-gray-300 transition-colors">
          <i class="fas fa-arrow-left mr-2"></i> Retour à la liste
        </a>
      </div>
    </div>

    <!-- Product Form Card -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
      <div class="p-6">
        <form id="edit-product-form" action="/admin/produit/update" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
          <input type="hidden" id="id" name="id" value="{{ $produit->id }}">

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="product-name" class="block text-sm font-medium text-gray-700 mb-1">Nom du produit</label>
              <input type="text" id="product-name" name="nom" value="{{ $produit->nom }}" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
            </div>

          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
              <label for="product-price" class="block text-sm font-medium text-gray-700 mb-1">Prix (Dh)</label>
              <input type="number" id="product-price" name="prix" value="{{ $produit->prix }}" step="0.01" min="0" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
            </div>

            <div>
              <label for="product-stock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
              <input type="number" id="product-stock" name="stock" value="{{ $produit->stock }}" min="0" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
            </div>

          </div>

          <div>
            <label for="product-description" class="block text-sm font-medium text-gray-700 mb-1">Description courte</label>
            <textarea id="product-description" name="description" rows="3" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">{{ $produit->description }}</textarea>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Image principale</label>
              <div class="flex items-start space-x-4">
                <div>
                  <img id="image-preview" src="{{ url('/storage/'. $produit->photo) }}" alt="{{ $produit->nom }}" class="image-preview">
                </div>
                <div class="flex-1">
                  <label for="product-image" class="block text-sm font-medium text-gray-700 mb-1">Changer l'image</label>
                  <input type="file" id="product-image" name="photo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-primary file:text-white hover:file:bg-primary/90">
                  <p class="mt-1 text-xs text-gray-500">PNG, JPG ou JPEG. Max 2MB.</p>
                </div>
              </div>
            </div>

          </div>

          <div class="bg-gray-50 -mx-6 -mb-6 px-6 py-4 flex justify-between">
            <button type="button" onclick="window.location.href='/admin/adminproduits'" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm hover:bg-gray-300">
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
  document.getElementById('product-image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('image-preview').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  });

  // Remove existing gallery image
  document.querySelectorAll('.remove-image').forEach(button => {
    button.addEventListener('click', function() {
      const galleryItem = this.parentElement;
      galleryItem.remove();
    });
  });





</script>
@endsection
