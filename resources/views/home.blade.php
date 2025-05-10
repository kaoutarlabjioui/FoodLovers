@extends('layouts')
@section('content')
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
<!-- Hero Section -->
<section class="pt-24 pb-12 md:pt-32 md:pb-16 bg-gradient-to-r from-primary/10 to-secondary/10">
  <div class="container mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto">
      <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Welcome to <span class="text-primary">FoodLovers</span></h1>
      <p class="text-lg mb-8">Discover delicious recipes, join exciting cooking competitions, and connect with food enthusiasts from around the world!</p>

      <!-- Barre de recherche -->
      <div class="max-w-2xl mx-auto mb-8">
        <!-- <form action="" method="GET" class="relative"> -->
          <div class="flex">
            <div class="relative w-full">
              <input type="search" name="search" id="search-input"
                class="block w-full p-4 pl-5 pr-12 text-sm border border-gray-200 rounded-l-lg bg-white focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                placeholder="Search for recipes, ingredients, or tags..." required>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
            </div>
            <!-- <button type="submit"
              class="px-6 py-4 text-white bg-primary hover:bg-primary/90 rounded-r-lg border border-primary transition-colors">
              Search
            </button> -->
          </div>
        <!-- </form> -->
      </div>

      <div class="flex flex-wrap justify-center gap-4">
        <a href="#featured-recipes" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors">Explore Recipes</a>
        <a href="/competition" class="bg-white border border-primary text-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition-colors">Join Competitions</a>
      </div>
    </div>
  </div>
</section>


<!-- Featured Recipes Section -->
<section id="featured-recipes" class="py-12 bg-white">
@include("components.recettes");
</section>

<!-- Recherche avancée Modal -->
<div id="advancedSearchModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
  <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
    <div class="p-6 border-b border-gray-100">
      <div class="flex justify-between items-center">
        <h3 class="text-xl font-bold">Recherche avancée</h3>
        <button type="button" onclick="toggleAdvancedSearch()" class="text-gray-400 hover:text-gray-500">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>

    <div class="p-6">
      <form action="" method="GET" class="space-y-6">
        <div>
          <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1">Mots-clés</label>
          <input type="text" id="keyword" name="keyword" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
            <select id="category" name="category" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
              <option value="">Toutes les catégories</option>
              <option value="1">Entrées</option>
              <option value="2">Plats principaux</option>
              <option value="3">Desserts</option>
              <option value="4">Boissons</option>
            </select>
          </div>

          <div>
            <label for="difficulty" class="block text-sm font-medium text-gray-700 mb-1">Difficulté</label>
            <select id="difficulty" name="difficulty" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
              <option value="">Toutes les difficultés</option>
              <option value="facile">Facile</option>
              <option value="moyen">Moyen</option>
              <option value="difficile">Difficile</option>
            </select>
          </div>
        </div>

        <div>
          <label for="time" class="block text-sm font-medium text-gray-700 mb-1">Temps de préparation (max)</label>
          <div class="flex items-center">
            <input type="range" id="time" name="time" min="5" max="180" step="5" value="60" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
            <span id="timeValue" class="ml-3 min-w-[60px] text-sm text-gray-700">60 min</span>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Tags populaires</label>
          <div class="flex flex-wrap gap-2">
            <label class="inline-flex items-center px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full cursor-pointer">
              <input type="checkbox" name="tags[]" value="vegetarien" class="mr-2">
              <span>Végétarien</span>
            </label>
            <label class="inline-flex items-center px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full cursor-pointer">
              <input type="checkbox" name="tags[]" value="vegan" class="mr-2">
              <span>Vegan</span>
            </label>
            <label class="inline-flex items-center px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full cursor-pointer">
              <input type="checkbox" name="tags[]" value="sansgluten" class="mr-2">
              <span>Sans gluten</span>
            </label>
            <label class="inline-flex items-center px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full cursor-pointer">
              <input type="checkbox" name="tags[]" value="rapide" class="mr-2">
              <span>Rapide</span>
            </label>
            <label class="inline-flex items-center px-3 py-1 bg-gray-100 hover:bg-gray-200 rounded-full cursor-pointer">
              <input type="checkbox" name="tags[]" value="healthy" class="mr-2">
              <span>Healthy</span>
            </label>
          </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-gray-100">
          <button type="reset" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg mr-3 hover:bg-gray-50">
            Réinitialiser
          </button>
          <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">
            Rechercher
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('js')
<script>
const searchInput = document.getElementById("search-input");
const recettesContainer = document.getElementById("featured-recipes");

function fetchRecettes(){
    const query = searchInput.value.trim();
    fetch('/search?query=' +encodeURIComponent(query),{
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.text())
    .then(html=>{
        recettesContainer.innerHTML = html;
    })
    .catch(error => console.error('Erreur:',error));

}

searchInput.addEventListener("input", fetchRecettes);








  // JavaScript pour le défilement fluide vers les sections
//   document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//     anchor.addEventListener('click', function (e) {
//       e.preventDefault();

//       document.querySelector(this.getAttribute('href')).scrollIntoView({
//         behavior: 'smooth'
//       });
//     });
//   });

//   // JavaScript pour la recherche avancée
//   function toggleAdvancedSearch() {
//     const modal = document.getElementById('advancedSearchModal');
//     modal.classList.toggle('hidden');
//   }

//   // Mise à jour de la valeur du temps de préparation
//   const timeSlider = document.getElementById('time');
//   const timeValue = document.getElementById('timeValue');

//   if (timeSlider && timeValue) {
//     timeSlider.addEventListener('input', function() {
//       timeValue.textContent = this.value + ' min';
//     });
//   }
</script>
@endsection
