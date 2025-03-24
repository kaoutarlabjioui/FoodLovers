<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compétitions Culinaires - FoodLovers</title>
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

    /* Scrollbar styling */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
      background: #c5c5c5;
      border-radius: 3px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #a8a8a8;
    }
  </style>
</head>
<body class="font-sans bg-light text-dark">
  <!-- Header -->
  <header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between h-20">
        <!-- Logo -->
        <a href="index.html" class="flex items-center">
          <span class="text-2xl font-display font-bold text-primary">Food<span class="text-dark">Lovers</span></span>
        </a>

        <!-- Navigation - Desktop -->
        <nav class="hidden md:flex items-center space-x-8">
          <a href="index.html" class="text-dark hover:text-primary transition-colors">Accueil</a>
          <a href="recipes.html" class="text-dark hover:text-primary transition-colors">Recettes</a>
          <a href="competitions.html" class="text-primary font-medium">Compétitions</a>
          <a href="shop.html" class="text-dark hover:text-primary transition-colors">Boutique</a>
          <a href="blog.html" class="text-dark hover:text-primary transition-colors">Blog</a>
          <a href="about.html" class="text-dark hover:text-primary transition-colors">À propos</a>
        </nav>

        <!-- Right Header Items -->
        <div class="flex items-center space-x-4">
          <a href="#" class="text-dark hover:text-primary transition-colors hidden md:block">
            <i class="fas fa-search text-xl"></i>
          </a>
          <a href="cart.html" class="text-dark hover:text-primary transition-colors relative">
            <i class="fas fa-shopping-cart text-xl"></i>
            <span class="absolute -top-1 -right-1 bg-primary text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
          </a>
          <a href="login.html" class="hidden md:flex items-center text-dark hover:text-primary transition-colors">
            <i class="fas fa-user text-xl mr-2"></i>
            <span>Connexion</span>
          </a>

          <!-- Mobile Menu Button -->
          <button id="mobile-menu-button" class="md:hidden text-dark hover:text-primary transition-colors">
            <i class="fas fa-bars text-2xl"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden bg-white shadow-md fixed inset-0 z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
      <div class="flex flex-col h-full">
        <div class="flex items-center justify-between p-4 border-b">
          <span class="text-2xl font-display font-bold text-primary">Food<span class="text-dark">Lovers</span></span>
          <button id="close-menu-button" class="text-dark hover:text-primary transition-colors">
            <i class="fas fa-times text-2xl"></i>
          </button>
        </div>
        <nav class="flex-1 overflow-y-auto p-4">
          <ul class="space-y-4">
            <li><a href="index.html" class="block p-2 text-dark hover:text-primary transition-colors">Accueil</a></li>
            <li><a href="recipes.html" class="block p-2 text-dark hover:text-primary transition-colors">Recettes</a></li>
            <li><a href="competitions.html" class="block p-2 text-primary font-medium">Compétitions</a></li>
            <li><a href="shop.html" class="block p-2 text-dark hover:text-primary transition-colors">Boutique</a></li>
            <li><a href="blog.html" class="block p-2 text-dark hover:text-primary transition-colors">Blog</a></li>
            <li><a href="about.html" class="block p-2 text-dark hover:text-primary transition-colors">À propos</a></li>
            <li class="border-t pt-4 mt-4">
              <a href="login.html" class="flex items-center p-2 text-dark hover:text-primary transition-colors">
                <i class="fas fa-user mr-2"></i>
                <span>Connexion</span>
              </a>
            </li>
            <li>
              <a href="register.html" class="flex items-center p-2 text-dark hover:text-primary transition-colors">
                <i class="fas fa-user-plus mr-2"></i>
                <span>Inscription</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="relative bg-dark text-white">
    <div class="absolute inset-0 overflow-hidden">
      <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d" alt="Compétition culinaire" class="w-full h-full object-cover opacity-40">
    </div>
    <div class="container mx-auto px-4 py-20 relative">
      <div class="max-w-2xl">
        <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Compétitions Culinaires</h1>
        <p class="text-lg mb-8">Participez à nos compétitions culinaires, montrez votre talent et gagnez des prix exceptionnels. Que vous soyez amateur ou professionnel, il y a une compétition pour vous !</p>
        <div class="flex flex-col sm:flex-row gap-4">
          <a href="#competitions-en-cours" class="bg-primary hover:bg-primary/90 text-white font-medium py-3 px-6 rounded-lg transition-colors inline-flex items-center justify-center">
            <i class="fas fa-trophy mr-2"></i>
            Compétitions en cours
          </a>
          <a href="#inscription" class="bg-white hover:bg-gray-100 text-dark font-medium py-3 px-6 rounded-lg transition-colors inline-flex items-center justify-center">
            <i class="fas fa-user-plus mr-2"></i>
            S'inscrire
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-display font-bold mb-4">Comment ça marche ?</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Participer à nos compétitions est simple et amusant. Suivez ces étapes pour commencer votre aventure culinaire.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Step 1 -->
        <div class="text-center">
          <div class="w-16 h-16 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-user-plus text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-2">1. Inscrivez-vous</h3>
          <p class="text-gray-600">Créez un compte ou connectez-vous pour vous inscrire à une compétition qui vous intéresse.</p>
        </div>

        <!-- Step 2 -->
        <div class="text-center">
          <div class="w-16 h-16 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-utensils text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-2">2. Cuisinez</h3>
          <p class="text-gray-600">Préparez votre recette selon le thème de la compétition et prenez de belles photos.</p>
        </div>

        <!-- Step 3 -->
        <div class="text-center">
          <div class="w-16 h-16 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-upload text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold mb-2">3. Partagez</h3>
          <p class="text-gray-600">Soumettez votre création sur notre plateforme avant la date limite de la compétition.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Current Competitions Section -->
  <section id="competitions-en-cours" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-display font-bold mb-4">Compétitions en cours</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Découvrez nos compétitions actuellement ouvertes aux inscriptions et participations.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Competition 1 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187" alt="Desserts d'été" class="w-full h-48 object-cover">
            <div class="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
              En cours
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Desserts d'été</h3>
            <p class="text-gray-600 mb-4">Créez un dessert rafraîchissant parfait pour les chaudes journées d'été.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>15/06/2025 - 30/06/2025</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-users mr-2"></i>
              <span>48 participants</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-6">
              <i class="fas fa-trophy mr-2"></i>
              <span>1er prix: 500€ + Ustensiles</span>
            </div>
            <a href="competition-details.html" class="block w-full bg-primary hover:bg-primary/90 text-white text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les détails
            </a>
          </div>
        </div>

        <!-- Competition 2 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1547592180-85f173990554" alt="Plats végétariens créatifs" class="w-full h-48 object-cover">
            <div class="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
              En cours
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Plats végétariens créatifs</h3>
            <p class="text-gray-600 mb-4">Réinventez la cuisine végétarienne avec des plats innovants et savoureux.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>01/07/2025 - 15/07/2025</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-users mr-2"></i>
              <span>32 participants</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-6">
              <i class="fas fa-trophy mr-2"></i>
              <span>1er prix: 300€ + Livre de cuisine</span>
            </div>
            <a href="competition-details.html" class="block w-full bg-primary hover:bg-primary/90 text-white text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les détails
            </a>
          </div>
        </div>

        <!-- Competition 3 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e" alt="Pâtisseries traditionnelles" class="w-full h-48 object-cover">
            <div class="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
              En cours
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Pâtisseries traditionnelles</h3>
            <p class="text-gray-600 mb-4">Revisitez les classiques de la pâtisserie avec votre touche personnelle.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>10/07/2025 - 25/07/2025</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-users mr-2"></i>
              <span>56 participants</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-6">
              <i class="fas fa-trophy mr-2"></i>
              <span>1er prix: 400€ + Cours de pâtisserie</span>
            </div>
            <a href="competition-details.html" class="block w-full bg-primary hover:bg-primary/90 text-white text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les détails
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Upcoming Competitions Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-display font-bold mb-4">Compétitions à venir</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Préparez-vous pour nos prochaines compétitions. Inscrivez-vous dès maintenant pour être notifié de leur ouverture.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Upcoming Competition 1 -->
        <div class="flex flex-col md:flex-row bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="md:w-1/3">
            <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b" alt="Smoothies créatifs" class="w-full h-full object-cover">
          </div>
          <div class="md:w-2/3 p-6">
            <div class="flex justify-between items-start mb-2">
              <h3 class="text-xl font-bold">Smoothies créatifs</h3>
              <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2 py-1 rounded-full">À venir</span>
            </div>
            <p class="text-gray-600 mb-4">Créez des smoothies originaux et nutritifs avec des ingrédients de saison.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>01/08/2025 - 15/08/2025</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-trophy mr-2"></i>
              <span>1er prix: 250€ + Blender professionnel</span>
            </div>
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
              <i class="fas fa-bell mr-2"></i>
              Me notifier
            </button>
          </div>
        </div>

        <!-- Upcoming Competition 2 -->
        <div class="flex flex-col md:flex-row bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="md:w-1/3">
            <img src="https://images.unsplash.com/photo-1555126634-323283e090fa" alt="Cuisine asiatique fusion" class="w-full h-full object-cover">
          </div>
          <div class="md:w-2/3 p-6">
            <div class="flex justify-between items-start mb-2">
              <h3 class="text-xl font-bold">Cuisine asiatique fusion</h3>
              <span class="bg-blue-100 text-blue-800 text-xs font-bold px-2 py-1 rounded-full">À venir</span>
            </div>
            <p class="text-gray-600 mb-4">Mélangez les traditions culinaires asiatiques avec d'autres cuisines du monde.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>15/08/2025 - 30/08/2025</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-trophy mr-2"></i>
              <span>1er prix: 350€ + Set de couteaux japonais</span>
            </div>
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors inline-flex items-center">
              <i class="fas fa-bell mr-2"></i>
              Me notifier
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Past Competitions Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-display font-bold mb-4">Compétitions passées</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Découvrez les gagnants et les créations exceptionnelles de nos compétitions précédentes.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Past Competition 1 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1506368249639-73a05d6f6488" alt="Cuisine méditerranéenne" class="w-full h-48 object-cover opacity-80">
            <div class="absolute inset-0 bg-dark bg-opacity-30 flex items-center justify-center">
              <span class="bg-white text-dark text-sm font-bold px-3 py-1 rounded-full">Terminée</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Cuisine méditerranéenne</h3>
            <p class="text-gray-600 mb-4">Les saveurs ensoleillées de la Méditerranée dans votre assiette.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>01/05/2025 - 15/05/2025</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-users mr-2"></i>
              <span>64 participants</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-6">
              <i class="fas fa-crown text-yellow-500 mr-2"></i>
              <span class="font-medium">Gagnant: Marie Dupont</span>
            </div>
            <a href="competition-results.html" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les résultats
            </a>
          </div>
        </div>

        <!-- Past Competition 2 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1482049016688-2d3e1b311543" alt="Cuisine de fête" class="w-full h-48 object-cover opacity-80">
            <div class="absolute inset-0 bg-dark bg-opacity-30 flex items-center justify-center">
              <span class="bg-white text-dark text-sm font-bold px-3 py-1 rounded-full">Terminée</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Cuisine de fête</h3>
            <p class="text-gray-600 mb-4">Des plats festifs pour impressionner vos invités lors des grandes occasions.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>01/04/2025 - 15/04/2025</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-users mr-2"></i>
              <span>78 participants</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-6">
              <i class="fas fa-crown text-yellow-500 mr-2"></i>
              <span class="font-medium">Gagnant: Thomas Martin</span>
            </div>
            <a href="competition-results.html" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les résultats
            </a>
          </div>
        </div>

        <!-- Past Competition 3 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1515003197210-e0cd71810b5f" alt="Cuisine zéro déchet" class="w-full h-48 object-cover opacity-80">
            <div class="absolute inset-0 bg-dark bg-opacity-30 flex items-center justify-center">
              <span class="bg-white text-dark text-sm font-bold px-3 py-1 rounded-full">Terminée</span>
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Cuisine zéro déchet</h3>
            <p class="text-gray-600 mb-4">Des recettes écologiques qui utilisent tous les ingrédients sans gaspillage.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>01/03/2025 - 15/03/2025</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-users mr-2"></i>
              <span>52 participants</span>
            </div>
            <div class="flex items-center text-sm text-gray-500 mb-6">
              <i class="fas fa-crown text-yellow-500 mr-2"></i>
              <span class="font-medium">Gagnant: Sophie Leroy</span>
            </div>
            <a href="competition-results.html" class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-700 text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les résultats
            </a>
          </div>
        </div>
      </div>

      <div class="text-center mt-8">
        <a href="past-competitions.html" class="inline-flex items-center text-primary hover:text-primary/80 font-medium">
          Voir toutes les compétitions passées
          <i class="fas fa-arrow-right ml-2"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-display font-bold mb-4">Témoignages des gagnants</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Découvrez ce que nos précédents gagnants ont à dire sur leur expérience.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Testimonial 1 -->
        <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
          <div class="flex items-center mb-4">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" alt="Sophie Martin" class="w-16 h-16 rounded-full object-cover mr-4">
            <div>
              <h3 class="font-bold text-lg">Sophie Martin</h3>
              <p class="text-gray-600">Gagnante "Desserts d'été 2024"</p>
            </div>
          </div>
          <p class="text-gray-700 italic mb-4">"Participer à cette compétition a été une expérience incroyable. J'ai pu repousser mes limites créatives et rencontrer d'autres passionnés de cuisine. Le prix était fantastique, mais c'est surtout la reconnaissance et les retours positifs qui m'ont touchée."</p>
          <div class="flex items-center">
            <div class="text-yellow-400">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <span class="ml-2 text-sm text-gray-600">Il y a 3 mois</span>
          </div>
        </div>

        <!-- Testimonial 2 -->
        <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
          <div class="flex items-center mb-4">
            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e" alt="Thomas Dubois" class="w-16 h-16 rounded-full object-cover mr-4">
            <div>
              <h3 class="font-bold text-lg">Thomas Dubois</h3>
              <p class="text-gray-600">Gagnant "Cuisine de fête 2024"</p>
            </div>
          </div>
          <p class="text-gray-700 italic mb-4">"Grâce à FoodLovers, j'ai pu partager ma passion pour la cuisine avec une communauté bienveillante. La compétition était relevée, mais l'ambiance restait conviviale. Les conseils des juges m'ont permis de progresser et d'améliorer mes techniques."</p>
          <div class="flex items-center">
            <div class="text-yellow-400">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <span class="ml-2 text-sm text-gray-600">Il y a 4 mois</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Registration Section -->
  <section id="inscription" class="py-16 bg-primary/5">
    <div class="container mx-auto px-4">
      <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="md:flex">
          <div class="md:w-1/2 p-8">
            <h2 class="text-2xl font-display font-bold mb-4">Rejoignez nos compétitions</h2>
            <p class="text-gray-600 mb-6">Inscrivez-vous pour participer à nos compétitions culinaires et montrer votre talent au monde entier.</p>
            <form>
              <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
              </div>
              <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
              </div>
              <div class="mb-4">
                <label for="competition" class="block text-sm font-medium text-gray-700 mb-1">Compétition</label>
                <select id="competition" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                  <option value="">Sélectionnez une compétition</option>
                  <option value="desserts">Desserts d'été</option>
                  <option value="vegetarian">Plats végétariens créatifs</option>
                  <option value="pastry">Pâtisseries traditionnelles</option>
                </select>
              </div>
              <div class="mb-6">
                <label for="experience" class="block text-sm font-medium text-gray-700 mb-1">Niveau d'expérience</label>
                <select id="experience" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                  <option value="">Sélectionnez votre niveau</option>
                  <option value="beginner">Débutant</option>
                  <option value="intermediate">Intermédiaire</option>
                  <option value="advanced">Avancé</option>
                  <option value="professional">Professionnel</option>
                </select>
              </div>
              <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                S'inscrire maintenant
              </button>
            </form>
          </div>
          <div class="md:w-1/2 bg-dark">
            <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba" alt="Compétition de cuisine" class="w-full h-full object-cover opacity-80">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-display font-bold mb-4">Questions fréquentes</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Tout ce que vous devez savoir sur nos compétitions culinaires.</p>
      </div>

      <div class="max-w-3xl mx-auto">
        <div class="space-y-4">
          <!-- FAQ Item 1 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Qui peut participer aux compétitions ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">Tout le monde peut participer ! Nos compétitions sont ouvertes aux amateurs comme aux professionnels. Certaines compétitions peuvent avoir des catégories spécifiques selon le niveau d'expérience.</p>
            </div>
          </div>

          <!-- FAQ Item 2 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Comment les gagnants sont-ils sélectionnés ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">Les créations sont évaluées par un jury composé de chefs professionnels et d'experts culinaires. Les critères incluent l'originalité, la présentation, le respect du thème et, bien sûr, le goût (évalué sur la base de la recette et de la technique).</p>
            </div>
          </div>

          <!-- FAQ Item 3 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Y a-t-il des frais d'inscription ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">La plupart de nos compétitions sont gratuites. Certaines compétitions spéciales peuvent avoir des frais d'inscription symboliques qui sont généralement reversés à des associations caritatives.</p>
            </div>
          </div>

          <!-- FAQ Item 4 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Comment soumettre ma création ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">Après vous être inscrit à une compétition, vous pourrez soumettre votre création via votre espace personnel sur notre site. Vous devrez fournir des photos de votre plat, la recette détaillée et une brève description de votre démarche créative.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="py-16 bg-primary/10">
    <div class="container mx-auto px-4">
      <div class="max-w-2xl mx-auto text-center">
        <h2 class="text-2xl font-display font-bold mb-4">Restez informé</h2>
        <p class="text-gray-600 mb-6">Inscrivez-vous à notre newsletter pour être informé des nouvelles compétitions et ne rien manquer.</p>
        <form class="flex flex-col sm:flex-row gap-2">
          <input type="email" placeholder="Votre adresse email" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
          <button type="submit" class="bg-primary hover:bg-primary/90 text-white font-medium py-3 px-6 rounded-lg transition-colors">
            S'abonner
          </button>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo and About -->
        <div>
          <a href="index.html" class="inline-block mb-4">
            <span class="text-2xl font-display font-bold text-primary">Food<span class="text-white">Lovers</span></span>
          </a>
          <p class="text-gray-400 mb-4">La communauté des passionnés de cuisine qui partagent, apprennent et s'inspirent mutuellement.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
              <i class="fab fa-pinterest"></i>
            </a>
          </div>
        </div>

        <!-- Quick Links -->
        <div>
          <h3 class="text-lg font-bold mb-4">Liens rapides</h3>
          <ul class="space-y-2">
            <li><a href="index.html" class="text-gray-400 hover:text-white transition-colors">Accueil</a></li>
            <li><a href="recipes.html" class="text-gray-400 hover:text-white transition-colors">Recettes</a></li>
            <li><a href="competitions.html" class="text-gray-400 hover:text-white transition-colors">Compétitions</a></li>
            <li><a href="shop.html" class="text-gray-400 hover:text-white transition-colors">Boutique</a></li>
            <li><a href="blog.html" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
            <li><a href="about.html" class="text-gray-400 hover:text-white transition-colors">À propos</a></li>
          </ul>
        </div>

        <!-- Categories -->
        <div>
          <h3 class="text-lg font-bold mb-4">Catégories</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Entrées</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Plats principaux</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Desserts</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Boissons</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Végétarien</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Vegan</a></li>
          </ul>
        </div>

        <!-- Contact -->
        <div>
          <h3 class="text-lg font-bold mb-4">Contact</h3>
          <ul class="space-y-2">
            <li class="flex items-start">
              <i class="fas fa-map-marker-alt mt-1 mr-2 text-primary"></i>
              <span class="text-gray-400">123 Rue de la Cuisine, 75001 Paris, France</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-phone mr-2 text-primary"></i>
              <span class="text-gray-400">+33 1 23 45 67 89</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-envelope mr-2 text-primary"></i>
              <span class="text-gray-400">contact@foodlovers.com</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2025 FoodLovers. Tous droits réservés.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Conditions d'utilisation</a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Politique de confidentialité</a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Cookies</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      document.getElementById('mobile-menu').classList.remove('translate-x-full');
    });

    document.getElementById('close-menu-button').addEventListener('click', function() {
      document.getElementById('mobile-menu').classList.add('translate-x-full');
    });

    // FAQ toggle
    document.querySelectorAll('.border.border-gray-200.rounded-lg button').forEach(button => {
      button.addEventListener('click', () => {
        const content = button.nextElementSibling;
        content.style.display = content.style.display === 'none' ? 'block' : 'none';
        button.querySelector('i').classList.toggle('fa-chevron-down');
        button.querySelector('i').classList.toggle('fa-chevron-up');
      });
    });
  </script>
</body>
</html>
