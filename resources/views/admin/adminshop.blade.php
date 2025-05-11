@extends('admin.dashboard')
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
      <button id="openRecipeModal" class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
        <i class="fas fa-plus mr-2"></i>
        Ajouter un produit
      </button>
    </div>
  </div>


  <!-- Grid View (Default) -->

  <div id="grid-view" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-6">
    <!-- Product Card 1 -->
    @foreach($produits as $produit)
    <div class="bg-white rounded-lg shadow-sm overflow-hidden product-card">
      <div class="relative">
        <img class="w-full h-48 object-cover" src="{{url('/storage/'. $produit->photo)}}" alt="{{$produit->nom}}">
        <div class="badge-stock in-stock">En stock</div>
      </div>
      <div class="p-4">
        <div class="flex justify-between items-start">
          <div>
            <h3 class="text-lg font-bold">{{$produit->nom}}</h3>
            <p class="text-sm text-gray-500">Ustensiles</p>
          </div>
          <span class="text-lg font-bold text-primary">{{$produit->prix}}Dh</span>
        </div>
        <div class="mt-3">
          <p class="text-sm text-gray-600">{{$produit->description}}</p>
        </div>
        <div class="mt-4 flex justify-between items-center">
          <div>
            <span class="text-sm text-gray-500">Stock: <span class="font-semibold">{{$produit->stock}}</span></span>
          </div>
          <div class="flex space-x-2">
         
            <a href="/admin/editproduit/{{$produit->id}}">
            <button class="text-yellow-600 hover:text-yellow-800 p-1 edit-product">
              <i class="fas fa-edit"></i>
            </button>
            </a>
            <form action="{{ route('adminproduit.destroy') }}" method="POST" class="text-red-600 hover:text-red-800 delete-produit">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $produit->id }}">
                                <button type="submit" class="flex items-center gap-2 text-red-600 hover:text-red-800 p-1">
                                    <i class="fas fa-trash"></i>
                                </button>
            </form>


          </div>
        </div>
      </div>
    </div>
@endforeach
  </div>

@endsection

@section('modal')
  <!-- Modales -->

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
              <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="product-modal-title">
                Ajouter un nouveau produit
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
              <form action="/admin/produit/store" method="POST" enctype="multipart/form-data" class="w-full space-y-4">
                @csrf

                <div>
                    <label for="product-name" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                    <input type="text" id="product-name" name="nom" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                  </div>


                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                      <label for="product-price" class="block text-sm font-medium text-gray-700">Prix (Dh)</label>
                      <input type="number" id="product-price" name="prix" min="0" step="0.01" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
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

                <div class="form-element">
                  <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                  <input type="file" name="photo"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
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


  </script>
@endsection
