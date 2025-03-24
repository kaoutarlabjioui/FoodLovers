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
              src="https://images.unsplash.com/photo-1488477304112-4944851de03d"
              alt="Tarte aux pommes traditionnelle"
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
            <span class="bg-primary/10 text-primary px-3 py-1 rounded-full text-sm font-medium">Dessert</span>
            <span class="ml-2 text-gray-500 text-sm">Publié le 14 mars 2025</span>
          </div>

          <h1 class="text-3xl md:text-4xl font-display font-bold mb-4">Tarte aux pommes traditionnelle</h1>

          <div class="flex items-center mb-4">
            <div class="flex items-center">
              <span class="text-yellow-400 text-xl">★★★★</span><span class="text-gray-300 text-xl">★</span>
              <span class="ml-1 text-gray-700">(4.8)</span>
            </div>
            <span class="mx-3 text-gray-300">|</span>
            <span class="text-gray-700">142 avis</span>
          </div>

          <p class="text-gray-700 mb-6">
            Une délicieuse tarte aux pommes traditionnelle française avec une pâte sablée croustillante et des pommes caramélisées. Un classique intemporel qui ravira vos papilles et celles de vos invités.
          </p>

          <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white p-3 rounded-lg shadow-sm text-center">
              <i class="far fa-clock text-primary text-xl mb-1"></i>
              <p class="text-sm text-gray-500">Préparation</p>
              <p class="font-medium">30 min</p>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-sm text-center">
              <i class="fas fa-fire text-primary text-xl mb-1"></i>
              <p class="text-sm text-gray-500">Cuisson</p>
              <p class="font-medium">45 min</p>
            </div>
            <div class="bg-white p-3 rounded-lg shadow-sm text-center">
              <i class="fas fa-utensils text-primary text-xl mb-1"></i>
              <p class="text-sm text-gray-500">Portions</p>
              <p class="font-medium">8 parts</p>
            </div>
          </div>

          <div class="flex items-center mb-6">
            <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Chef" class="w-10 h-10 rounded-full mr-3">
            <div>
              <p class="font-medium">Par <a href="#" class="text-primary hover:underline">Emma Wilson</a></p>
              <p class="text-sm text-gray-500">Chef pâtissière</p>
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
            <p class="text-gray-500 mb-4">Pour 8 personnes</p>

            <div class="mb-4">
              <h3 class="font-bold mb-2">Pour la pâte sablée</h3>
              <ul class="space-y-2">
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>250g de farine</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>125g de beurre froid</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>80g de sucre en poudre</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>1 œuf</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>1 pincée de sel</span>
                </li>
              </ul>
            </div>

            <div>
              <h3 class="font-bold mb-2">Pour la garniture</h3>
              <ul class="space-y-2">
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>6-7 pommes (Golden ou Reinette)</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>80g de sucre</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>50g de beurre</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>1 cuillère à café de cannelle</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>1 sachet de sucre vanillé</span>
                </li>
                <li class="flex items-center">
                  <input type="checkbox" class="mr-3 h-5 w-5 text-primary rounded focus:ring-primary">
                  <span>Le jus d'un demi-citron</span>
                </li>
              </ul>
            </div>

            <div class="mt-6">
              <button class="w-full bg-primary/10 text-primary py-2 rounded-lg font-medium hover:bg-primary/20 transition-colors">
                <i class="fas fa-shopping-basket mr-2"></i> Ajouter au panier
              </button>
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
              <div class="flex">
                <div class="flex-shrink-0 mr-4">
                  <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">1</div>
                </div>
                <div>
                  <h3 class="font-bold text-lg mb-2">Préparer la pâte sablée</h3>
                  <p class="text-gray-700">
                    Dans un saladier, mélangez la farine et le sel. Ajoutez le beurre froid coupé en petits morceaux et travaillez du bout des doigts jusqu'à obtenir une texture sableuse. Incorporez le sucre, puis l'œuf battu. Formez une boule, enveloppez-la dans du film alimentaire et réservez au réfrigérateur pendant au moins 30 minutes.
                  </p>
                </div>
              </div>

              <div class="flex">
                <div class="flex-shrink-0 mr-4">
                  <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">2</div>
                </div>
                <div>
                  <h3 class="font-bold text-lg mb-2">Préparer les pommes</h3>
                  <p class="text-gray-700">
                    Épluchez les pommes, retirez les cœurs et coupez-les en fines tranches. Arrosez-les avec le jus de citron pour éviter qu'elles ne noircissent. Dans une poêle, faites fondre 30g de beurre, ajoutez les pommes, 50g de sucre, la cannelle et le sucre vanillé. Faites caraméliser à feu moyen pendant environ 10 minutes en remuant délicatement. Laissez refroidir.
                  </p>
                </div>
              </div>

              <div class="flex">
                <div class="flex-shrink-0 mr-4">
                  <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">3</div>
                </div>
                <div>
                  <h3 class="font-bold text-lg mb-2">Préchauffer le four</h3>
                  <p class="text-gray-700">
                    Préchauffez votre four à 180°C (thermostat 6).
                  </p>
                </div>
              </div>

              <div class="flex">
                <div class="flex-shrink-0 mr-4">
                  <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">4</div>
                </div>
                <div>
                  <h3 class="font-bold text-lg mb-2">Étaler la pâte</h3>
                  <p class="text-gray-700">
                    Sortez la pâte du réfrigérateur et étalez-la sur un plan de travail fariné. Garnissez un moule à tarte beurré avec la pâte et piquez le fond à l'aide d'une fourchette.
                  </p>
                </div>
              </div>

              <div class="flex">
                <div class="flex-shrink-0 mr-4">
                  <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">5</div>
                </div>
                <div>
                  <h3 class="font-bold text-lg mb-2">Garnir la tarte</h3>
                  <p class="text-gray-700">
                    Disposez les pommes caramélisées sur le fond de tarte. Vous pouvez les arranger en cercles concentriques pour un effet plus esthétique. Saupoudrez du reste de sucre et parsemez de petits morceaux du reste de beurre.
                  </p>
                </div>
              </div>

              <div class="flex">
                <div class="flex-shrink-0 mr-4">
                  <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">6</div>
                </div>
                <div>
                  <h3 class="font-bold text-lg mb-2">Cuire la tarte</h3>
                  <p class="text-gray-700">
                    Enfournez la tarte pour 40 à 45 minutes, jusqu'à ce que la pâte soit dorée et les pommes bien caramélisées. Surveillez la cuisson et couvrez éventuellement avec du papier aluminium si le dessus dore trop vite.
                  </p>
                </div>
              </div>

              <div class="flex">
                <div class="flex-shrink-0 mr-4">
                  <div class="bg-primary text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">7</div>
                </div>
                <div>
                  <h3 class="font-bold text-lg mb-2">Servir</h3>
                  <p class="text-gray-700">
                    Laissez refroidir la tarte avant de la démouler. Servez tiède ou à température ambiante, éventuellement accompagnée d'une boule de glace à la vanille ou d'un peu de crème fraîche.
                  </p>
                </div>
              </div>
            </div>

            <div class="mt-8 p-4 bg-primary/10 rounded-lg">
              <h3 class="font-bold text-lg mb-2">Conseils du chef</h3>
              <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li>Pour une version plus gourmande, vous pouvez ajouter une cuillère à soupe de calvados aux pommes pendant la caramélisation.</li>
                <li>Choisissez des pommes à chair ferme qui ne rendront pas trop d'eau à la cuisson.</li>
                <li>Pour un dessus brillant, badigeonnez la tarte de confiture d'abricot chaude à la sortie du four.</li>
              </ul>
            </div>
          </div>

          <!-- Comments Section -->
          <div class="bg-white rounded-xl shadow-md p-6 mt-6">
            <h2 class="text-2xl font-display font-bold mb-6">Commentaires (24)</h2>

            <!-- Comment Form -->
            <div class="mb-8">
              <div class="flex items-start space-x-4">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                  <div class="mb-2">
                    <div class="flex text-yellow-400 mb-1">
                      <i class="fas fa-star cursor-pointer"></i>
                      <i class="fas fa-star cursor-pointer"></i>
                      <i class="fas fa-star cursor-pointer"></i>
                      <i class="fas fa-star cursor-pointer"></i>
                      <i class="far fa-star cursor-pointer"></i>
                    </div>
                  </div>
                  <textarea
                    placeholder="Partagez votre expérience avec cette recette..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                    rows="3"
                  ></textarea>
                  <div class="flex justify-end mt-2">
                    <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">
                      Publier
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Comments List -->
            <div class="space-y-6">
              <!-- Comment 1 -->
              <div class="border-b border-gray-200 pb-6">
                <div class="flex items-start space-x-4">
                  <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User" class="w-10 h-10 rounded-full">
                  <div class="flex-1">
                    <div class="flex justify-between">
                      <h4 class="font-bold">Sophie Martin</h4>
                      <span class="text-gray-500 text-sm">Il y a 2 jours</span>
                    </div>
                    <div class="flex text-yellow-400 my-1">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 mt-1">
                      Recette parfaite ! J'ai suivi les instructions à la lettre et le résultat était délicieux. Toute ma famille a adoré. Je recommande vivement d'ajouter un peu de calvados comme suggéré dans les conseils du chef, ça donne une saveur incroyable.
                    </p>
                    <div class="flex items-center mt-2 text-sm">
                      <button class="text-gray-500 hover:text-primary transition-colors mr-4">
                        <i class="far fa-thumbs-up mr-1"></i> 12
                      </button>
                      <button class="text-gray-500 hover:text-primary transition-colors">
                        <i class="far fa-comment mr-1"></i> Répondre
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Comment 2 -->
              <div class="border-b border-gray-200 pb-6">
                <div class="flex items-start space-x-4">
                  <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="User" class="w-10 h-10 rounded-full">
                  <div class="flex-1">
                    <div class="flex justify-between">
                      <h4 class="font-bold">Thomas Dubois</h4>
                      <span class="text-gray-500 text-sm">Il y a 1 semaine</span>
                    </div>
                    <div class="flex text-yellow-400 my-1">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                    <p class="text-gray-700 mt-1">
                      Très bonne recette, mais j'ai trouvé que le temps de cuisson était un peu long pour mes pommes qui ont un peu trop caramélisé. Je recommande de surveiller attentivement après 35 minutes. Sinon, le goût était excellent et la pâte parfaitement croustillante.
                    </p>
                    <div class="flex items-center mt-2 text-sm">
                      <button class="text-gray-500 hover:text-primary transition-colors mr-4">
                        <i class="far fa-thumbs-up mr-1"></i> 8
                      </button>
                      <button class="text-gray-500 hover:text-primary transition-colors">
                        <i class="far fa-comment mr-1"></i> Répondre
                      </button>
                    </div>

                    <!-- Reply -->
                    <div class="mt-4 ml-8 bg-gray-50 p-4 rounded-lg">
                      <div class="flex items-start space-x-3">
                        <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Chef" class="w-8 h-8 rounded-full">
                        <div>
                          <div class="flex justify-between">
                            <h5 class="font-bold text-primary">Emma Wilson <span class="bg-primary/10 text-primary text-xs px-2 py-1 rounded-full ml-2">Chef</span></h5>
                            <span class="text-gray-500 text-xs">Il y a 6 jours</span>
                          </div>
                          <p class="text-gray-700 text-sm mt-1">
                            Merci pour votre retour, Thomas ! Vous avez raison, le temps de cuisson peut varier selon le type de pommes utilisé. Je vais ajouter cette précision dans la recette.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Comment 3 -->
              <div>
                <div class="flex items-start space-x-4">
                  <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="User" class="w-10 h-10 rounded-full">
                  <div class="flex-1">
                    <div class="flex justify-between">
                      <h4 class="font-bold">Léa Petit</h4>
                      <span class="text-gray-500 text-sm">Il y a 2 semaines</span>
                    </div>
                    <div class="flex text-yellow-400 my-1">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-700 mt-1">
                      J'ai fait cette tarte pour un repas de famille et tout le monde l'a adorée ! J'ai ajouté un peu de noix concassées sur le dessus avant la cuisson pour un petit croquant supplémentaire. Je referai certainement cette recette pour les fêtes de fin d'année !
                    </p>
                    <div class="flex items-center mt-2 text-sm">
                      <button class="text-gray-500 hover:text-primary transition-colors mr-4">
                        <i class="far fa-thumbs-up mr-1"></i> 15
                      </button>
                      <button class="text-gray-500 hover:text-primary transition-colors">
                        <i class="far fa-comment mr-1"></i> Répondre
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-6 text-center">
              <button class="text-primary hover:text-primary/80 font-medium">
                Voir plus de commentaires
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Similar Recipes Section -->
  <section class="py-12 bg-light">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-display font-bold mb-8">Recettes similaires</h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Recipe Card 1 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden group">
          <div class="relative h-48 overflow-hidden">
            <img
              src="https://images.unsplash.com/photo-1562007908-17c67e878c88"
              alt="Crumble aux pommes"
              class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300"
            >
            <div class="absolute top-2 right-2 bg-white px-2 py-1 rounded-full text-xs font-medium">
              Dessert
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-xl mb-2">Crumble aux pommes</h3>
            <div class="flex justify-between items-center mb-4">
              <div class="flex items-center">
                <span class="text-yellow-400">★</span>
                <span class="ml-1 text-gray-700">4.6</span>
              </div>
              <div class="flex items-center text-gray-500 text-sm">
                <i class="far fa-clock mr-1"></i>
                35 min
              </div>
            </div>
            <a href="#" class="block text-center bg-primary/10 text-primary py-2 rounded-lg font-medium hover:bg-primary hover:text-white transition-colors">
              Voir la recette
            </a>
          </div>
        </div>

        <!-- Recipe Card 2 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden group">
          <div class="relative h-48 overflow-hidden">
            <img
              src="https://images.unsplash.com/photo-1464305795204-6f5bbfc7fb81"
              alt="Tarte Tatin"
              class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300"
            >
            <div class="absolute top-2 right-2 bg-white px-2 py-1 rounded-full text-xs font-medium">
              Dessert
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-xl mb-2">Tarte Tatin</h3>
            <div class="flex justify-between items-center mb-4">
              <div class="flex items-center">
                <span class="text-yellow-400">★</span>
                <span class="ml-1 text-gray-700">4.9</span>
              </div>
              <div class="flex items-center text-gray-500 text-sm">
                <i class="far fa-clock mr-1"></i>
                50 min
              </div>
            </div>
            <a href="#" class="block text-center bg-primary/10 text-primary py-2 rounded-lg font-medium hover:bg-primary hover:text-white transition-colors">
              Voir la recette
            </a>
          </div>
        </div>

        <!-- Recipe Card 3 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden group">
          <div class="relative h-48 overflow-hidden">
            <img
              src="https://images.unsplash.com/photo-1551024506-0bccd828d307"
              alt="Chausson aux pommes"
              class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300"
            >
            <div class="absolute top-2 right-2 bg-white px-2 py-1 rounded-full text-xs font-medium">
              Dessert
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-xl mb-2">Chausson aux pommes</h3>
            <div class="flex justify-between items-center mb-4">
              <div class="flex items-center">
                <span class="text-yellow-400">★</span>
                <span class="ml-1 text-gray-700">4.7</span>
              </div>
              <div class="flex items-center text-gray-500 text-sm">
                <i class="far fa-clock mr-1"></i>
                40 min
              </div>
            </div>
            <a href="#" class="block text-center bg-primary/10 text-primary py-2 rounded-lg font-medium hover:bg-primary hover:text-white transition-colors">
              Voir la recette
            </a>
          </div>
        </div>

        <!-- Recipe Card 4 -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden group">
          <div class="relative h-48 overflow-hidden">
            <img
              src="https://images.unsplash.com/photo-1587314168485-3236d6710814"
              alt="Compote de pommes"
              class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-300"
            >
            <div class="absolute top-2 right-2 bg-white px-2 py-1 rounded-full text-xs font-medium">
              Dessert
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-xl mb-2">Compote de pommes</h3>
            <div class="flex justify-between items-center mb-4">
              <div class="flex items-center">
                <span class="text-yellow-400">★</span>
                <span class="ml-1 text-gray-700">4.5</span>
              </div>
              <div class="flex items-center text-gray-500 text-sm">
                <i class="far fa-clock mr-1"></i>
                25 min
              </div>
            </div>
            <a href="#" class="block text-center bg-primary/10 text-primary py-2 rounded-lg font-medium hover:bg-primary hover:text-white transition-colors">
              Voir la recette
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="py-12 bg-primary/10">
    <div class="container mx-auto px-4">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-display font-bold mb-4">Recevez de nouvelles recettes</h2>
        <p class="text-lg mb-6">Abonnez-vous à notre newsletter pour recevoir les dernières recettes, astuces culinaires et informations sur nos compétitions.</p>
        <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
          <input type="email" placeholder="Votre adresse email" class="flex-grow px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
          <button class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors">S'abonner</button>
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
