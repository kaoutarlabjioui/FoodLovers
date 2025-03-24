<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panier - FoodLovers</title>
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
          <a href="index" class="text-dark hover:text-primary transition-colors">Accueil</a>
          <a href="#" class="text-dark hover:text-primary transition-colors">Recettes</a>
          <a href="#" class="text-dark hover:text-primary transition-colors">Compétitions</a>
          <a href="/boutique" class="text-dark hover:text-primary transition-colors">Boutique</a>
          <a href="#" class="text-dark hover:text-primary transition-colors">Blog</a>
          <a href="#" class="text-dark hover:text-primary transition-colors">À propos</a>
        </nav>

        <!-- User Actions -->
        <div class="flex items-center space-x-4">
          <a href="#" class="text-dark hover:text-primary transition-colors">
            <i class="fas fa-search"></i>
          </a>
          <a href="cart.html" class="text-primary transition-colors relative">
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
          <a href="shop.html" class="text-dark hover:text-primary transition-colors py-2">Boutique</a>
          <a href="#" class="text-dark hover:text-primary transition-colors py-2">Blog</a>
          <a href="#" class="text-dark hover:text-primary transition-colors py-2">À propos</a>
        </nav>
      </div>
    </div>
  </header>

  <!-- Page Title -->
  <section class="bg-gradient-to-r from-primary/10 to-secondary/10 py-8">
    <div class="container mx-auto px-4">
      <h1 class="text-3xl md:text-4xl font-display font-bold text-center">Votre Panier</h1>
    </div>
  </section>

  <!-- Cart Content -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row gap-8">
        <!-- Cart Items -->
        <div class="lg:w-2/3">
          <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
            <div class="p-4 border-b">
              <h2 class="text-xl font-bold">Articles dans votre panier (3)</h2>
            </div>

            <!-- Cart Item 1 -->
            <div class="p-4 border-b flex flex-col sm:flex-row items-center gap-4">
              <div class="sm:w-24 h-24 flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1556911073-38141963c9e0" alt="Couteau de chef" class="w-full h-full object-cover rounded-md">
              </div>
              <div class="flex-1">
                <h3 class="font-bold text-lg mb-1">Couteau de Chef Professionnel</h3>
                <p class="text-gray-500 text-sm mb-2">Catégorie: Ustensiles</p>
                <div class="flex flex-wrap items-center gap-4">
                  <div class="flex items-center border rounded-md">
                    <button class="px-3 py-1 text-gray-600 hover:text-primary transition-colors">
                      <i class="fas fa-minus"></i>
                    </button>
                    <span class="px-3 py-1 border-x">1</span>
                    <button class="px-3 py-1 text-gray-600 hover:text-primary transition-colors">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <div class="text-lg font-bold text-primary">89,99 €</div>
                </div>
              </div>
              <div class="flex items-center gap-2">
                <button class="text-gray-400 hover:text-primary transition-colors">
                  <i class="fas fa-heart"></i>
                </button>
                <button class="text-gray-400 hover:text-red-500 transition-colors">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </div>

            <!-- Cart Item 2 -->
            <div class="p-4 border-b flex flex-col sm:flex-row items-center gap-4">
              <div class="sm:w-24 h-24 flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1588867702719-969c8c11574d" alt="Livre de recettes" class="w-full h-full object-cover rounded-md">
              </div>
              <div class="flex-1">
                <h3 class="font-bold text-lg mb-1">Livre "Cuisine du Monde"</h3>
                <p class="text-gray-500 text-sm mb-2">Catégorie: Livres</p>
                <div class="flex flex-wrap items-center gap-4">
                  <div class="flex items-center border rounded-md">
                    <button class="px-3 py-1 text-gray-600 hover:text-primary transition-colors">
                      <i class="fas fa-minus"></i>
                    </button>
                    <span class="px-3 py-1 border-x">1</span>
                    <button class="px-3 py-1 text-gray-600 hover:text-primary transition-colors">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <div class="text-lg font-bold text-primary">29,99 €</div>
                </div>
              </div>
              <div class="flex items-center gap-2">
                <button class="text-gray-400 hover:text-primary transition-colors">
                  <i class="fas fa-heart"></i>
                </button>
                <button class="text-gray-400 hover:text-red-500 transition-colors">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </div>

            <!-- Cart Item 3 -->
            <div class="p-4 flex flex-col sm:flex-row items-center gap-4">
              <div class="sm:w-24 h-24 flex-shrink-0">
                <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246" alt="Tablier" class="w-full h-full object-cover rounded-md">
              </div>
              <div class="flex-1">
                <h3 class="font-bold text-lg mb-1">Tablier de Cuisine Professionnel</h3>
                <p class="text-gray-500 text-sm mb-2">Catégorie: Accessoires</p>
                <div class="flex flex-wrap items-center gap-4">
                  <div class="flex items-center border rounded-md">
                    <button class="px-3 py-1 text-gray-600 hover:text-primary transition-colors">
                      <i class="fas fa-minus"></i>
                    </button>
                    <span class="px-3 py-1 border-x">1</span>
                    <button class="px-3 py-1 text-gray-600 hover:text-primary transition-colors">
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                  <div class="text-lg font-bold text-primary">24,99 €</div>
                </div>
              </div>
              <div class="flex items-center gap-2">
                <button class="text-gray-400 hover:text-primary transition-colors">
                  <i class="fas fa-heart"></i>
                </button>
                <button class="text-gray-400 hover:text-red-500 transition-colors">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Cart Actions -->
          <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2">
              <input type="text" placeholder="Code promo" class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
              <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 transition-colors">Appliquer</button>
            </div>
            <div class="flex items-center gap-4">
              <a href="shop.html" class="text-primary hover:underline flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Continuer les achats
              </a>
              <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                Mettre à jour le panier
              </button>
            </div>
          </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:w-1/3">
          <div class="bg-white rounded-lg shadow-sm overflow-hidden sticky top-24">
            <div class="p-4 border-b">
              <h2 class="text-xl font-bold">Récapitulatif de la commande</h2>
            </div>
            <div class="p-4">
              <div class="space-y-3 mb-6">
                <div class="flex justify-between">
                  <span class="text-gray-600">Sous-total</span>
                  <span class="font-medium">144,97 €</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-600">Frais de livraison</span>
                  <span class="font-medium">5,99 €</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-600">Remise</span>
                  <span class="font-medium text-green-600">-0,00 €</span>
                </div>
                <div class="border-t pt-3 flex justify-between">
                  <span class="font-bold">Total</span>
                  <span class="font-bold text-primary text-xl">150,96 €</span>
                </div>
              </div>

              <button class="w-full bg-primary text-white py-3 rounded-lg hover:bg-primary/90 transition-colors mb-4">
                Procéder au paiement
              </button>

              <div class="flex justify-center space-x-2 mb-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" alt="Visa" class="h-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" alt="Mastercard" class="h-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1280px-PayPal.svg.png" alt="PayPal" class="h-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Apple_Pay_logo.svg/1280px-Apple_Pay_logo.svg.png" alt="Apple Pay" class="h-6">
              </div>

              <div class="text-sm text-gray-500 text-center">
                <p>Nous acceptons les retours sous 30 jours.</p>
                <p>Livraison gratuite à partir de 75€ d'achat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- You Might Also Like -->
  <section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-display font-bold mb-8">Vous pourriez aussi aimer</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Product Card 1 -->
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
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </button>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Balance de Cuisine Numérique</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">14,99 €</div>
              <button class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </button>
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
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </button>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">L'Art de la Pâtisserie</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">34,99 €</div>
              <button class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </button>
            </div>
          </div>
        </div>

        <!-- Product Card 3 -->
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
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </button>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Moule à Gâteau Silicone Premium</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">19,99 €</div>
              <button class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </button>
            </div>
          </div>
        </div>

        <!-- Product Card 4 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1516594798947-e65505dbb29d" alt="Épices" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-eye"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </button>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">Coffret d'Épices du Monde</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">34,99 €</div>
              <button class="bg-primary text-white px-3 py-1 rounded-lg text-sm hover:bg-primary/90 transition-colors">
                Ajouter au panier
              </button>
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
          <h4 class="text-lg font-bold mb-4">Service Client</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Mon compte</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Suivi de commande</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Aide</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Retours</a></li>
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

    // Quantity buttons
    document.querySelectorAll('.fa-minus').forEach(button => {
      button.parentElement.addEventListener('click', function() {
        const quantityElement = this.nextElementSibling;
        let quantity = parseInt(quantityElement.textContent);
        if (quantity > 1) {
          quantityElement.textContent = quantity - 1;
        }
      });
    });

    document.querySelectorAll('.fa-plus').forEach(button => {
      button.parentElement.addEventListener('click', function() {
        const quantityElement = this.previousElementSibling;
        let quantity = parseInt(quantityElement.textContent);
        quantityElement.textContent = quantity + 1;
      });
    });
  </script>
</body>
</html>
