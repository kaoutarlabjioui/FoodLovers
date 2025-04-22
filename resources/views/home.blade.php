@extends('layouts')

@section('content')
<!-- Hero Section -->
<section class="pt-24 pb-12 md:pt-32 md:pb-16 bg-gradient-to-r from-primary/10 to-secondary/10">
  <div class="container mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto">
      <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Welcome to <span class="text-primary">FoodLovers</span></h1>
      <p class="text-lg mb-8">Discover delicious recipes, join exciting cooking competitions, and connect with food enthusiasts from around the world!</p>
      <div class="flex flex-wrap justify-center gap-4">
        <a href="#featured-recipes" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors">Explore Recipes</a>
        <a href="#active-competitions" class="bg-white border border-primary text-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition-colors">Join Competitions</a>
      </div>
    </div>
  </div>
</section>

<!-- Featured Recipes Section -->
<section id="featured-recipes" class="py-12 bg-white">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-3xl font-display font-bold">Featured Recipes</h2>
      <a href="/" class="text-primary font-medium hover:underline flex items-center">
        View All <i class="fas fa-arrow-right ml-2"></i>
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($recettes as $recette)
      <!-- Recipe Card - New Design -->
      <div class="group bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
        <div class="relative">
          <!-- Image avec overlay au survol -->
          <img src="{{ url('storage/'. $recette->photo) }}" alt="{{ $recette->titre }}" class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
          <div class="p-4 w-full">
            <form action="/recettedetails" method="POST">
            @csrf
            <input type="hidden" name="recette" value="{{ $recette->id }}">

            <button type="submit" class="w-full bg-gray-50 text-gray-800 border border-gray-200 py-2 px-4 rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors duration-200">
            Voir détails
            </button>
            </form>
        </div>
          </div>

        </div>

        <div class="p-6">
          <!-- Titre et description -->
          <h3 class="font-bold text-xl mb-2 group-hover:text-primary transition-colors">{{ $recette->titre }}</h3>
          <p class="text-gray-600 mb-4 line-clamp-2">{{ $recette->description }}</p>

          <!-- Tags -->
          <div class="flex flex-wrap gap-2 mb-4">

          @foreach($recette->tags as $tag)
            @if($tag)
        <span class="bg-secondary/10 text-secondary text-xs font-medium px-2 py-1 rounded-full">#{{ $tag->nom }}</span>
            @endif
           @endforeach



          </div>

          <!-- Ligne de séparation -->
          <div class="border-t border-gray-100 my-4"></div>

          <!-- Footer avec infos et actions -->
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-2">
                <i class="fas fa-user text-gray-500"></i>
              </div>
              <span class="text-sm text-gray-500">auteur name</span>
            </div>
            <div class="flex items-center space-x-3">
              <button class="text-gray-400 hover:text-red-500 transition-colors">
                <i class="far fa-heart"></i>
              </button>
              <button class="text-gray-400 hover:text-primary transition-colors">
                <i class="far fa-bookmark"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Active Competitions Section -->
<section id="active-competitions" class="py-12 bg-light">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
      <h2 class="text-3xl font-display font-bold">Active Competitions</h2>
      <a href="/competition" class="text-primary font-medium hover:underline flex items-center">
        View All <i class="fas fa-arrow-right ml-2"></i>
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Competition Card -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <img src="/placeholder.svg" alt="" class="w-full h-48 object-cover">
        <div class="p-6">
          <div class="flex justify-between items-center mb-3">
            <div class="bg-primary text-white text-sm font-medium px-2 py-1 rounded">Active</div>
            <span class="text-sm text-gray-600">Ends in days</span>
          </div>
          <h3 class="font-bold text-xl mb-2"></h3>
          <p class="text-gray-600 mb-4"></p>
          <div class="mb-4">
            <div class="flex items-center mb-1">
              <i class="fas fa-trophy text-yellow-500 mr-2"></i>
              <span class="font-medium">Prizes:</span>
            </div>
            <ul class="list-disc list-inside text-gray-600 ml-6">
              <li></li>
            </ul>
          </div>
          <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500">participants</span>
            <a href="" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">Join Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter Section -->
<section class="py-12 bg-primary/10">
  <div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl font-display font-bold mb-4">Join Our Culinary Community</h2>
      <p class="text-lg mb-6">Subscribe to our newsletter to receive new recipes, cooking tips, and exclusive competition announcements.</p>
      <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
        <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
        <button class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors">Subscribe</button>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script>
  // JavaScript pour le défilement fluide vers les sections
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
</script>
@endsection
