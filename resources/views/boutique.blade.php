@extends('layouts')
@section('content')

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-primary/10 to-secondary/10 py-12">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Notre Boutique</h1>
        <p class="text-lg max-w-2xl mb-8">Découvrez notre sélection d'ustensiles, livres de cuisine et accessoires pour vous aider à réaliser vos meilleures recettes.</p>
        <!-- <div class="flex flex-wrap justify-center gap-4">
          <a href="#ustensiles" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors">Ustensiles</a>
          <a href="#livres" class="bg-secondary text-white px-6 py-3 rounded-lg hover:bg-secondary/90 transition-colors">Livres</a>
          <a href="#ingredients" class="bg-accent text-dark px-6 py-3 rounded-lg hover:bg-accent/90 transition-colors">Ingrédients</a>
          <a href="#accessoires" class="bg-dark text-white px-6 py-3 rounded-lg hover:bg-dark/90 transition-colors">Accessoires</a>
        </div> -->
      </div>
    </div>
  </section>

  <!-- Filters and Search -->
  <section class="py-8 border-b">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex flex-wrap items-center gap-2">
          <span class="text-sm font-medium">Filtrer par:</span>
          <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="all">Toutes les catégories</option>
            <option value="ustensiles">Ustensiles</option>
            <option value="livres">Livres de cuisine</option>
            <option value="ingredients">Ingrédients</option>
            <option value="accessoires">Accessoires</option>
          </select>
          <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="popularity">Popularité</option>
            <option value="price_asc">Prix (croissant)</option>
            <option value="price_desc">Prix (décroissant)</option>
            <option value="newest">Plus récents</option>
          </select>
          <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="all">Tous les prix</option>
            <option value="0-25">0€ - 25€</option>
            <option value="25-50">25€ - 50€</option>
            <option value="50-100">50€ - 100€</option>
            <option value="100+">100€ et plus</option>
          </select>
        </div>
        <div class="relative w-full md:w-64">
          <input
            type="text"
            placeholder="Rechercher un produit..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary"
          >
          <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </section>


  <!-- Categories Sections -->
  <!-- Ustensiles Section -->
  <section id="ustensiles" class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-display font-bold">Ustensiles de Cuisine</h2>
        <a href="#" class="text-primary hover:underline">Voir tout <i class="fas fa-arrow-right ml-1"></i></a>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Product Card 1 -->
         @foreach($produits as $produit)
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="{{url('/storage/'. $produit->photo)}}" alt="{{$produit->nom}}" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <form action="/detailsproduit" method="POST" class="inline">
                @csrf

                <input type="hidden" name="produit" value="{{ $produit->id }}">
                <button type="submit" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                    <i class="fas fa-eye"></i>
                </button>
            </form>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="/panier" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">{{$produit->nom}}</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">{{$produit->prix}}Dh</div>
              <div class="text-lg font-bold text-primary">{{$produit->stock}}</div>
              <form action="{{ route('panier.ajouter') }}" method="POST">
                @csrf
                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                <input type="hidden" name="nom" value="{{ $produit->nom }}">
                <input type="hidden" name="prix" value="{{ $produit->prix }}">
                <input type="hidden" name="photo" value="{{ $produit->photo }}">
                <input type="hidden" name="quantite" id="quantite_hidden" value="1">

                <button type="submit" title="Ajouter au panier" class="bg-primary text-white p-3 rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center">
                    <i class="fas fa-shopping-cart mr-2"></i>
                </button>
            </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>




  <!-- Newsletter -->
  <section class="py-12 bg-light">
    <div class="container mx-auto px-4">
      <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-2xl font-display font-bold mb-4">Restez informé</h2>
        <p class="text-gray-600 mb-6">Inscrivez-vous à notre newsletter pour recevoir nos offres exclusives et nos nouveautés.</p>
        <div class="flex flex-col sm:flex-row gap-2">
          <input type="email" placeholder="Votre adresse email" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
          <button class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors">S'inscrire</button>
        </div>
      </div>
    </div>
  </section>

  @endsection

  @section('js')

  <!-- JavaScript -->
  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });
  </script>
@endsection
