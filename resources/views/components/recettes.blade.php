
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
              <span class="text-sm text-gray-500">{{$recette->user->first_name}}</span>

            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

