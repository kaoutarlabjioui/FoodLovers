<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'FoodLovers - Discover Delicious Recipes' }}</title>
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
  @yield('css')
</head>
<body class="font-sans bg-light text-dark">
  <!-- Navigation -->
  <nav class="bg-white shadow-md fixed w-full z-10">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-center py-4">
        <div class="flex items-center">
          <a href="/" class="text-2xl font-display font-bold text-primary">FoodLovers</a>
        </div>
        <div class="hidden md:flex items-center space-x-8">
          <a href="/" class="font-medium hover:text-primary transition-colors">Home</a>
          <a href="/recipes" class="font-medium hover:text-primary transition-colors">Recipes</a>
          <a href="/competition" class="font-medium hover:text-primary transition-colors">Competitions</a>
          <a href="/boutique" class="font-medium hover:text-primary transition-colors">Shop</a>
          <a href="/blog" class="font-medium hover:text-primary transition-colors">Blog</a>
        </div>
        @if (Route::has('login'))
    <div class="flex items-center space-x-4">
        @auth
            @if(auth()->user()->role->role_name == 'admin')
                <a href="{{ url('/dashboard') }}" class="hidden md:block font-medium hover:text-primary transition-colors">Dashboard</a>
            @elseif(auth()->user()->role->role_name == 'user')
                <a href="{{ url('/profile') }}" class="hidden md:block font-medium hover:text-primary transition-colors">Profile</a>
            @endif
            <a href="/logout" class="hidden md:block font-medium text-red-500 hover:text-red-700 transition-colors">Logout</a>
        @else
            <a href="{{ route('login') }}" class="hidden md:block font-medium hover:text-primary transition-colors">Login</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="hidden md:block bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">Sign Up</a>
            @endif
        @endauth
        <button class="md:hidden text-dark" id="mobile-menu-button">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
@endif

      </div>
      <!-- Mobile Menu -->
      <div class="md:hidden hidden" id="mobile-menu">
        <div class="flex flex-col space-y-4 py-4">
          <a href="/" class="font-medium hover:text-primary transition-colors">Home</a>
          <a href="/recipes" class="font-medium hover:text-primary transition-colors">Recipes</a>
          <a href="/competition" class="font-medium hover:text-primary transition-colors">Competitions</a>
          <a href="/shop" class="font-medium hover:text-primary transition-colors">Shop</a>
          <a href="/blog" class="font-medium hover:text-primary transition-colors">Blog</a>
          <a href="/login" class="font-medium hover:text-primary transition-colors">Login</a>
          <a href="/register" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors text-center">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-white py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">FoodLovers</h3>
          <p class="mb-4">Discover, cook, and share amazing recipes with food enthusiasts around the world.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-pinterest"></i></a>
          </div>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="/" class="hover:text-primary transition-colors">Home</a></li>
            <li><a href="/recipes" class="hover:text-primary transition-colors">Recipes</a></li>
            <li><a href="/competition" class="hover:text-primary transition-colors">Competitions</a></li>
            <li><a href="/boutique" class="hover:text-primary transition-colors">Shop</a></li>
            <li><a href="/about" class="hover:text-primary transition-colors">About Us</a></li>
            <li><a href="/contact" class="hover:text-primary transition-colors">Contact Us</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Categories</h3>
          <ul class="space-y-2">
            <li><a href="/recipes/category/breakfast" class="hover:text-primary transition-colors">Breakfast</a></li>
            <li><a href="/recipes/category/lunch" class="hover:text-primary transition-colors">Lunch</a></li>
            <li><a href="/recipes/category/dinner" class="hover:text-primary transition-colors">Dinner</a></li>
            <li><a href="/recipes/category/desserts" class="hover:text-primary transition-colors">Desserts</a></li>
            <li><a href="/recipes/category/vegetarian" class="hover:text-primary transition-colors">Vegetarian</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Contact Us</h3>
          <ul class="space-y-2">
            <li><i class="fas fa-map-marker-alt mr-2"></i> 123 Culinary St, Foodville</li>
            <li><i class="fas fa-phone mr-2"></i> (123) 456-7890</li>
            <li><i class="fas fa-envelope mr-2"></i> info@foodlovers.com</li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-700 mt-8 pt-8 text-center">
        <p>&copy; 2025 FoodLovers. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- JavaScript for Mobile Menu Toggle -->
  <script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });
  </script>

  @yield('js')
</body>
</html>
