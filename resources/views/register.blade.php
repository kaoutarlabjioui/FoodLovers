<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - FoodLovers</title>
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
          <a href="index.html" class="font-medium hover:text-primary transition-colors">Accueil</a>
          <a href="recipes.html" class="font-medium hover:text-primary transition-colors">Recettes</a>
          <a href="competition.html" class="font-medium hover:text-primary transition-colors">Compétitions</a>
          <a href="shop.html" class="font-medium hover:text-primary transition-colors">Boutique</a>
        </div>
        <div class="flex items-center space-x-4">
          <a href="login.html" class="hidden md:block font-medium hover:text-primary transition-colors">Connexion</a>
          <a href="register.html" class="hidden md:block bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">Inscription</a>
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

  <!-- Register Section -->
  <section class="pt-24 pb-12 md:pt-32 md:pb-16 min-h-screen flex items-center">
    <div class="container mx-auto px-4">
      <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex">
          <div class="md:shrink-0 hidden md:block">
            <div class="h-full w-48 relative">
              <img src="https://images.unsplash.com/photo-1607478900766-efe13248b125" alt="Cuisine délicieuse" class="h-full w-full object-cover">
            </div>
          </div>
          <div class="p-8 w-full">
            <div class="text-center mb-8">
              <h1 class="text-3xl font-display font-bold text-dark mb-2">Créer un compte</h1>
              <p class="text-gray-600">Rejoignez la communauté FoodLovers</p>
            </div>

            <form id="register-form" class="space-y-6">
              <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">
                  Nom complet
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                  </div>
                  <input
                    id="name"
                    name="name"
                    type="text"
                    class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                    placeholder="Votre nom"
                  >
                </div>
                <p id="name-error" class="mt-1 text-sm text-red-500 hidden"></p>
              </div>

              <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">
                  Email
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                  </div>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                    placeholder="votre@email.com"
                  >
                </div>
                <p id="email-error" class="mt-1 text-sm text-red-500 hidden"></p>
              </div>

              <div>
                <label for="password" class="block text-gray-700 font-medium mb-2">
                  Mot de passe
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                  </div>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                    placeholder="••••••••"
                  >
                  <button
                    type="button"
                    id="toggle-password"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                  >
                    <i class="fas fa-eye text-gray-400"></i>
                  </button>
                </div>
                <p id="password-error" class="mt-1 text-sm text-red-500 hidden"></p>

                <!-- Password strength indicator -->
                <div id="password-strength-container" class="mt-2 hidden">
                  <div class="flex items-center mb-1">
                    <span class="text-xs text-gray-600 mr-2">Force du mot de passe:</span>
                    <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                      <div id="password-strength-bar" class="h-full bg-red-500" style="width: 0%"></div>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="flex items-center">
                      <span id="length-check" class="text-red-500 mr-1">✗</span>
                      <span>8 caractères minimum</span>
                    </div>
                    <div class="flex items-center">
                      <span id="uppercase-check" class="text-red-500 mr-1">✗</span>
                      <span>Une majuscule</span>
                    </div>
                    <div class="flex items-center">
                      <span id="number-check" class="text-red-500 mr-1">✗</span>
                      <span>Un chiffre</span>
                    </div>
                    <div class="flex items-center">
                      <span id="special-check" class="text-red-500 mr-1">✗</span>
                      <span>Un caractère spécial</span>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                <label for="confirm-password" class="block text-gray-700 font-medium mb-2">
                  Confirmer le mot de passe
                </label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                  </div>
                  <input
                    id="confirm-password"
                    name="confirm-password"
                    type="password"
                    class="w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                    placeholder="••••••••"
                  >
                  <button
                    type="button"
                    id="toggle-confirm-password"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                  >
                    <i class="fas fa-eye text-gray-400"></i>
                  </button>
                </div>
                <p id="confirm-password-error" class="mt-1 text-sm text-red-500 hidden"></p>
              </div>

              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input
                    id="accept-terms"
                    name="accept-terms"
                    type="checkbox"
                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                  >
                </div>
                <div class="ml-3 text-sm">
                  <label for="accept-terms" class="text-gray-700">
                    J'accepte les
                    <a href="#" class="text-primary hover:text-primary/80">
                      conditions d'utilisation
                    </a>
                    et la
                    <a href="#" class="text-primary hover:text-primary/80">
                      politique de confidentialité
                    </a>
                  </label>
                  <p id="accept-terms-error" class="mt-1 text-sm text-red-500 hidden"></p>
                </div>
              </div>

              <div>
                <button
                  type="submit"
                  class="w-full bg-primary text-white py-3 px-4 rounded-lg hover:bg-primary/90 transition-colors font-medium"
                >
                  Créer un compte
                </button>
              </div>
            </form>

            <div class="mt-6 text-center">
              <p class="text-sm text-gray-600">
                Déjà inscrit?
                <a href="login.html" class="font-medium text-primary hover:text-primary/80">
                  Se connecter
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-8">
    <div class="container mx-auto px-4">
      <div class="text-center">
        <p>&copy; <span id="current-year"></span> FoodLovers. Tous droits réservés.</p>
        <div class="flex justify-center space-x-4 mt-4">
          <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-white hover:text-primary transition-colors"><i class="fab fa-pinterest"></i></a>
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

      // Change icon based on menu state
      if (mobileMenu.classList.contains('hidden')) {
        this.innerHTML = '<i class="fas fa-bars text-xl"></i>';
      } else {
        this.innerHTML = '<i class="fas fa-times text-xl"></i>';
      }
    });

    // Toggle password visibility
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');
    const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
    const confirmPasswordInput = document.getElementById('confirm-password');

    togglePassword.addEventListener('click', () => {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);

      // Change icon based on password visibility
      if (type === 'password') {
        togglePassword.innerHTML = '<i class="fas fa-eye text-gray-400"></i>';
      } else {
        togglePassword.innerHTML = '<i class="fas fa-eye-slash text-gray-400"></i>';
      }
    });

    toggleConfirmPassword.addEventListener('click', () => {
      const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmPasswordInput.setAttribute('type', type);

      // Change icon based on password visibility
      if (type === 'password') {
        toggleConfirmPassword.innerHTML = '<i class="fas fa-eye text-gray-400"></i>';
      } else {
        toggleConfirmPassword.innerHTML = '<i class="fas fa-eye-slash text-gray-400"></i>';
      }
    });

    // Password strength checker
    const passwordStrengthContainer = document.getElementById('password-strength-container');
    const passwordStrengthBar = document.getElementById('password-strength-bar');
    const lengthCheck = document.getElementById('length-check');
    const uppercaseCheck = document.getElementById('uppercase-check');
    const numberCheck = document.getElementById('number-check');
    const specialCheck = document.getElementById('special-check');

    passwordInput.addEventListener('input', () => {
      const password = passwordInput.value;

      if (password) {
        passwordStrengthContainer.classList.remove('hidden');

        // Check password strength
        let strength = 0;

        // Check length
        if (password.length >= 8) {
          lengthCheck.textContent = '✓';
          lengthCheck.className = 'text-green-500 mr-1';
          strength += 1;
        } else {
          lengthCheck.textContent = '✗';
          lengthCheck.className = 'text-red-500 mr-1';
        }

        // Check uppercase
        if (/[A-Z]/.test(password)) {
          uppercaseCheck.textContent = '✓';
          uppercaseCheck.className = 'text-green-500 mr-1';
          strength += 1;
        } else {
          uppercaseCheck.textContent = '✗';
          uppercaseCheck.className = 'text-red-500 mr-1';
        }

        // Check number
        if (/[0-9]/.test(password)) {
          numberCheck.textContent = '✓';
          numberCheck.className = 'text-green-500 mr-1';
          strength += 1;
        } else {
          numberCheck.textContent = '✗';
          numberCheck.className = 'text-red-500 mr-1';
        }

        // Check special character
        if (/[^A-Za-z0-9]/.test(password)) {
          specialCheck.textContent = '✓';
          specialCheck.className = 'text-green-500 mr-1';
          strength += 1;
        } else {
          specialCheck.textContent = '✗';
          specialCheck.className = 'text-red-500 mr-1';
        }

        // Update strength bar
        passwordStrengthBar.style.width = `${strength * 25}%`;

        // Update strength bar color
        if (strength === 0 || strength === 1) {
          passwordStrengthBar.className = 'h-full bg-red-500';
        } else if (strength === 2) {
          passwordStrengthBar.className = 'h-full bg-yellow-500';
        } else if (strength === 3) {
          passwordStrengthBar.className = 'h-full bg-green-400';
        } else {
          passwordStrengthBar.className = 'h-full bg-green-500';
        }
      } else {
        passwordStrengthContainer.classList.add('hidden');
      }
    });

    // Form validation
    const registerForm = document.getElementById('register-form');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const confirmPasswordError = document.getElementById('confirm-password-error');
    const acceptTerms = document.getElementById('accept-terms');
    const acceptTermsError = document.getElementById('accept-terms-error');

    registerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      let isValid = true;

      // Reset errors
      nameError.classList.add('hidden');
      emailError.classList.add('hidden');
      passwordError.classList.add('hidden');
      confirmPasswordError.classList.add('hidden');
      acceptTermsError.classList.add('hidden');

      // Validate name
      if (!nameInput.value.trim()) {
        nameError.textContent = "Le nom est requis";
        nameError.classList.remove('hidden');
        isValid = false;
      }

      // Validate email
      if (!emailInput.value) {
        emailError.textContent = "L'email est requis";
        emailError.classList.remove('hidden');
        isValid = false;
      } else if (!validateEmail(emailInput.value)) {
        emailError.textContent = "Veuillez entrer un email valide";
        emailError.classList.remove('hidden');
        isValid = false;
      }

      // Validate password
      if (!passwordInput.value) {
        passwordError.textContent = "Le mot de passe est requis";
        passwordError.classList.remove('hidden');
        isValid = false;
      } else if (passwordInput.value.length < 8) {
        passwordError.textContent = "Le mot de passe doit contenir au moins 8 caractères";
        passwordError.classList.remove('hidden');
        isValid = false;
      } else {
        // Check password strength
        let strength = 0;
        if (passwordInput.value.length >= 8) strength += 1;
        if (/[A-Z]/.test(passwordInput.value)) strength += 1;
        if (/[0-9]/.test(passwordInput.value)) strength += 1;
        if (/[^A-Za-z0-9]/.test(passwordInput.value)) strength += 1;

        if (strength < 3) {
          passwordError.textContent = "Le mot de passe est trop faible";
          passwordError.classList.remove('hidden');
          isValid = false;
        }
      }

      // Validate confirm password
      if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordError.textContent = "Les mots de passe ne correspondent pas";
        confirmPasswordError.classList.remove('hidden');
        isValid = false;
      }

      // Validate terms acceptance
      if (!acceptTerms.checked) {
        acceptTermsError.textContent = "Vous devez accepter les conditions d'utilisation";
        acceptTermsError.classList.remove('hidden');
        isValid = false;
      }

      if (isValid) {
        // Submit form - in a real app, this would call an API
        console.log('Form submitted:', {
          name: nameInput.value,
          email: emailInput.value,
          password: passwordInput.value
        });
        // Redirect or show success message
        alert('Inscription réussie!');
      }
    });

    function validateEmail(email) {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email);
    }

    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
