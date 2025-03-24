<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique - FoodLovers</title>
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
  <!-- Header/Navigation -->
  <header class="bg-white shadow-sm sticky top-0 z-10">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between py-4">
        <!-- Logo -->
        <a href="index.html" class="flex items-center">
          <span class="text-2xl font-display font-bold text-primary">Food<span class="text-dark">Lovers</span></span>
        </a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center space-x-8">
          <a href="index.html" class="text-dark hover:text-primary transition-colors">Accueil</a>
          <a href="#" class="text-dark hover:text-primary transition-colors">Recettes</a>
          <a href="#" class="text-dark hover:text-primary transition-colors">Compétitions</a>
          <a href="shop.html" class="text-primary font-medium">Boutique</a>
          <a href="#" class="text-dark hover:text-primary transition-colors">Blog</a>
          <a href="#" class="text-dark hover:text-primary transition-colors">À propos</a>
        </nav>

        <!-- User Actions -->
        <div class="flex items-center space-x-4">
          <a href="#" class="text-dark hover:text-primary transition-colors">
            <i class="fas fa-search"></i>
          </a>
          <a href="/panier" class="text-dark hover:text-primary transition-colors relative">
            <i class="fas fa-shopping-cart"></i>
            <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
          </a>
          <a href="#" class="text-dark hover:text-primary transition-colors">
            <i class="fas fa-user"></i>
          </a>

          <!-- Mobile Menu Button -->
          <button id="mobile-menu-button" class="md:hidden text-dark hover:text-primary transition-colors">
            <i class="fas fa-bars text-xl"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="md:hidden bg-white shadow-sm hidden">
      <div class="container mx-auto px-4 py-3">
        <nav class="flex flex-col space-y-3">
          <a href="index.html" class="text-dark hover:text-primary transition-colors py-2">Accueil</a>
          <a href="#" class="text-dark hover:text-primary transition-colors py-2">Recettes</a>
          <a href="#" class="text-dark hover:text-primary transition-colors py-2">Compétitions</a>
          <a href="shop.html" class="text-primary font-medium py-2">Boutique</a>
          <a href="#" class="text-dark hover:text-primary transition-colors py-2">Blog</a>
          <a href="#" class="text-dark hover:text-primary transition-colors py-2">À propos</a>
        </nav>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-primary/10 to-secondary/10 py-12">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Notre Boutique</h1>
        <p class="text-lg max-w-2xl mb-8">Découvrez notre sélection d'ustensiles, livres de cuisine et accessoires pour vous aider à réaliser vos meilleures recettes.</p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="#ustensiles" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors">Ustensiles</a>
          <a href="#livres" class="bg-secondary text-white px-6 py-3 rounded-lg hover:bg-secondary/90 transition-colors">Livres</a>
          <a href="#ingredients" class="bg-accent text-dark px-6 py-3 rounded-lg hover:bg-accent/90 transition-colors">Ingrédients</a>
          <a href="#accessoires" class="bg-dark text-white px-6 py-3 rounded-lg hover:bg-dark/90 transition-colors">Accessoires</a>
        </div>
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

  <!-- Featured Products -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-display font-bold mb-8">Produits Populaires</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Product Card 1 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1556911073-38141963c9e0" alt="Couteau de chef" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
              En stock
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <span class="text-xs text-gray-500 uppercase">Ustensiles</span>
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Couteau de Chef Professionnel</a>
            </h3>
            <div class="flex items-center mb-2">
              <span class="text-yellow-400 text-sm">★★★★</span><span class="text-yellow-400 text-sm">★</span>
              <span class="ml-1 text-xs text-gray-600">(4.9)</span>
            </div>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">89,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 2 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1588867702719-969c8c11574d" alt="Livre de recettes" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
              En stock
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <span class="text-xs text-gray-500 uppercase">Livres</span>
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Livre "Cuisine du Monde"</a>
            </h3>
            <div class="flex items-center mb-2">
              <span class="text-yellow-400 text-sm">★★★★</span><span class="text-gray-300 text-sm">★</span>
              <span class="ml-1 text-xs text-gray-600">(4.2)</span>
            </div>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">29,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 3 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1591261730799-ee4e6c2d1b75" alt="Moule à gâteau" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute top-2 right-2 bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-full">
              Stock faible
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <span class="text-xs text-gray-500 uppercase">Ustensiles</span>
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Moule à Gâteau Silicone Premium</a>
            </h3>
            <div class="flex items-center mb-2">
              <span class="text-yellow-400 text-sm">★★★</span><span class="text-gray-300 text-sm">★★</span>
              <span class="ml-1 text-xs text-gray-600">(3.5)</span>
            </div>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">19,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 4 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246" alt="Tablier" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
              En stock
            </div>
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <span class="text-xs text-gray-500 uppercase">Accessoires</span>
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Tablier de Cuisine Professionnel</a>
            </h3>
            <div class="flex items-center mb-2">
              <span class="text-yellow-400 text-sm">★★★★</span><span class="text-yellow-400 text-sm">★</span>
              <span class="ml-1 text-xs text-gray-600">(4.8)</span>
            </div>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">24,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
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
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1556911073-38141963c9e0" alt="Couteau de chef" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Couteau de Chef Professionnel</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">89,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 2 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1591261730799-ee4e6c2d1b75" alt="Moule à gâteau" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Moule à Gâteau Silicone Premium</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">19,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 3 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1607490398539-e8f81b7a59fc" alt="Balance de cuisine" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Balance de Cuisine Numérique</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">14,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 4 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1594731804133-9c107d7a8c1d" alt="Set de casseroles" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Set de Casseroles Inox</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">129,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Livres Section -->
  <section id="livres" class="py-12">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-display font-bold">Livres de Cuisine</h2>
        <a href="#" class="text-primary hover:underline">Voir tout <i class="fas fa-arrow-right ml-1"></i></a>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Product Card 1 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1588867702719-969c8c11574d" alt="Livre de recettes" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Livre "Cuisine du Monde"</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">29,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 2 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f" alt="Livre de pâtisserie" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">L'Art de la Pâtisserie</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">34,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 3 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1589998059171-988d887df646" alt="Livre de cuisine végétarienne" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Cuisine Végétarienne</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">27,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>

        <!-- Product Card 4 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1603659514658-59e2c3d4e4b3" alt="Livre de cuisine rapide" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="cart.html" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Recettes Express</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">22,99 €</div>
              <a href="cart.html" class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Promo Banner -->
  <section class="py-12 bg-gradient-to-r from-primary to-secondary text-white">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center justify-between">
        <div class="mb-6 md:mb-0 md:w-1/2">
          <h2 class="text-3xl font-display font-bold mb-4">Offre Spéciale</h2>
          <p class="text-lg mb-6">Profitez de 15% de réduction sur tous les ustensiles de cuisine premium avec le code <span class="font-bold">FOODLOVE15</span></p>
          <a href="/panier" class="bg-white text-primary px-6 py-3 rounded-lg hover:bg-light transition-colors inline-block">En profiter maintenant</a>
        </div>
        <div class="md:w-1/2">
          <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d" alt="Ustensiles de cuisine" class="rounded-lg shadow-lg max-h-80 w-full object-cover">
        </div>
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

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-display font-bold mb-4">FoodLovers</h3>
          <p class="text-gray-400 mb-4">Votre destination pour tout ce qui concerne la cuisine et la gastronomie.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors">
              <i class="fab fa-pinterest"></i>
            </a>
          </div>
        </div>
        <div>
          <h4 class="text-lg font-bold mb-4">Liens Rapides</h4>
          <ul class="space-y-2">
            <li><a href="index.html" class="text-gray-400 hover:text-white transition-colors">Accueil</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Recettes</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Compétitions</a></li>
            <li><a href="shop.html" class="text-gray-400 hover:text-white transition-colors">Boutique</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-bold mb-4">Catégories</h4>
          <ul class="space-y-2">
            <li><a href="#ustensiles" class="text-gray-400 hover:text-white transition-colors">Ustensiles</a></li>
            <li><a href="#livres" class="text-gray-400 hover:text-white transition-colors">Livres</a></li>
            <li><a href="#ingredients" class="text-gray-400 hover:text-white transition-colors">Ingrédients</a></li>
            <li><a href="#accessoires" class="text-gray-400 hover:text-white transition-colors">Accessoires</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-bold mb-4">Contact</h4>
          <ul class="space-y-2 text-gray-400">
            <li><i class="fas fa-map-marker-alt mr-2"></i> 123 Rue de la Cuisine, Paris</li>
            <li><i class="fas fa-phone mr-2"></i> +33 1 23 45 67 89</li>
            <li><i class="fas fa-envelope mr-2"></i> contact@foodlovers.com</li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 mb-4 md:mb-0">© 2025 FoodLovers. Tous droits réservés.</p>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-white transition-colors">Conditions d'utilisation</a>
          <a href="#" class="text-gray-400 hover:text-white transition-colors">Politique de confidentialité</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript -->
  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
