@extends('client.profile')

@section('title', 'Mes Compétitions')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Mes compétitions</h2>
    <div class="relative">
      <select class="pl-4 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-sm">
        <option value="all">Toutes les compétitions</option>
        <option value="active">En cours</option>
        <option value="upcoming">À venir</option>
        <option value="completed">Terminées</option>
      </select>
    </div>
  </div>

  <!-- Competitions List -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @if(isset($competitions) && count($competitions) > 0)
      @foreach($competitions as $competition)
        <!-- Competition Card -->
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm competition-card">
          <div class="relative">
            <img src="{{ url('/storage/' . $competition->image) }}" alt="{{ $competition->name }}" class="w-full h-48 object-cover">
            <div class="absolute top-0 right-0 m-2">
              <span class="px-2 py-1 bg-primary text-white text-xs font-semibold rounded-full">
                {{ $competition->pivot->status }}
              </span>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-2">{{ $competition->name }}</h3>
            <p class="text-gray-600 text-sm mb-3">{{ $competition->description }}</p>
            <div class="flex justify-between items-center text-sm">
              <span class="text-gray-500">
                <i class="far fa-calendar-alt mr-1"></i> Fin: {{ $competition->date_fin }}
              </span>
            </div>
          </div>
        </div>
      @endforeach
    @else
      <div class="col-span-2 text-center py-8">
        <div class="text-5xl text-gray-300 mb-4">
          <i class="fas fa-trophy"></i>
        </div>
        <h3 class="text-xl font-medium mb-2">Aucune compétition pour le moment</h3>
        <p class="text-gray-600 mb-6">Participez à des compétitions pour les voir apparaître ici.</p>
        <a href="/competitions" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">
          Découvrir les compétitions
        </a>
      </div>
    @endif
  </div>

  <!-- Pagination -->
  @if(isset($competitions) && count($competitions) > 0)
    <div class="mt-6 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Affichage de <span class="font-medium">{{ $competitions->firstItem() }}</span> à <span class="font-medium">{{ $competitions->lastItem() }}</span> sur <span class="font-medium">{{ $competitions->total() }}</span> compétitions
        </p>
      </div>
      <div>
        {{ $competitions->links() }}
      </div>
    </div>
  @endif
</div>
@endsection
