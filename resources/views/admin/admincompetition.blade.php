@extends('admin.dashboard')
@section('title','Gestion des compétitions')
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
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Gestion des Compétitions</h1>
        <p class="text-gray-600 mt-2">Créez et gérez les compétitions culinaires de FoodLovers</p>
    </div>

    <!-- Ajouter une compétition -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-8">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800">Ajouter une nouvelle compétition</h2>
        </div>

        <div class="p-6">
            <form action="/admin/competition/store" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="admin_id" value="{{auth()->user()->id}}">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom de la compétition</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-800 focus:ring-2 focus:ring-primary focus:border-primary transition"
                            placeholder="Ex: Concours de pâtisserie">
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Description de la compétition</label>
                        <input type="text" id="name" name="description" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-800 focus:ring-2 focus:ring-primary focus:border-primary transition"
                            placeholder="Ex: Concours de pâtisserie">
                    </div>
                    <div>
                        <label for="date_debut" class="block text-sm font-medium text-gray-700 mb-2">Date de début</label>
                        <input type="date" id="date_debut" name="date_debut" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-800 focus:ring-2 focus:ring-primary focus:border-primary transition">
                    </div>
                    <div>
                        <label for="date_fin" class="block text-sm font-medium text-gray-700 mb-2">Date de fin</label>
                        <input type="date" id="date_fin" name="date_fin" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-800 focus:ring-2 focus:ring-primary focus:border-primary transition">
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-3 bg-primary hover:bg-primary/90 text-white rounded-lg transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Créer Compétition
                    </button>

                </div>
            </form>
        </div>
    </div>

    <!-- Liste des compétitions -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800">Compétitions existantes</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date début</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date fin</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gagnant</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($competitions as $competition)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $competition->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $competition->date_debut }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $competition->date_fin }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($competition->winner_id)
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                src="{{ $competition->winner->profile_photo ?? 'https://ui-avatars.com/api/?name='.urlencode($competition->winner->first_name.' '.$competition->winner->last_name).'&color=7F9CF5&background=EBF4FF' }}"
                                                alt="{{ $competition->winner->first_name ?? 'Non trouvé' }} {{ $competition->winner->last_name ?? '' }}">
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $competition->winner->first_name ?? 'Non trouvé' }} {{ $competition->winner->last_name ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Aucun gagnant
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <!-- Choisir Gagnant -->
                                    @if (now()->gt($competition->date_fin) && !$competition->winner_id)
                                        <form method="POST" action="/admin/choisirgagnant">
                                            @csrf
                                            <input type="hidden" name="competition_id" value="{{ $competition->id }}">
                                            <button type="submit" class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded-md transition-colors">
                                                <i class="fas fa-trophy mr-1"></i> Choisir Gagnant
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Modifier -->
                                    <button  class=" status-btn px-3 py-1 bg-amber-500 hover:bg-amber-600 text-white rounded-md transition-colors"  data-id = "{{$competition->id}}" data-status = "{{$competition->date_fin}}">
                                        <i class="fas fa-edit mr-1"></i> Modifier
                                    </button>

                                    <!-- Supprimer -->
                                    <form method="POST" action="/admin/competition/destroy">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $competition->id }}">
                                        <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-md transition-colors"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette compétition?')">
                                            <i class="fas fa-trash-alt mr-1"></i> Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if(count($competitions) == 0)
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-trophy text-4xl text-gray-300 mb-3"></i>
                                    <p>Aucune compétition n'a été créée pour le moment</p>
                                    <p class="text-sm mt-1">Créez votre première compétition en utilisant le formulaire ci-dessus</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Pagination si nécessaire -->
        @if(isset($competitions) && method_exists($competitions, 'links') && $competitions->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $competitions->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Notification Toast pour les actions réussies -->
@if(session('success'))
<div id="notification" class="fixed bottom-5 right-5 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center">
    <i class="fas fa-check-circle mr-2"></i>
    <span>{{ session('success') }}</span>
    <button onclick="closeNotification()" class="ml-4 text-white hover:text-gray-200">
        <i class="fas fa-times"></i>
    </button>
</div>
@endif
@if(session('error'))
<div id="notification" class="fixed bottom-5 right-5 bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg flex items-center">
    <i class="fas fa-exclamation-circle mr-2"></i>
    <span>{{ session('error') }}</span>
    <button onclick="closeNotification()" class="ml-4 text-white hover:text-gray-200">
        <i class="fas fa-times"></i>
    </button>
</div>
@endif

@endsection
@section('modal')
<div id="statusModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Change User Status
                        </h3>
                        <div class="mt-4">
                            <form action="/admin/updatecompetition" method="POST" id="statusForm">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="date_competition_id" name="id">

                                <div class="mb-4">
                                    <label for="update_dateFin" class="block text-sm font-medium text-gray-700">Date Fin</label>
                                    <input type="date" name="date_fin" id="update_dateFin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500 sm:text-sm"
/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" form="statusForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Update Status
                </button>
                <button type="button" class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')

<script>
    // setTimeout(function() {
    //     document.getElementById('notification').style.display = 'none';
    // }, 5000);

    // function closeNotification() {
    //     document.getElementById('notification').style.display = 'none';
    // }

    document.addEventListener('DOMContentLoaded', function () {
    // --- Notification Auto-Close ---
    const notification = document.getElementById('notification');
    if (notification) {
        setTimeout(function () {
            notification.style.display = 'none';
        }, 5000); // 5 secondes
    }

    window.closeNotification = function () {
        const notification = document.getElementById('notification');
        if (notification) {
            notification.style.display = 'none';
        }
    }
      })
    // Modal functionality
    document.addEventListener('DOMContentLoaded', function() {


// Open status modal and populate form
const statusButtons = document.querySelectorAll('.status-btn');
statusButtons.forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const status = this.getAttribute('data-status');

        // Populate form fields
        document.getElementById('date_competition_id').value = id;
        document.getElementById('update_dateFin').value = status;

        // Show modal
        document.getElementById('statusModal').classList.remove('hidden');
    });
});



// Close modals
const closeButtons = document.querySelectorAll('.closeModal');
closeButtons.forEach(button => {
    button.addEventListener('click', function() {

        document.getElementById('statusModal').classList.add('hidden');
    });
});

// Close modals when clicking outside
window.addEventListener('click', function(event) {
    if (event.target.classList.contains('fixed') && event.target.classList.contains('inset-0')) {

        document.getElementById('statusModal').classList.add('hidden');

    }
});
});
</script>

@endsection
