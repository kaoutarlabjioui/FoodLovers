<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarte aux pommes traditionnelle - FoodLovers</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#FF6B6B',
            secondary: '#4ECDC4',
            accent: '#FFE66D',
            dark: '#292F36',
            light: '#F7F9F9'
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            display: ['Playfair Display', 'serif']
          }
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');
  </style>
</head>
<body class="font-sans bg-light text-dark">
  <!-- Navigation -->
  <nav class="bg-white shadow-md fixed w-full z-10">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <div class="flex items-center">
          <a href="index.html" class="text-2xl font-display font-bold text-primary">FoodLovers</a>
        </div>
        <div class="hidden md:flex items-center space-x-8">
          <a href="/" class="font-medium hover:text-primary transition-colors">Accueil</a>
          <a href="recipes.html" class="font-medium hover:text-primary transition-colors">Recettes</a>
          <a href="competition.html" class="font-medium hover:text-primary transition-colors">Compétitions</a>
          <a href="/boutique" class="font-medium hover:text-primary transition-colors">Boutique</a>
        </div>
        <div class="flex items-center space-x-4">
          <a href="/login" class="hidden md:block font-medium hover:text-primary transition-colors">Connexion</a>
          <a href="/register" class="hidden md:block bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">Inscription</a>
          <button class="md:hidden text-dark" id="mobile-menu-button">
            <i class="fas fa-bars text-xl"></i>
          </button>
        </div>
      </div>
      <!-- Mobile Menu -->
      <div class="md:hidden hidden" id="mobile-menu">
        <div class="flex flex-col space-y-4 py-4">
          <a href="index.html" class="font-medium hover:text-primary transition-colors">Accueil</a>
          <a href="recipes.html" class="font-medium hover:text-primary transition-colors">Recettes</a>
          <a href="competition.html" class="font-medium hover:text-primary transition-colors">Compétitions</a>
          <a href="shop.html" class="font-medium hover:text-primary transition-colors">Boutique</a>
          <a href="login.html" class="font-medium hover:text-primary transition-colors">Connexion</a>
          <a href="register.html" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors text-center">Inscription</a>
        </div>
      </div>
    </div>
  </nav>

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
            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-medium">{{$recette->category->title}}</span>
            <span class="ml-2 text-gray-500 text-sm">{{$recette->created_at}}</span>
          </div>

          <h1 class="text-3xl md:text-4xl font-display font-bold mb-4">{{$recette->titre}}</h1>

          <div class="flex items-center mb-4">
            <div class="flex items-center">
              <span class="text-yellow-400 text-xl">★★★★</span><span class="text-gray-300 text-xl">★</span>
              <span class="ml-1 text-gray-700">(4.8)</span>
            </div>
            <span class="mx-3 text-gray-300">|</span>
            <span class="text-gray-700">142 avis</span>
          </div>

          <p class="text-gray-700 mb-6">
            {{$recette->description}}
          </p>

          <div class="flex items-center mb-6">
            <div>
              <p class="font-medium">Par <a href="#" class="text-primary hover:underline">Emma Wilson</a></p>
              <!-- <p class="text-sm text-gray-500">Chef pâtissière</p> -->
            </div>
          </div>

          <div class="flex flex-wrap gap-3">
            <button class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors">
              <i class="fas fa-bookmark mr-2"></i> Sauvegarder
            </button>
            <button class="bg-white border border-primary text-primary px-6 py-3 rounded-lg hover:bg-primary/10 transition-colors">
              <i class="fas fa-comment mr-2"></i> Commenter
            </button>
          </div>
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
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>{{$ingredient->ingredient}}</span>
                </li>
                @endforeach
              </ul>
            </div>
          </div>

          <div class="bg-white rounded-xl shadow-md p-6 mt-6">
            <h2 class="text-2xl font-display font-bold mb-4">Valeurs nutritionnelles</h2>
            <div class="space-y-4">
              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium">Calories</span>
                  <span>320 kcal</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="bg-primary h-2 rounded-full" style="width: 65%"></div>
                </div>
              </div>

              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium">Protéines</span>
                  <span>4g</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="bg-blue-500 h-2 rounded-full" style="width: 15%"></div>
                </div>
              </div>

              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium">Lipides</span>
                  <span>18g</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="bg-yellow-500 h-2 rounded-full" style="width: 45%"></div>
                </div>
              </div>

              <div>
                <div class="flex justify-between mb-1">
                  <span class="font-medium">Glucides</span>
                  <span>42g</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                  <div class="bg-green-500 h-2 rounded-full" style="width: 70%"></div>
                </div>
              </div>
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

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">FoodLovers</h3>
          <p class="mb-4">Découvrez, cuisinez et partagez des recettes incroyables avec des passionnés de cuisine du monde entier.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-pinterest"></i></a>
          </div>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Liens rapides</h3>
          <ul class="space-y-2">
            <li><a href="/" class="hover:text-primary transition-colors">Accueil</a></li>
            <li><a href="recipes.html" class="hover:text-primary transition-colors">Recettes</a></li>
            <li><a href="competition.html" class="hover:text-primary transition-colors">Compétitions</a></li>
            <li><a href="shop.html" class="hover:text-primary transition-colors">Boutique</a></li>
            <li><a href="about.html" class="hover:text-primary transition-colors">À propos</a></li>
            <li><a href="contact.html" class="hover:text-primary transition-colors">Contact</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Catégories</h3>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-primary transition-colors">Petit-déjeuner</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Déjeuner</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Dîner</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Desserts</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Végétarien</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Contact</h3>
          <ul class="space-y-2">
            <li><i class="fas fa-map-marker-alt mr-2"></i> 123 Rue de la Cuisine, Paris</li>
            <li><i class="fas fa-phone mr-2"></i> (01) 23 45 67 89</li>
            <li><i class="fas fa-envelope mr-2"></i> info@foodlovers.com</li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-700 mt-8 pt-8 text-center">
        <p>&copy; <span id="current-year"></span> FoodLovers. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

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
</body>
</html>
