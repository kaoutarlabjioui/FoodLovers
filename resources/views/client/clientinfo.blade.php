@extends('client.profile')

@section('title', 'Mes Informations')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
  <h2 class="text-xl font-bold mb-4">Informations personnelles</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <h3 class="text-sm font-medium text-gray-500 mb-1">Nom complet</h3>
      <p class="text-gray-900">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
    </div>
    <div>
      <h3 class="text-sm font-medium text-gray-500 mb-1">Email</h3>
      <p class="text-gray-900">{{auth()->user()->email}}</p>
    </div>
  </div>
</div>

<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
  <h2 class="text-xl font-bold mb-4">Adresses</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="border border-gray-200 rounded-lg p-4">
      <div class="flex justify-between items-start mb-2">
        <h3 class="font-medium">Adresse de livraison</h3>
        <button id='openModal' class="text-primary hover:text-primary/80">
          <i class="fas fa-edit"></i>
        </button>
      </div>
      <p class="text-gray-600">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
      <p class="text-gray-600">{{auth()->user()->address->ville ?? ' ' }}</p>
      <p class="text-gray-600">{{auth()->user()->address->address ?? ''}}</p>
      <p class="text-gray-600">{{auth()->user()->address->pays ?? '' }}</p>
    </div>
  </div>
</div>
@endsection

@section('modals')
<!-- Modale ajouter -->
<div id="jobModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="category-modal-title">
              Modifier l'adresse
            </h3>

            <div class="mt-2">
              <form action="/address/store" method="POST" class="w-full space-y-4">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                <div class="form-element">
                  <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                  <input type="text" name="ville" required placeholder="Ville"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                </div>

                <div class="form-element">
                  <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                  <input type="text" name="address" required placeholder="Address"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                </div>
                <div class="form-element">
                  <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Pays</label>
                  <input type="text" name="pays" required placeholder="Pays"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                </div>
                <div class="form-element">
                  <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Code_Postal</label>
                  <input type="number" name="code_postal" required placeholder="Code_Postal"
                    class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                </div>

                <div class="flex justify-end space-x-2 pt-4 border-t border-gray-100 mt-6">
                  <button type="button" id="closeModal"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-600">
                    Annuler
                  </button>
                  <input type="submit" name="submit"
                    class="bg-primary text-white px-4 py-2 rounded-md text-sm hover:bg-primary/90 cursor-pointer"
                    value="Ajouter">
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
  const modal = document.getElementById("jobModal");
  const openModal = document.getElementById("openModal");
  const closeModal = document.getElementById("closeModal");

  openModal.addEventListener("click", () => {
    modal.classList.remove("hidden");
  });

  closeModal.addEventListener("click", () => {
    modal.classList.add("hidden");
  });
</script>
@endsection
