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
        <div class="relative w-full md:w-64">
          <input
            type="search" name="search" id="search-input"
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

  <section id="produits" class="py-12 bg-gray-50">
  @include("components.produits");
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

    const searchInput = document.getElementById("search-input");
    const produitsContainer = document.getElementById("produits");

    function fetchProduits(){
        const query = searchInput.value.trim();
        fetch('/searchproduit?query=' +encodeURIComponent(query),{
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.text())
        .then(html=>{
            produitsContainer.innerHTML = html;
        })
        .catch(error => console.error('Erreur:',error));

    }

    searchInput.addEventListener("input", fetchProduits);


    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });
  </script>
@endsection
