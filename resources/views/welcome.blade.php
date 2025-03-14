<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cooking Competitions - FoodLovers</title>
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
          <a href="index.html" class="font-medium hover:text-primary transition-colors">Home</a>
          <a href="recipes.html" class="font-medium hover:text-primary transition-colors">Recipes</a>
          <a href="competition.html" class="font-medium hover:text-primary transition-colors">Competitions</a>
          <a href="shop.html" class="font-medium hover:text-primary transition-colors">Shop</a>
        </div>
        <div class="flex items-center space-x-4">
          <a href="login.html" class="hidden md:block font-medium hover:text-primary transition-colors">Login</a>
          <a href="signup.html" class="hidden md:block bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">Sign Up</a>
          <button class="md:hidden text-dark" id="mobile-menu-button">
            <i class="fas fa-bars text-xl"></i>
          </button>
        </div>
      </div>
      <!-- Mobile Menu -->
      <div class="md:hidden hidden" id="mobile-menu">
        <div class="flex flex-col space-y-4 py-4">
          <a href="index.html" class="font-medium hover:text-primary transition-colors">Home</a>
          <a href="recipes.html" class="font-medium hover:text-primary transition-colors">Recipes</a>
          <a href="competition.html" class="font-medium hover:text-primary transition-colors">Competitions</a>
          <a href="shop.html" class="font-medium hover:text-primary transition-colors">Shop</a>
          <a href="login.html" class="font-medium hover:text-primary transition-colors">Login</a>
          <a href="signup.html" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors text-center">Sign Up</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="pt-24 pb-12 md:pt-32 md:pb-16 bg-gradient-to-r from-primary/10 to-secondary/10">
    <div class="container mx-auto px-4">
      <div class="text-center max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Cooking <span class="text-primary">Competitions</span></h1>
        <p class="text-lg mb-8">Show off your culinary skills, compete with other food enthusiasts, and win amazing prizes!</p>
        <a href="#active-competitions" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors">Explore Competitions</a>
      </div>
    </div>
  </section>

  <!-- Active Competitions Section -->
  <section id="active-competitions" class="py-12 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-display font-bold mb-8">Active Competitions</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Competition 1 -->
        <div class="bg-light rounded-xl shadow-md overflow-hidden">
          <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1568&q=80" alt="Baking Competition" class="w-full h-48 object-cover">
          <div class="p-6">
            <div class="flex justify-between items-center mb-3">
              <div class="bg-primary text-white text-sm font-medium px-2 py-1 rounded">Active</div>
              <span class="text-sm text-gray-600">Ends in 7 days</span>
            </div>
            <h3 class="font-bold text-xl mb-2">Summer Baking Challenge</h3>
            <p class="text-gray-600 mb-4">Create the most delicious summer-themed dessert and win amazing prizes!</p>
            <div class="mb-4">
              <div class="flex items-center mb-1">
                <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                <span class="font-medium">Prizes:</span>
              </div>
              <ul class="list-disc list-inside text-gray-600 ml-6">
                <li>1st Place: $500 Gift Card</li>
                <li>2nd Place: Professional Baking Set</li>
                <li>3rd Place: Cookbook Collection</li>
              </ul>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">126 participants</span>
              <a href="#" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">Join Now</a>
            </div>
          </div>
        </div>

        <!-- Competition 2 -->
        <div class="bg-light rounded-xl shadow-md overflow-hidden">
          <img src="https://images.unsplash.com/photo-1605522561233-768ad7a8fabf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" alt="Pasta Competition" class="w-full h-48 object-cover">
          <div class="p-6">
            <div class="flex justify-between items-center mb-3">
              <div class="bg-primary text-white text-sm font-medium px-2 py-1 rounded">Active</div>
              <span class="text-sm text-gray-600">Ends in 14 days</span>
            </div>
            <h3 class="font-bold text-xl mb-2">Pasta Perfection Contest</h3>
            <p class="text-gray-600 mb-4">Show off your pasta-making skills with an original recipe that wows our judges.</p>
            <div class="mb-4">
              <div class="flex items-center mb-1">
                <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                <span class="font-medium">Prizes:</span>
              </div>
              <ul class="list-disc list-inside text-gray-600 ml-6">
                <li>1st Place: Pasta Making Masterclass</li>
                <li>2nd Place: Italian Cookbook Set</li>
                <li>3rd Place: Premium Pasta Maker</li>
              </ul>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">98 participants</span>
              <a href="#" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">Join Now</a>
            </div>
          </div>
        </div>

        <!-- Competition 3 -->
        <div class="bg-light rounded-xl shadow-md overflow-hidden">
          <img src="https://images.unsplash.com/photo-1607478900766-efe13248b125?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Smoothie Competition" class="w-full h-48 object-cover">
          <div class="p-6">
            <div class="flex justify-between items-center mb-3">
              <div class="bg-primary text-white text-sm font-medium px-2 py-1 rounded">Active</div>
              <span class="text-sm text-gray-600">Ends in 5 days</span>
            </div>
            <h3 class="font-bold text-xl mb-2">Healthy Smoothie Challenge</h3>
            <p class="text-gray-600 mb-4">Create a nutritious and delicious smoothie recipe that's both healthy and tasty.</p>
            <div class="mb-4">
              <div class="flex items-center mb-1">
                <i class="fas fa-trophy text-yellow-500 mr-2"></i>
                <span class="font-medium">Prizes:</span>
              </div>
              <ul class="list-disc list-inside text-gray-600 ml-6">
                <li>1st Place: High-End Blender</li>
                <li>2nd Place: Nutrition Consultation</li>
                <li>3rd Place: Superfood Package</li>
              </ul>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">74 participants</span>
              <a href="#" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition-colors">Join Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Submit Recipe Section -->
  <section class="py-12 bg-light">
    <div class="container mx-auto px-4">
      <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="md:flex">
          <div class="md:w-1/2 p-8">
            <h2 class="text-3xl font-display font-bold mb-4">Submit Your Recipe</h2>
            <p class="text-lg mb-6">Ready to showcase your culinary skills? Submit your recipe to participate in our cooking competitions.</p>

            <form>
              <div class="mb-4">
                <label for="competition" class="block text-gray-700 font-medium mb-2">Select Competition</label>
                <select id="competition" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                  <option value="">Choose a competition</option>
                  <option value="baking">Summer Baking Challenge</option>
                  <option value="pasta">Pasta Perfection Contest</option>
                  <option value="smoothie">Healthy Smoothie Challenge</option>
                </select>
              </div>

              <div class="mb-4">
                <label for="recipe-name" class="block text-gray-700 font-medium mb-2">Recipe Name</label>
                <input type="text" id="recipe-name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter your recipe name">
              </div>

              <div class="mb-4">
                <label for="recipe-description" class="block text-gray-700 font-medium mb-2">Recipe Description</label>
                <textarea id="recipe-description" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Briefly describe your recipe"></textarea>
              </div>

              <div class="mb-4">
                <label for="ingredients" class="block text-gray-700 font-medium mb-2">Ingredients</label>
                <textarea id="ingredients" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="List all ingredients (one per line)"></textarea>
              </div>

              <div class="mb-4">
                <label for="instructions" class="block text-gray-700 font-medium mb-2">Instructions</label>
                <textarea id="instructions" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Provide step-by-step instructions"></textarea>
              </div>

              <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Upload Recipe Image</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                  <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                  <p class="text-gray-500 mb-2">Drag and drop your image here, or click to browse</p>
                  <input type="file" class="hidden" id="recipe-image">
                  <button type="button" onclick="document.getElementById('recipe-image').click()" class="text-primary hover:underline">Browse Files</button>
                </div>
              </div>

              <button type="submit" class="w-full bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors">Submit Recipe</button>
            </form>
          </div>

          <div class="md:w-1/2 bg-gradient-to-r from-primary to-secondary p-8 text-white flex items-center">
            <div>
              <h3 class="text-2xl font-bold mb-4">Competition Guidelines</h3>
              <ul class="space-y-4">
                <li class="flex items-start">
                  <i class="fas fa-check-circle mt-1 mr-3"></i>
                  <span>Your recipe must be original or a significant adaptation of an existing recipe.</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle mt-1 mr-3"></i>
                  <span>Include a high-quality photo of your finished dish.</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle mt-1 mr-3"></i>
                  <span>List all ingredients with precise measurements.</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle mt-1 mr-3"></i>
                  <span>Provide clear, step-by-step instructions.</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle mt-1 mr-3"></i>
                  <span>Include cooking time, preparation time, and serving size.</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle mt-1 mr-3"></i>
                  <span>You may submit multiple entries to different competitions.</span>
                </li>
                <li class="flex items-start">
                  <i class="fas fa-check-circle mt-1 mr-3"></i>
                  <span>Submissions will be judged on creativity, presentation, and adherence to the competition theme.</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Past Winners Section -->
  <section class="py-12 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-display font-bold mb-8">Past Competition Winners</h2>

      <!-- Winner Tabs -->
      <div class="mb-8">
        <div class="flex flex-wrap border-b border-gray-200">
          <button class="px-6 py-3 font-medium border-b-2 border-primary text-primary">Spring Dessert Challenge</button>
          <button class="px-6 py-3 font-medium text-gray-600 hover:text-primary">Holiday Cookie Contest</button>
          <button class="px-6 py-3 font-medium text-gray-600 hover:text-primary">Comfort Food Cook-Off</button>
        </div>
      </div>

      <!-- Winners Display -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- First Place -->
        <div class="bg-light rounded-xl shadow-md overflow-hidden">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1488477304112-4944851de03d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="First Place Recipe" class="w-full h-48 object-cover">
            <div class="absolute top-0 right-0 bg-yellow-500 text-white px-4 py-2 rounded-bl-lg font-bold">
              1st Place
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-2">Strawberry Rhubarb Tart</h3>
            <p class="text-gray-600 mb-4">A delicious spring tart with fresh strawberries and rhubarb in a buttery crust.</p>
            <div class="flex items-center mb-4">
              <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Chef" class="w-10 h-10 rounded-full mr-3">
              <div>
                <p class="font-medium">By <span class="text-primary">Emma Wilson</span></p>
              </div>
            </div>
            <a href="#" class="text-primary font-medium hover:underline">View Recipe</a>
          </div>
        </div>

        <!-- Second Place -->
        <div class="bg-light rounded-xl shadow-md overflow-hidden">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1464305795204-6f5bbfc7fb81?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Second Place Recipe" class="w-full h-48 object-cover">
            <div class="absolute top-0 right-0 bg-gray-500 text-white px-4 py-2 rounded-bl-lg font-bold">
              2nd Place
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-2">Lemon Lavender Cake</h3>
            <p class="text-gray-600 mb-4">A light and fragrant cake with lemon and a hint of lavender, perfect for spring.</p>
            <div class="flex items-center mb-4">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Chef" class="w-10 h-10 rounded-full mr-3">
              <div>
                <p class="font-medium">By <span class="text-primary">James Chen</span></p>
              </div>
            </div>
            <a href="#" class="text-primary font-medium hover:underline">View Recipe</a>
          </div>
        </div>

        <!-- Third Place -->
        <div class="bg-light rounded-xl shadow-md overflow-hidden">
          <div class="relative">
            <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Third Place Recipe" class="w-full h-48 object-cover">
            <div class="absolute top-0 right-0 bg-amber-700 text-white px-4 py-2 rounded-bl-lg font-bold">
              3rd Place
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-2">Blueberry Cheesecake Bars</h3>
            <p class="text-gray-600 mb-4">Creamy cheesecake bars with a fresh blueberry swirl on a graham cracker crust.</p>
            <div class="flex items-center mb-4">
              <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Chef" class="w-10 h-10 rounded-full mr-3">
              <div>
                <p class="font-medium">By <span class="text-primary">Sophia Martinez</span></p>
              </div>
            </div>
            <a href="#" class="text-primary font-medium hover:underline">View Recipe</a>
          </div>
        </div>
      </div>

      <div class="text-center mt-8">
        <a href="#" class="inline-block bg-white border border-primary text-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition-colors">View All Past Competitions</a>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-12 bg-light">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-display font-bold mb-8 text-center">Frequently Asked Questions</h2>

      <div class="max-w-3xl mx-auto">
        <!-- FAQ Item 1 -->
        <div class="mb-4">
          <button class="flex justify-between items-center w-full bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow" onclick="toggleFAQ(1)">
            <span class="font-bold">How do I enter a competition?</span>
            <i class="fas fa-chevron-down text-primary" id="faq-icon-1"></i>
          </button>
          <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-1">
            <p class="pt-2">To enter a competition, simply navigate to the competition you're interested in, click "Join Now," and follow the instructions to submit your recipe. You'll need to provide a recipe name, description, ingredients, instructions, and a photo of your dish.</p>
          </div>
        </div>

        <!-- FAQ Item 2 -->
        <div class="mb-4">
          <button class="flex justify-between items-center w-full bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow" onclick="toggleFAQ(2)">
            <span class="font-bold">How are winners selected?</span>
            <i class="fas fa-chevron-down text-primary" id="faq-icon-2"></i>
          </button>
          <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-2">
            <p class="pt-2">Winners are selected by a panel of judges that includes professional chefs, food bloggers, and previous competition winners. Entries are judged based on creativity, presentation, adherence to the theme, and overall appeal. The judging process typically takes 1-2 weeks after the competition closes.</p>
          </div>
        </div>

        <!-- FAQ Item 3 -->
        <div class="mb-4">
          <button class="flex justify-between items-center w-full bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow" onclick="toggleFAQ(3)">
            <span class="font-bold">Can I submit more than one recipe?</span>
            <i class="fas fa-chevron-down text-primary" id="faq-icon-3"></i>
          </button>
          <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-3">
            <p class="pt-2">Yes, you can submit multiple recipes to different competitions. However, for fairness, we limit entries to one recipe per person per competition. This gives everyone a fair chance to win and encourages a diverse range of submissions.</p>
          </div>
        </div>

        <!-- FAQ Item 4 -->
        <div class="mb-4">
          <button class="flex justify-between items-center w-full bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow" onclick="toggleFAQ(4)">
            <span class="font-bold">How will I know if I've won?</span>
            <i class="fas fa-chevron-down text-primary" id="faq-icon-4"></i>
          </button>
          <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-4">
            <p class="pt-2">Winners will be notified via email within 48 hours of the judging completion. Additionally, winners will be announced on our website and social media channels. If you're selected as a winner, you'll receive detailed instructions on how to claim your prize. Make sure to keep an eye on your email inbox, including your spam folder, after the competition ends.</p>
          </div>
        </div>

        <!-- FAQ Item 5 -->
        <div class="mb-4">
          <button class="flex justify-between items-center w-full bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow" onclick="toggleFAQ(5)">
            <span class="font-bold">Do I need to be a professional chef to participate?</span>
            <i class="fas fa-chevron-down text-primary" id="faq-icon-5"></i>
          </button>
          <div class="bg-white px-4 pb-4 rounded-b-lg shadow-sm hidden" id="faq-answer-5">
            <p class="pt-2">Not at all! Our competitions are open to everyone, from beginners to professional chefs. We encourage home cooks of all skill levels to participate. Many of our past winners have been home cooks who simply have a passion for creating delicious food.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter Section -->
  <section class="py-12 bg-primary/10">
    <div class="container mx-auto px-4">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-display font-bold mb-4">Stay Updated on Competitions</h2>
        <p class="text-lg mb-6">Subscribe to our newsletter to receive notifications about new competitions, winners announcements, and exclusive cooking tips.</p>
        <div class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
          <input type="email" placeholder="Your email address" class="flex-grow px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
          <button class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition-colors">Subscribe</button>
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
            <li><a href="index.html" class="hover:text-primary transition-colors">Home</a></li>
            <li><a href="recipes.html" class="hover:text-primary transition-colors">Recipes</a></li>
            <li><a href="competition.html" class="hover:text-primary transition-colors">Competitions</a></li>
            <li><a href="shop.html" class="hover:text-primary transition-colors">Shop</a></li>
            <li><a href="about.html" class="hover:text-primary transition-colors">About Us</a></li>
            <li><a href="contact.html" class="hover:text-primary transition-colors">Contact Us</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-lg font-bold mb-4">Categories</h3>
          <ul class="space-y-2">
            <li><a href="#" class="hover:text-primary transition-colors">Breakfast</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Lunch</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Dinner</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Desserts</a></li>
            <li><a href="#" class="hover:text-primary transition-colors">Vegetarian</a></li>
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

  <!-- JavaScript for Mobile Menu Toggle and FAQ -->
  <script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      const mobileMenu = document.getElementById('mobile-menu');
      mobileMenu.classList.toggle('hidden');
    });

    function toggleFAQ(id) {
      const answer = document.getElementById(`faq-answer-${id}`);
      const icon = document.getElementById(`faq-icon-${id}`);

      answer.classList.toggle('hidden');
      icon.classList.toggle('fa-chevron-down');
      icon.classList.toggle('fa-chevron-up');
    }
  </script>
</body>
</html>
