@extends('admin.dashboard')
@section('title','Gestion des tags')
@section('css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');
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
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold">Gestion des Tags</h1>
        <p class="text-gray-600">Gérez tous les tags de la plateforme</p>
    </div>
    <div class="mt-4 md:mt-0">
        <button id="openModal" class="bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Ajouter un tag
        </button>
    </div>
</div>



<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Éléments</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($tags as $tag)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-8 w-8 flex-shrink-0 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                                <i class="fas fa-tag"></i>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{$tag->nom}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Recettes</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 max-w-xs truncate">{{$tag->description}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">42</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Actif
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{$tag->created_at}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex space-x-2 justify-end">
                            <a href="/admin/editetag/{{$tag->id}}">
                                <button class="text-yellow-600 hover:text-yellow-800">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            <form action="{{ route('admintag.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $tag->id }}">
                                <button type="submit" class="text-red-600 hover:text-red-800">
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



</div>
@endsection


@section('modal')
<!-- Modales -->

<!-- Modale Ajouter tag -->
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
                            Ajouter un nouveau tag
                        </h3>

                        <div class="mt-2">
                            <form action="/admin/tag/store" method="POST" class="w-full space-y-4">
                                @csrf

                                <div class="form-element">
                                    <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                                    <input type="text" name="nom" required placeholder="Titre"
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary" />
                                </div>

                                <div class="form-element">
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <input type="text" name="description" required placeholder="Description"
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
<!-- JavaScript -->
<script>
    const modal = document.getElementById("jobModal");
    const openModal = document.getElementById("openModal");
    const closeModal = document.getElementById("closeModal");
    // const projectsContainer = document.getElementById("projects");

    openModal.addEventListener("click", () => {
        modal.classList.remove("hidden");

    });

    closeModal.addEventListener("click", () => {
        modal.classList.add("hidden");

    });
</script>
@endsection
