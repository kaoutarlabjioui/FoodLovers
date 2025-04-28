@extends('client.layouts')

@section('title', 'Mes Commandes')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-bold">Historique des commandes</h2>
  </div>

  <!-- Orders List -->
  <div class="space-y-4">
    @foreach($commandes as $commande)
    <div class="border border-gray-200 rounded-lg p-4 order-card">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
          <div class="flex items-center">
            <h3 class="font-bold">Commande #FL-{{ $commande->id }}</h3>
            <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              {{ $commande->status }}
            </span>
          </div>
          <p class="text-sm text-gray-500">{{ $commande->created_at->format('d M Y') }}</p>
        </div>
        <div class="mt-2 md:mt-0">
          <span class="font-bold text-lg">{{ number_format($commande->prix_totale, 2) }} Dh</span>
        </div>
      </div>
      <div class="mt-4 border-t border-gray-200 pt-4">
        <div class="flex flex-wrap gap-2">
          @foreach($commande->commandesItems as $item)
            <div class="flex items-center bg-gray-100 rounded-lg p-2">
              <img src="{{ $item->produit->image_url }}" alt="{{ $item->produit->name }}" class="w-12 h-12 object-cover rounded-md">
              <div class="ml-2">
                <p class="text-sm font-medium">{{ $item->produit->name }}</p>
                <p class="text-xs text-gray-500">Qté: {{ $item->quantite }}</p>
              </div>
            </div>
          @endforeach
        </div>
        <div class="mt-4 flex justify-between items-center">
          <a href="#" class="text-primary hover:text-primary/80 text-sm font-medium">
            Voir les détails
          </a>
          <button class="bg-primary hover:bg-primary/90 text-white font-medium py-1 px-3 rounded-lg transition-colors text-sm">
            Acheter à nouveau
          </button>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Pagination -->
  <div class="mt-6 flex items-center justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Affichage de <span class="font-medium">1</span> à <span class="font-medium">{{ $commandes->count() }}</span> sur <span class="font-medium">{{ $commandes->total() }}</span> commandes
      </p>
    </div>
    <div>
      <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        {{ $commandes->links() }}
      </nav>
    </div>
  </div>
</div>
@endsection
