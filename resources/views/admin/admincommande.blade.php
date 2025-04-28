@extends('admin.layout')
@section('title','Gestion des commandes')
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

    /* Status badges */
    .status-badge {
      @apply px-2 inline-flex text-xs leading-5 font-semibold rounded-full;
    }
    .status-pending {
      @apply bg-yellow-100 text-yellow-800;
    }
    .status-processing {
      @apply bg-blue-100 text-blue-800;
    }
    .status-shipped {
      @apply bg-indigo-100 text-indigo-800;
    }
    .status-delivered {
      @apply bg-green-100 text-green-800;
    }
    .status-cancelled {
      @apply bg-red-100 text-red-800;
    }
    .status-refunded {
      @apply bg-gray-100 text-gray-800;
    }
  </style>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
      <div class="flex justify-between items-center mb-6">
        <h3 class="font-bold text-lg">Gestion des commandes</h3>
      </div>

      <!-- Orders Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <!-- <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commande</th> -->
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
              <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
              @foreach($commandes as $commande)
                <tr>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-8 w-8">
                        <img class="h-8 w-8 rounded-full object-cover" src=" https://ui-avatars.com/api" alt="{{ $commande->user->first_name }}">
                      </div>
                      <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">{{ $commande->user->first_name }} {{ $commande->user->last_name }}</div>
                        <div class="text-xs text-gray-500">{{ $commande->user->email }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                    {{ $commande->created_at->format('d/m/Y H:i') }}
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ number_format($commande->prix_totale, 2, ',', ' ') }} Dh</div>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap">
                    <span class="status-badge {{ 'status-'.$commande->status }}">
                      {{ ucfirst($commande->status) }}
                    </span>
                  </td>
                  <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                      <button class="text-primary hover:text-primary/80 edit-status" data-id="{{ $commande->id }}" title="Modifier le statut">
                        <i class="fas fa-edit"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="flex justify-between items-center mt-4">
        <div class="text-sm text-gray-500">

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
<!-- Modale Modifier le statut -->
<div id="statusModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
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
              Modifier le statut de la commande
            </h3>

            <div class="mt-2">
              <form id="updateStatusForm" action="" method="POST" class="w-full space-y-4">
                @csrf
                @method('PATCH')
                <input type="hidden" name="order_id" id="order_id">

                <div class="form-element">
                  <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                  <select id="status" name="status" required class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    <option value="pending">En attente</option>
                    <option value="processing">En traitement</option>
                    <option value="shipped">Expédiée</option>
                    <option value="delivered">Livrée</option>
                    <option value="cancelled">Annulée</option>
                    <option value="refunded">Remboursée</option>
                  </select>
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
  document.addEventListener('DOMContentLoaded', function () {
    // Gestion de la modale de statut
    const statusModal = document.getElementById('statusModal');
    const closeStatusModal = document.getElementById('closeStatusModal');
    const updateStatusForm = document.getElementById('updateStatusForm');
    const orderIdInput = document.getElementById('order_id');

    // Boutons d'édition de statut
    const editStatusButtons = document.querySelectorAll('.edit-status');

    if (editStatusButtons.length > 0 && statusModal && closeStatusModal) {
      // Ouvrir la modale pour modifier le statut
      editStatusButtons.forEach(button => {
        button.addEventListener('click', () => {
          const orderId = button.getAttribute('data-id');
          orderIdInput.value = orderId;
          updateStatusForm.action = `/admin/orders/${orderId}/status`;
          statusModal.classList.remove('hidden');
        });
      });

      // Fermer la modale
      closeStatusModal.addEventListener('click', () => {
        statusModal.classList.add('hidden');
      });
    }

    // Soumission du formulaire de mise à jour du statut
    if (updateStatusForm) {
      updateStatusForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Ici, vous pourriez ajouter une requête AJAX pour mettre à jour le statut
        // ou laisser le formulaire se soumettre normalement

        // Exemple de soumission AJAX
        const formData = new FormData(this);
        fetch(this.action, {
          method: 'POST',
          body: formData,
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            statusModal.classList.add('hidden');
            // Rafraîchir la page ou mettre à jour l'interface
            window.location.reload();
          } else {
            alert('Une erreur est survenue: ' + data.message);
          }
        })
        .catch(error => {
          console.error('Erreur:', error);
          alert('Une erreur est survenue lors de la mise à jour du statut.');
        });
      });
    }
  });
</script>
@endsection
