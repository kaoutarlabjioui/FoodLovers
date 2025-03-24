<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Desserts d'été - Détails de la compétition - FoodLovers</title>
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

  <!-- Breadcrumb -->
  <div class="bg-gray-100 py-3">
    <div class="container mx-auto px-4">
      <div class="flex items-center text-sm">
        <a href="index.html" class="text-gray-600 hover:text-primary">Accueil</a>
        <span class="mx-2 text-gray-400">/</span>
        <a href="competitions.html" class="text-gray-600 hover:text-primary">Compétitions</a>
        <span class="mx-2 text-gray-400">/</span>
        <span class="text-primary">Desserts d'été</span>
      </div>
    </div>
  </div>

  <!-- Competition Header -->
  <section class="relative bg-dark text-white">
    <div class="absolute inset-0 overflow-hidden">
      <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187" alt="Desserts d'été" class="w-full h-full object-cover opacity-40">
    </div>
    <div class="container mx-auto px-4 py-16 relative">
      <div class="flex flex-col md:flex-row items-start gap-8">
        <div class="md:w-2/3">
          <div class="bg-primary text-white text-sm font-bold px-3 py-1 rounded-full inline-block mb-4">
            En cours
          </div>
          <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Desserts d'été</h1>
          <p class="text-lg mb-6">Créez un dessert rafraîchissant parfait pour les chaudes journées d'été et impressionnez notre jury avec votre créativité et votre savoir-faire.</p>

          <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
              <div class="flex items-center mb-2">
                <i class="fas fa-calendar-alt text-primary mr-2"></i>
                <h3 class="font-bold">Dates</h3>
              </div>
              <p class="text-sm">15/06/2025 - 30/06/2025</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
              <div class="flex items-center mb-2">
                <i class="fas fa-users text-primary mr-2"></i>
                <h3 class="font-bold">Participants</h3>
              </div>
              <p class="text-sm">48 inscrits (illimité)</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
              <div class="flex items-center mb-2">
                <i class="fas fa-trophy text-primary mr-2"></i>
                <h3 class="font-bold">Prix</h3>
              </div>
              <p class="text-sm">500€ + Ustensiles</p>
            </div>
          </div>

          <div class="flex flex-col sm:flex-row gap-4">
            <a href="#inscription" class="bg-primary hover:bg-primary/90 text-white font-medium py-3 px-6 rounded-lg transition-colors inline-flex items-center justify-center">
              <i class="fas fa-user-plus mr-2"></i>
              S'inscrire maintenant
            </a>
            <button class="bg-white hover:bg-gray-100 text-dark font-medium py-3 px-6 rounded-lg transition-colors inline-flex items-center justify-center">
              <i class="fas fa-share-alt mr-2"></i>
              Partager
            </button>
          </div>
        </div>

        <div class="md:w-1/3 bg-white/10 backdrop-blur-sm rounded-lg p-6">
          <h3 class="text-xl font-bold mb-4">Dates importantes</h3>
          <ul class="space-y-4">
            <li class="flex">
              <div class="mr-4 flex flex-col items-center">
                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                  <i class="fas fa-flag-checkered"></i>
                </div>
                <div class="h-full w-0.5 bg-primary/30 my-1"></div>
              </div>
              <div>
                <h4 class="font-bold">Ouverture des inscriptions</h4>
                <p class="text-sm">1 juin 2025</p>
              </div>
            </li>
            <li class="flex">
              <div class="mr-4 flex flex-col items-center">
                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                  <i class="fas fa-hourglass-start"></i>
                </div>
                <div class="h-full w-0.5 bg-primary/30 my-1"></div>
              </div>
              <div>
                <h4 class="font-bold">Début de la compétition</h4>
                <p class="text-sm">15 juin 2025</p>
              </div>
            </li>
            <li class="flex">
              <div class="mr-4 flex flex-col items-center">
                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                  <i class="fas fa-upload"></i>
                </div>
                <div class="h-full w-0.5 bg-primary/30 my-1"></div>
              </div>
              <div>
                <h4 class="font-bold">Date limite de soumission</h4>
                <p class="text-sm">30 juin 2025, 23:59</p>
              </div>
            </li>
            <li class="flex">
              <div class="mr-4 flex flex-col items-center">
                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                  <i class="fas fa-award"></i>
                </div>
              </div>
              <div>
                <h4 class="font-bold">Annonce des résultats</h4>
                <p class="text-sm">10 juillet 2025</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Competition Details Tabs -->
  <section class="py-12 bg-white">
    <div class="container mx-auto px-4">
      <div class="border-b border-gray-200">
        <nav class="flex flex-wrap -mb-px">
          <button id="tab-description" class="tab-button inline-block p-4 border-b-2 border-primary text-primary font-medium">
            Description
          </button>
          <button id="tab-rules" class="tab-button inline-block p-4 border-b-2 border-transparent hover:text-primary hover:border-primary/30">
            Règles
          </button>
          <button id="tab-prizes" class="tab-button inline-block p-4 border-b-2 border-transparent hover:text-primary hover:border-primary/30">
            Prix
          </button>
          <button id="tab-jury" class="tab-button inline-block p-4 border-b-2 border-transparent hover:text-primary hover:border-primary/30">
            Jury
          </button>
          <button id="tab-submissions" class="tab-button inline-block p-4 border-b-2 border-transparent hover:text-primary hover:border-primary/30">
            Soumissions
          </button>
        </nav>
      </div>

      <!-- Tab Content -->
      <div class="py-8">
        <!-- Description Tab -->
        <div id="content-description" class="tab-content">
          <div class="max-w-3xl">
            <h2 class="text-2xl font-display font-bold mb-6">À propos de cette compétition</h2>
            <p class="mb-4">L'été est la saison parfaite pour les desserts frais, légers et colorés. Cette compétition vous invite à créer un dessert qui capture l'essence même de l'été : des saveurs rafraîchissantes, des couleurs vives et des textures légères.</p>
            <p class="mb-4">Que vous soyez inspiré par les fruits de saison, les glaces artisanales, les sorbets ou les pâtisseries légères, c'est le moment de laisser libre cours à votre créativité pour concevoir un dessert qui évoque la joie et la fraîcheur estivales.</p>
            <p class="mb-6">Cette compétition est ouverte à tous, quel que soit votre niveau d'expérience en cuisine. Nous encourageons la participation des amateurs passionnés comme des professionnels.</p>

            <h3 class="text-xl font-bold mb-4">Thème : Desserts d'été</h3>
            <p class="mb-4">Votre création doit refléter le thème des "Desserts d'été". Cela peut inclure :</p>
            <ul class="list-disc pl-6 mb-6 space-y-2">
              <li>Des desserts à base de fruits d'été (fraises, pêches, abricots, melons, etc.)</li>
              <li>Des créations glacées (glaces, sorbets, parfaits, etc.)</li>
              <li>Des desserts légers et rafraîchissants</li>
              <li>Des pâtisseries estivales traditionnelles revisitées</li>
              <li>Des desserts évoquant les vacances et la détente</li>
            </ul>

            <h3 class="text-xl font-bold mb-4">Critères d'évaluation</h3>
            <p class="mb-4">Votre création sera évaluée selon les critères suivants :</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
              <div class="border rounded-lg p-4">
                <h4 class="font-bold mb-2">Créativité et originalité (30%)</h4>
                <p class="text-sm text-gray-600">L'aspect innovant et original de votre dessert, tout en respectant le thème de l'été.</p>
              </div>
              <div class="border rounded-lg p-4">
                <h4 class="font-bold mb-2">Présentation visuelle (25%)</h4>
                <p class="text-sm text-gray-600">L'esthétique, les couleurs, la disposition et l'harmonie générale du dessert.</p>
              </div>
              <div class="border rounded-lg p-4">
                <h4 class="font-bold mb-2">Technique et exécution (25%)</h4>
                <p class="text-sm text-gray-600">La maîtrise des techniques culinaires et la qualité de l'exécution.</p>
              </div>
              <div class="border rounded-lg p-4">
                <h4 class="font-bold mb-2">Recette et ingrédients (20%)</h4>
                <p class="text-sm text-gray-600">L'équilibre des saveurs, l'utilisation d'ingrédients de saison et la faisabilité de la recette.</p>
              </div>
            </div>

            <div class="bg-primary/5 rounded-lg p-6 mb-6">
              <h3 class="text-xl font-bold mb-4">Pourquoi participer ?</h3>
              <ul class="space-y-3">
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Montrez votre talent et votre créativité à une large communauté</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Recevez des retours constructifs de professionnels de la pâtisserie</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Gagnez des prix exceptionnels et de la reconnaissance</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Développez votre réseau dans le monde culinaire</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Amusez-vous et partagez votre passion pour la pâtisserie</span>
                </li>
              </ul>
            </div>

            <div class="text-center">
              <a href="#inscription" class="bg-primary hover:bg-primary/90 text-white font-medium py-3 px-8 rounded-lg transition-colors inline-flex items-center justify-center">
                <i class="fas fa-user-plus mr-2"></i>
                Je veux participer !
              </a>
            </div>
          </div>
        </div>

        <!-- Rules Tab -->
        <div id="content-rules" class="tab-content hidden">
          <div class="max-w-3xl">
            <h2 class="text-2xl font-display font-bold mb-6">Règles de la compétition</h2>

            <div class="space-y-6">
              <div>
                <h3 class="text-xl font-bold mb-3">Éligibilité</h3>
                <ul class="list-disc pl-6 space-y-2">
                  <li>La compétition est ouverte à tous, amateurs et professionnels.</li>
                  <li>Les participants doivent avoir un compte FoodLovers actif.</li>
                  <li>Les membres du jury et les employés de FoodLovers ne sont pas autorisés à participer.</li>
                  <li>Les participants mineurs doivent avoir l'autorisation d'un parent ou tuteur légal.</li>
                </ul>
              </div>

              <div>
                <h3 class="text-xl font-bold mb-3">Soumission</h3>
                <ul class="list-disc pl-6 space-y-2">
                  <li>Chaque participant peut soumettre une seule création.</li>
                  <li>La soumission doit inclure :
                    <ul class="list-circle pl-6 mt-2 space-y-1">
                      <li>3 à 5 photos de haute qualité de votre dessert (vue d'ensemble et détails)</li>
                      <li>La recette complète avec liste d'ingrédients et étapes de préparation</li>
                      <li>Une brève description de votre création (max. 300 mots)</li>
                      <li>Une explication de comment votre dessert s'inscrit dans le thème (max. 200 mots)</li>
                    </ul>
                  </li>
                  <li>Les soumissions doivent être originales et créées spécifiquement pour cette compétition.</li>
                  <li>Les soumissions doivent être reçues avant la date limite : 30 juin 2025, 23:59 (heure de Paris).</li>
                </ul>
              </div>

              <div>
                <h3 class="text-xl font-bold mb-3">Exigences techniques</h3>
                <ul class="list-disc pl-6 space-y-2">
                  <li>Les photos doivent être au format JPEG ou PNG, avec une résolution minimale de 1500x1500 pixels.</li>
                  <li>Les photos ne doivent pas contenir de filigrane, signature ou texte.</li>
                  <li>Les photos peuvent être retouchées pour ajuster la luminosité, le contraste et la saturation, mais ne doivent pas être manipulées de manière excessive.</li>
                  <li>La recette doit être rédigée en français et inclure les unités de mesure précises.</li>
                </ul>
              </div>

              <div>
                <h3 class="text-xl font-bold mb-3">Jugement</h3>
                <ul class="list-disc pl-6 space-y-2">
                  <li>Les soumissions seront évaluées par un panel de juges professionnels.</li>
                  <li>Les critères d'évaluation sont : créativité et originalité (30%), présentation visuelle (25%), technique et exécution (25%), recette et ingrédients (20%).</li>
                  <li>La décision du jury est finale et sans appel.</li>
                  <li>Les résultats seront annoncés le 10 juillet 2025 sur le site FoodLovers et par email aux participants.</li>
                </ul>
              </div>

              <div>
                <h3 class="text-xl font-bold mb-3">Droits et propriété intellectuelle</h3>
                <ul class="list-disc pl-6 space-y-2">
                  <li>En participant, vous conservez les droits d'auteur de votre création, mais vous accordez à FoodLovers le droit non exclusif d'utiliser, reproduire et publier les photos et recettes soumises à des fins promotionnelles.</li>
                  <li>Votre nom sera toujours mentionné lorsque votre création sera utilisée.</li>
                  <li>Vous garantissez que votre soumission est votre œuvre originale et qu'elle ne viole aucun droit de propriété intellectuelle d'un tiers.</li>
                </ul>
              </div>

              <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h3 class="text-lg font-bold mb-2 flex items-center">
                  <i class="fas fa-exclamation-circle text-yellow-500 mr-2"></i>
                  Note importante
                </h3>
                <p>FoodLovers se réserve le droit de disqualifier toute soumission qui ne respecte pas ces règles ou qui contient du contenu inapproprié. En cas de doute sur l'interprétation des règles, n'hésitez pas à contacter notre équipe à competitions@foodlovers.com.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Prizes Tab -->
        <div id="content-prizes" class="tab-content hidden">
          <div class="max-w-3xl">
            <h2 class="text-2xl font-display font-bold mb-6">Prix à gagner</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
              <!-- 1st Prize -->
              <div class="bg-gradient-to-b from-yellow-50 to-yellow-100 rounded-lg p-6 border border-yellow-200 text-center relative">
                <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 bg-yellow-400 text-white font-bold py-1 px-4 rounded-full">
                  1er Prix
                </div>
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="fas fa-trophy text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Grand Prix</h3>
                <ul class="text-left space-y-2 mb-4">
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>500€ en espèces</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Set d'ustensiles de pâtisserie professionnels</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Publication de la recette dans le magazine FoodLovers</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Interview exclusive sur notre blog</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Badge "Champion" sur votre profil</span>
                  </li>
                </ul>
              </div>

              <!-- 2nd Prize -->
              <div class="bg-gradient-to-b from-gray-50 to-gray-100 rounded-lg p-6 border border-gray-200 text-center relative">
                <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 bg-gray-400 text-white font-bold py-1 px-4 rounded-full">
                  2ème Prix
                </div>
                <div class="w-20 h-20 bg-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="fas fa-medal text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Prix d'Argent</h3>
                <ul class="text-left space-y-2 mb-4">
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>250€ en espèces</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Moules à pâtisserie de qualité professionnelle</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Publication de la recette sur notre site</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Badge "Finaliste" sur votre profil</span>
                  </li>
                </ul>
              </div>

              <!-- 3rd Prize -->
              <div class="bg-gradient-to-b from-orange-50 to-orange-100 rounded-lg p-6 border border-orange-200 text-center relative">
                <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 bg-orange-400 text-white font-bold py-1 px-4 rounded-full">
                  3ème Prix
                </div>
                <div class="w-20 h-20 bg-orange-400 rounded-full flex items-center justify-center mx-auto mb-4">
                  <i class="fas fa-award text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-4">Prix de Bronze</h3>
                <ul class="text-left space-y-2 mb-4">
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>100€ en espèces</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Livre de recettes de desserts d'été</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Publication de la recette sur notre site</span>
                  </li>
                  <li class="flex items-start">
                    <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                    <span>Badge "Bronze" sur votre profil</span>
                  </li>
                </ul>
              </div>
            </div>

            <h3 class="text-xl font-bold mb-4">Prix spéciaux</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
              <div class="border rounded-lg p-4">
                <div class="flex items-center mb-2">
                  <i class="fas fa-heart text-primary mr-2"></i>
                  <h4 class="font-bold">Prix du Public</h4>
                </div>
                <p class="text-gray-600 mb-2">Attribué à la création qui recevra le plus de votes de la communauté FoodLovers.</p>
                <p class="font-medium">Récompense : Bon d'achat de 150€ sur notre boutique + Badge "Choix du Public"</p>
              </div>

              <div class="border rounded-lg p-4">
                <div class="flex items-center mb-2">
                  <i class="fas fa-camera text-primary mr-2"></i>
                  <h4 class="font-bold">Prix de la Présentation</h4>
                </div>
                <p class="text-gray-600 mb-2">Attribué à la création avec la présentation visuelle la plus impressionnante.</p>
                <p class="font-medium">Récompense : Kit de photographie culinaire + Badge "Artiste Culinaire"</p>
              </div>

              <div class="border rounded-lg p-4">
                <div class="flex items-center mb-2">
                  <i class="fas fa-lightbulb text-primary mr-2"></i>
                  <h4 class="font-bold">Prix de l'Innovation</h4>
                </div>
                <p class="text-gray-600 mb-2">Attribué à la création la plus originale et innovante.</p>
                <p class="font-medium">Récompense : Cours de pâtisserie créative en ligne + Badge "Innovateur"</p>
              </div>

              <div class="border rounded-lg p-4">
                <div class="flex items-center mb-2">
                  <i class="fas fa-seedling text-primary mr-2"></i>
                  <h4 class="font-bold">Prix Éco-responsable</h4>
                </div>
                <p class="text-gray-600 mb-2">Attribué à la création la plus respectueuse de l'environnement (ingrédients locaux, de saison, zéro déchet).</p>
                <p class="font-medium">Récompense : Panier d'ingrédients bio + Badge "Éco-chef"</p>
              </div>
            </div>

            <div class="bg-primary/5 rounded-lg p-6">
              <h3 class="text-xl font-bold mb-4">Pour tous les participants</h3>
              <p class="mb-4">Tous les participants recevront :</p>
              <ul class="space-y-2">
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Un certificat de participation numérique</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Un badge "Participant" sur leur profil FoodLovers</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Un retour personnalisé du jury sur leur création</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                  <span>Un code promo de 15% valable sur notre boutique</span>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Jury Tab -->
        <div id="content-jury" class="tab-content hidden">
          <div class="max-w-3xl">
            <h2 class="text-2xl font-display font-bold mb-6">Notre jury d'experts</h2>
            <p class="mb-8">Vos créations seront évaluées par un panel de professionnels reconnus dans le monde de la pâtisserie et de la gastronomie.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
              <!-- Judge 1 -->
              <div class="flex flex-col sm:flex-row items-center sm:items-start bg-gray-50 rounded-lg p-6">
                <img src="https://images.unsplash.com/photo-1566554273541-37a9ca77b91f" alt="Marie Dubois" class="w-24 h-24 rounded-full object-cover mb-4 sm:mb-0 sm:mr-4">
                <div>
                  <h3 class="text-xl font-bold mb-1">Marie Dubois</h3>
                  <p class="text-primary font-medium mb-3">Chef Pâtissière, Restaurant L'Étoile</p>
                  <p class="text-gray-600 mb-3">Reconnue pour ses desserts innovants et sa maîtrise des techniques de pâtisserie française, Marie Dubois a été élue Meilleure Pâtissière de France en 2023.</p>
                  <div class="flex space-x-3">
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fas fa-globe"></i>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Judge 2 -->
              <div class="flex flex-col sm:flex-row items-center sm:items-start bg-gray-50 rounded-lg p-6">
                <img src="https://images.unsplash.com/photo-1583394838336-acd977736f90" alt="Thomas Martin" class="w-24 h-24 rounded-full object-cover mb-4 sm:mb-0 sm:mr-4">
                <div>
                  <h3 class="text-xl font-bold mb-1">Thomas Martin</h3>
                  <p class="text-primary font-medium mb-3">Auteur culinaire et Critique gastronomique</p>
                  <p class="text-gray-600 mb-3">Auteur de plusieurs livres sur les desserts, Thomas Martin est connu pour son palais raffiné et son expertise en matière d'associations de saveurs.</p>
                  <div class="flex space-x-3">
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fas fa-globe"></i>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Judge 3 -->
              <div class="flex flex-col sm:flex-row items-center sm:items-start bg-gray-50 rounded-lg p-6">
                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956" alt="Sophie Leroy" class="w-24 h-24 rounded-full object-cover mb-4 sm:mb-0 sm:mr-4">
                <div>
                  <h3 class="text-xl font-bold mb-1">Sophie Leroy</h3>
                  <p class="text-primary font-medium mb-3">Fondatrice de l'École de Pâtisserie Créative</p>
                  <p class="text-gray-600 mb-3">Avec plus de 20 ans d'expérience dans l'enseignement de la pâtisserie, Sophie Leroy est passionnée par la transmission du savoir-faire et l'encouragement des talents émergents.</p>
                  <div class="flex space-x-3">
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fas fa-globe"></i>
                    </a>
                  </div>
                </div>
              </div>

              <!-- Judge 4 -->
              <div class="flex flex-col sm:flex-row items-center sm:items-start bg-gray-50 rounded-lg p-6">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Lucas Bernard" class="w-24 h-24 rounded-full object-cover mb-4 sm:mb-0 sm:mr-4">
                <div>
                  <h3 class="text-xl font-bold mb-1">Lucas Bernard</h3>
                  <p class="text-primary font-medium mb-3">Chef Exécutif, Hôtel Royal Palace</p>
                  <p class="text-gray-600 mb-3">Spécialiste des desserts de restaurant, Lucas Bernard est reconnu pour son approche moderne de la pâtisserie et son attention aux détails.</p>
                  <div class="flex space-x-3">
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-primary">
                      <i class="fas fa-globe"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-8 bg-primary/5 rounded-lg p-6">
              <h3 class="text-xl font-bold mb-4">Processus de jugement</h3>
              <p class="mb-4">Le processus d'évaluation se déroulera comme suit :</p>
              <ol class="list-decimal pl-6 space-y-2">
                <li>Toutes les soumissions seront examinées pour s'assurer qu'elles respectent les règles de la compétition.</li>
                <li>Chaque juge évaluera indépendamment les créations selon les critères établis.</li>
                <li>Les juges se réuniront pour discuter des meilleures soumissions et sélectionner les gagnants.</li>
                <li>Les résultats seront annoncés le 10 juillet 2025 sur le site FoodLovers et par email aux participants.</li>
              </ol>
            </div>
          </div>
        </div>

        <!-- Submissions Tab -->
        <div id="content-submissions" class="tab-content hidden">
          <div class="max-w-3xl">
            <h2 class="text-2xl font-display font-bold mb-6">Comment soumettre votre création</h2>

            <div class="bg-primary/5 rounded-lg p-6 mb-8">
              <h3 class="text-xl font-bold mb-4">Étapes de soumission</h3>
              <ol class="space-y-4">
                <li class="flex">
                  <div class="mr-4 flex flex-col items-center">
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                      1
                    </div>
                    <div class="h-full w-0.5 bg-primary/30 my-1"></div>
                  </div>
                  <div>
                    <h4 class="font-bold">Inscrivez-vous à la compétition</h4>
                    <p class="text-gray-600">Créez un compte FoodLovers si vous n'en avez pas déjà un, puis inscrivez-vous à la compétition "Desserts d'été".</p>
                  </div>
                </li>
                <li class="flex">
                  <div class="mr-4 flex flex-col items-center">
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                      2
                    </div>
                    <div class="h-full w-0.5 bg-primary/30 my-1"></div>
                  </div>
                  <div>
                    <h4 class="font-bold">Créez votre dessert</h4>
                    <p class="text-gray-600">Préparez votre dessert d'été en suivant le thème et les critères de la compétition. Prenez des photos de qualité de votre création.</p>
                  </div>
                </li>
                <li class="flex">
                  <div class="mr-4 flex flex-col items-center">
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                      3
                    </div>
                    <div class="h-full w-0.5 bg-primary/30 my-1"></div>
                  </div>
                  <div>
                    <h4 class="font-bold">Préparez votre soumission</h4>
                    <p class="text-gray-600">Rédigez votre recette complète et une description de votre création. Sélectionnez vos meilleures photos (3 à 5).</p>
                  </div>
                </li>
                <li class="flex">
                  <div class="mr-4 flex flex-col items-center">
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white font-bold">
                      4
                    </div>
                  </div>
                  <div>
                    <h4 class="font-bold">Soumettez votre création</h4>
                    <p class="text-gray-600">Connectez-vous à votre compte, accédez à la page de la compétition et cliquez sur "Soumettre ma création". Remplissez le formulaire avec toutes les informations requises.</p>
                  </div>
                </li>
              </ol>
            </div>

            <h3 class="text-xl font-bold mb-4">Conseils pour une soumission réussie</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
              <div class="border rounded-lg p-4">
                <div class="flex items-center mb-2">
                  <i class="fas fa-camera text-primary mr-2"></i>
                  <h4 class="font-bold">Photographie</h4>
                </div>
                <ul class="text-gray-600 space-y-1">
                  <li>• Utilisez la lumière naturelle si possible</li>
                  <li>• Prenez des photos sous différents angles</li>
                  <li>• Montrez les détails et la texture</li>
                  <li>• Utilisez un fond neutre ou complémentaire</li>
                  <li>• Assurez-vous que les photos sont nettes</li>
                </ul>
              </div>

              <div class="border rounded-lg p-4">
                <div class="flex items-center mb-2">
                  <i class="fas fa-file-alt text-primary mr-2"></i>
                  <h4 class="font-bold">Recette</h4>
                </div>
                <ul class="text-gray-600 space-y-1">
                  <li>• Soyez précis dans les mesures</li>
                  <li>• Détaillez chaque étape clairement</li>
                  <li>• Indiquez les temps de préparation et de cuisson</li>
                  <li>• Mentionnez les alternatives possibles</li>
                  <li>• Incluez des conseils et astuces</li>
                </ul>
              </div>

              <div class="border rounded-lg p-4">
                <div class="flex items-center mb-2">
                  <i class="fas fa-lightbulb text-primary mr-2"></i>
                  <h4 class="font-bold">Description</h4>
                </div>
                <ul class="text-gray-600 space-y-1">
                  <li>• Expliquez votre inspiration</li>
                  <li>• Décrivez les saveurs et textures</li>
                  <li>• Racontez l'histoire derrière votre création</li>
                  <li>• Expliquez comment elle s'inscrit dans le thème</li>
                  <li>• Soyez concis mais évocateur</li>
                </ul>
              </div>

              <div class="border rounded-lg p-4">
                <div class="flex items-center mb-2">
                  <i class="fas fa-check-circle text-primary mr-2"></i>
                  <h4 class="font-bold">Présentation</h4>
                </div>
                <ul class="text-gray-600 space-y-1">
                  <li>• Soignez la présentation visuelle</li>
                  <li>• Pensez aux couleurs et contrastes</li>
                  <li>• Ajoutez des éléments décoratifs</li>
                  <li>• Utilisez une vaisselle adaptée</li>
                  <li>• Créez une harmonie visuelle</li>
                </ul>
              </div>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-8">
              <h3 class="text-lg font-bold mb-2 flex items-center">
                <i class="fas fa-exclamation-circle text-yellow-500 mr-2"></i>
                Rappel important
              </h3>
              <p>N'oubliez pas que la date limite de soumission est le <strong>30 juin 2025 à 23:59</strong> (heure de Paris). Aucune soumission tardive ne sera acceptée. Nous vous recommandons de ne pas attendre la dernière minute pour soumettre votre création.</p>
            </div>

            <div class="text-center">
              <a href="#inscription" class="bg-primary hover:bg-primary/90 text-white font-medium py-3 px-8 rounded-lg transition-colors inline-flex items-center justify-center">
                <i class="fas fa-user-plus mr-2"></i>
                S'inscrire à la compétition
              </a>
            </div>
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
            <h2 class="text-2xl font-display font-bold mb-4">Inscrivez-vous maintenant</h2>
            <p class="text-gray-600 mb-6">Remplissez ce formulaire pour participer à la compétition "Desserts d'été" et montrer votre talent au monde entier.</p>
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
                <label for="experience" class="block text-sm font-medium text-gray-700 mb-1">Niveau d'expérience</label>
                <select id="experience" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                  <option value="">Sélectionnez votre niveau</option>
                  <option value="beginner">Débutant</option>
                  <option value="intermediate">Intermédiaire</option>
                  <option value="advanced">Avancé</option>
                  <option value="professional">Professionnel</option>
                </select>
              </div>
              <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Pourquoi souhaitez-vous participer ?</label>
                <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
              </div>
              <div class="mb-6">
                <label class="flex items-center">
                  <input type="checkbox" class="rounded text-primary focus:ring-primary">
                  <span class="ml-2 text-sm text-gray-600">J'accepte les règles de la compétition et les conditions d'utilisation</span>
                </label>
              </div>
              <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                S'inscrire à la compétition
              </button>
            </form>
          </div>
          <div class="md:w-1/2 bg-dark">
            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187" alt="Desserts d'été" class="w-full h-full object-cover opacity-80">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="max-w-3xl mx-auto">
        <h2 class="text-2xl font-display font-bold mb-6 text-center">Questions fréquentes</h2>

        <div class="space-y-4">
          <!-- FAQ Item 1 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Puis-je modifier ma soumission après l'avoir envoyée ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">Oui, vous pouvez modifier votre soumission jusqu'à la date limite du 30 juin 2025. Après cette date, aucune modification ne sera possible.</p>
            </div>
          </div>

          <!-- FAQ Item 2 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Puis-je utiliser des ingrédients préparés à l'avance ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">Oui, vous pouvez utiliser certains ingrédients préparés à l'avance comme des fonds de tarte, des biscuits ou des sauces. Cependant, nous vous encourageons à préparer le maximum d'éléments vous-même pour démontrer vos compétences.</p>
            </div>
          </div>

          <!-- FAQ Item 3 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Comment saurai-je si j'ai gagné ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">Les résultats seront annoncés le 10 juillet 2025 sur le site FoodLovers. Tous les participants recevront également un email les informant des résultats. Les gagnants seront contactés personnellement pour organiser la remise des prix.</p>
            </div>
          </div>

          <!-- FAQ Item 4 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Y a-t-il des restrictions concernant les ingrédients ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">Il n'y a pas de restrictions spécifiques, mais nous encourageons l'utilisation d'ingrédients de saison et de qualité. Les desserts doivent être comestibles et adaptés à la consommation humaine. L'utilisation d'ingrédients rares ou exotiques est autorisée mais ne sera pas nécessairement un avantage si cela ne contribue pas à la qualité globale du dessert.</p>
            </div>
          </div>

          <!-- FAQ Item 5 -->
          <div class="border border-gray-200 rounded-lg">
            <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium">
              <span>Puis-je soumettre plusieurs desserts ?</span>
              <i class="fas fa-chevron-down text-gray-400"></i>
            </button>
            <div class="px-6 pb-4">
              <p class="text-gray-600">Non, chaque participant ne peut soumettre qu'une seule création pour cette compétition. Choisissez votre meilleure idée et concentrez-vous sur sa réalisation parfaite.</p>
            </div>
          </div>
        </div>

        <div class="mt-8 text-center">
          <p class="text-gray-600 mb-4">Vous avez d'autres questions ?</p>
          <a href="contact.html" class="text-primary hover:text-primary/80 font-medium">
            Contactez-nous
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Related Competitions -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <h2 class="text-2xl font-display font-bold mb-8 text-center">Autres compétitions qui pourraient vous intéresser</h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Related Competition 1 -->
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
            <a href="competition-details.html" class="block w-full bg-primary hover:bg-primary/90 text-white text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les détails
            </a>
          </div>
        </div>

        <!-- Related Competition 2 -->
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
            <a href="competition-details.html" class="block w-full bg-primary hover:bg-primary/90 text-white text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les détails
            </a>
          </div>
        </div>

        <!-- Related Competition 3 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b" alt="Smoothies créatifs" class="w-full h-48 object-cover">
            <div class="absolute top-4 right-4 bg-blue-100 text-blue-800 text-xs font-bold px-2 py-1 rounded-full">
              À venir
            </div>
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">Smoothies créatifs</h3>
            <p class="text-gray-600 mb-4">Créez des smoothies originaux et nutritifs avec des ingrédients de saison.</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>01/08/2025 - 15/08/2025</span>
            </div>
            <a href="competition-details.html" class="block w-full bg-primary hover:bg-primary/90 text-white text-center font-medium py-2 px-4 rounded-lg transition-colors">
              Voir les détails
            </a>
          </div>
        </div>
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

    // Tab navigation
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        // Remove active class from all buttons
        tabButtons.forEach(btn => {
          btn.classList.remove('border-primary', 'text-primary');
          btn.classList.add('border-transparent', 'hover:text-primary', 'hover:border-primary/30');
        });

        // Add active class to clicked button
        button.classList.add('border-primary', 'text-primary');
        button.classList.remove('border-transparent', 'hover:text-primary', 'hover:border-primary/30');

        // Hide all tab contents
        tabContents.forEach(content => {
          content.classList.add('hidden');
        });

        // Show the corresponding tab content
        const contentId = 'content-' + button.id.split('-')[1];
        document.getElementById(contentId).classList.remove('hidden');
      });
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
