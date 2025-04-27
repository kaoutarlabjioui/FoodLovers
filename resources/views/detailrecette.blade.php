@extends('layouts')
@section('content')

  <!-- Recipe Hero Section -->
  <section class="pt-24 md:pt-32 pb-8">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row gap-8">
        <!-- Recipe Image -->
        <div class="md:w-1/2">
          <div class="relative rounded-xl overflow-hidden shadow-lg">
            <img
              src="{{url('/storage/'. $recette->photo)}}"
              alt="{{$recette->nom}}"
              class="w-full h-[400px] object-cover"
            >
            <div class="absolute top-4 right-4 flex space-x-2">
              <button class="bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors">
                <i class="fas fa-heart text-primary"></i>
              </button>
              <button class="bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors">
                <i class="fas fa-share-alt text-dark"></i>
              </button>
              <button class="bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors">
                <i class="fas fa-print text-dark"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Recipe Info -->
        <div class="md:w-1/2">
          <div class="flex items-center mb-2">
            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-medium">{{$recette->category->title ??'Sans catégorie'}}</span>
            <span class="ml-2 text-gray-500 text-sm">{{$recette->created_at}}</span>
          </div>

          <h1 class="text-3xl md:text-4xl font-display font-bold mb-4">{{$recette->titre}}</h1>


          <p class="text-gray-700 mb-6">
            {{$recette->description}}
          </p>

          <div class="flex items-center mb-6">
            <!-- <div>
              <p class="font-medium">Par <a href="#" class="text-primary hover:underline">Emma Wilson</a></p>
              <p class="text-sm text-gray-500">Chef pâtissière</p>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </section>

  <!-- Recipe Content Section -->
  <section class="py-8">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Ingredients -->
        <div class="lg:w-1/3">
          <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-2xl font-display font-bold mb-4">Ingrédients</h2>

            <div class="mb-4">
              <ul class="space-y-2">
                @foreach($recette->ingredients as $ingredient)
                <li class="flex items-center">
                  <input type="text" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>{{$ingredient->ingredient}}</span>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>

        <!-- Instructions -->

            <div class="lg:w-2/3">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-display font-bold mb-6">Instructions</h2>

                <div class="space-y-6">
                @foreach (explode("\n", $recette->instruction) as $index => $etape)
                    @php $parties = explode(':', $etape, 2); @endphp
                    <div class="flex">
                    <div class="flex-shrink-0 mr-4">
                        <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">
                        {{ $index + 1 }}
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2">{{ trim($parties[0]) }}</h3>
                        <p class="text-gray-700">
                        {{ isset($parties[1]) ? trim($parties[1]) : '' }}
                        </p>
                    </div>
                    </div>
                @endforeach
                </div>
            </div>
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

      // Change icon based on menu state
      if (mobileMenu.classList.contains('hidden')) {
        this.innerHTML = '<i class="fas fa-bars text-xl"></i>';
      } else {
        this.innerHTML = '<i class="fas fa-times text-xl"></i>';
      }
    });

    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();
  </script>
@endsection
