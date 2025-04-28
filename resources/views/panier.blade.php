@extends('layouts')

@section('content')
  <!-- Page Title -->
  <section class="bg-gradient-to-r from-primary/10 to-secondary/10 py-10">
    <div class="container mx-auto px-4">
      <h1 class="text-3xl md:text-4xl font-display font-bold text-center">Votre Panier</h1>
      <p class="text-center text-gray-600 mt-2">Vérifiez et modifiez vos articles avant de passer commande</p>
    </div>
  </section>

  <!-- Cart Content -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      @if(count($panier) > 0)
        <div class="flex flex-col lg:flex-row gap-8">
          <!-- Cart Items -->
          <div class="lg:w-2/3">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
              <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                  <h2 class="text-xl font-bold">Articles dans votre panier ({{ count($panier) }})</h2>
                  <form action="{{ route('panier.vider') }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir vider votre panier ?')">
                    @csrf
                    <button type="submit" id="clear-cart" class="text-sm text-gray-500 hover:text-primary transition-colors flex items-center">
                        <i class="fas fa-trash-alt mr-2"></i> Vider le panier
                    </button>
                    </form>
                </div>
              </div>
              <!-- <pre>{{ print_r(session('panier'), true) }}</pre> -->
              <!-- Cart Items List -->
              @foreach($panier as $id => $item)
                <div class="p-6 border-b border-gray-100 hover:bg-gray-50 transition-colors" id="cart-item-{{ $id }}">
                  <div class="flex flex-col sm:flex-row items-center gap-6">
                    <!-- Product Image -->
                    <div class="sm:w-28 h-28 flex-shrink-0">
                      <img src="{{ url('/storage/' . $item['photo']) }}" alt="{{ $item['nom'] }}" class="w-full h-full object-cover rounded-lg shadow-sm">
                    </div>

                    <!-- Product Info -->
                    <div class="flex-1 w-full sm:w-auto">
                      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start">
                        <h3 class="font-bold text-lg mb-2">{{ $item['nom'] }}</h3>
                        <div class="text-lg font-bold text-primary">{{ $item['prix'] * $item['quantite'] }} Dh</div>
                      </div>

                      <div class="flex flex-wrap items-center justify-between gap-4 mt-3">
                        <!-- Quantity Controls -->
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">

                          <form action="{{ route('panier.updateQuantite', $id) }}" method="POST" class="flex items-center space-x-2">
                                @csrf
                                <!-- <button class="quantity-btn px-3 py-2 bg-gray-100 hover:bg-gray-200 transition-colors" data-action="decrease" data-id="{{ $id }}">
                            <i class="fas fa-minus text-gray-600"></i>
                          </button>
                          <span class="quantity-value px-4 py-2 border-x border-gray-300 min-w-[40px] text-center">{{ $item['quantite'] }}</span>
                          <button class="quantity-btn px-3 py-2 bg-gray-100 hover:bg-gray-200 transition-colors" data-action="increase" data-id="{{ $id }}" data-stock="{{ $item['stock'] ?? 0 }}">
                            <i class="fas fa-plus text-gray-600"></i>
                          </button> -->
                                <input type="number" name="quantite" value="{{ $item['quantite'] }}" class="w-16 p-2 border rounded-md text-center" min="1" max="{{ $item['stock'] ?? 0 }}" required>
                                <button type="submit" id="update-cart" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-sync-alt mr-2"></i> Mettre à jour
                                </button>
                            </form>

                        </div>

                        <!-- Item Price -->
                        <div class="text-sm text-gray-500">
                          Prix unitaire: <span class="font-medium">{{ $item['prix'] }} Dh</span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-3 ml-auto">
                          <button class="save-for-later text-gray-400 hover:text-primary transition-colors" data-id="{{ $id }}" title="Sauvegarder pour plus tard">
                            <i class="fas fa-heart"></i>
                          </button>
                          <form action="{{ route('panier.supprimer') }}" method="POST">
                            @csrf
                            <input type="hidden" name="produit_id" value="{{ $id }}">
                            @method('DELETE')
                            <button type="submit" class="text-primary hover:underline flex items-center">
                                <i class="fas fa-trash-alt mr-2"></i> Supprimer
                            </button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


              <!-- Cart Actions -->
              <div class="p-6 bg-gray-50">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">

                  <div class="flex items-center gap-4 w-full sm:w-auto justify-end">
                    <a href="/boutique" class="text-primary hover:underline flex items-center">
                      <i class="fas fa-arrow-left mr-2"></i> Continuer les achats
                    </a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <!-- Order Summary -->
          <div class="lg:w-1/3">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden sticky top-24">
              <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold">Récapitulatif de la commande</h2>
              </div>
              <div class="p-6">
                <div class="space-y-4 mb-6">

                  <div class="border-t border-gray-100 pt-4 mt-4 flex justify-between items-center">
                    <span class="font-bold text-lg">Total</span>
                    <span class="font-bold text-primary text-xl" id="total">
                      @php
                      $subtotal = 0;
                        foreach($panier as $item) {
                          $subtotal += $item['prix'] * $item['quantite'];
                        }
                        $total = $subtotal ;
                        echo $total . ' Dh';
                      @endphp
                    </span>
                  </div>
                </div>
                @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
                <form action="/commandes/page" method="POST">
                @csrf
                <button id="checkout-btn" type="submit" class="w-full bg-primary text-white py-3 rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center gap-2 mb-6">
                  <i class="fas fa-lock"></i> Procéder au paiement
                </button>
                </form>
                <!-- Payment Methods -->
                <div class="flex justify-center space-x-4 mb-6">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" alt="Visa" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" alt="Mastercard" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1280px-PayPal.svg.png" alt="PayPal" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Apple_Pay_logo.svg/1280px-Apple_Pay_logo.svg.png" alt="Apple Pay" class="h-6 opacity-70 hover:opacity-100 transition-opacity">
                </div>

                <!-- Shipping & Returns Info -->
                <div class="text-sm text-gray-500 space-y-2">
                  <div class="flex items-center gap-2">
                    <i class="fas fa-truck text-primary"></i>
                    <p>Livraison gratuite à partir de 200 Dh d'achat</p>
                  </div>
                  <div class="flex items-center gap-2">
                    <i class="fas fa-undo text-primary"></i>
                    <p>Retours acceptés sous 30 jours</p>
                  </div>
                  <div class="flex items-center gap-2">
                    <i class="fas fa-shield-alt text-primary"></i>
                    <p>Paiement 100% sécurisé</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @else
        <!-- Empty Cart -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden p-8 text-center">
          <div class="max-w-md mx-auto">
            <div class="text-6xl text-gray-300 mb-6">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <h2 class="text-2xl font-bold mb-4">Votre panier est vide</h2>
            <p class="text-gray-600 mb-6">Vous n'avez pas encore ajouté d'articles à votre panier.</p>
            <a href="/boutique" class="inline-block bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors">
              Découvrir nos produits
            </a>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection

@section('js')
<script>
  // Mobile menu toggle
  document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.toggle('hidden');
  });

  // Quantity buttons
  document.querySelectorAll('.quantity-btn').forEach(button => {
    button.addEventListener('click', function() {
      const action = this.getAttribute('data-action');
      const id = this.getAttribute('data-id');
      const quantityElement = this.parentElement.querySelector('.quantity-value');
      const stock = parseInt(this.getAttribute('data-stock')) || Infinity;
      let quantity = parseInt(quantityElement.textContent);

      if (action === 'decrease' && quantity > 1) {
        quantity--;
      } else if (action === 'increase' && quantity < stock) {
        quantity++;
      }

      quantityElement.textContent = quantity;

      // Here you would typically update the cart via AJAX
      // updateCartItem(id, quantity);

      // For demo purposes, let's update the price display
      updateItemPrice(id, quantity);
    });
  });

  // Remove item button
  document.querySelectorAll('.remove-item').forEach(button => {
    button.addEventListener('click', function() {
      const id = this.getAttribute('data-id');
      const cartItem = document.getElementById('cart-item-' + id);

      // Animation for removal
      cartItem.style.transition = 'all 0.3s ease';
      cartItem.style.opacity = '0';
      cartItem.style.height = '0';
      cartItem.style.overflow = 'hidden';

      setTimeout(() => {
        cartItem.remove();
        updateCartTotals();

        // Check if cart is empty
        if (document.querySelectorAll('[id^="cart-item-"]').length === 0) {
          location.reload(); // Reload to show empty cart state
        }
      }, 300);

      // Here you would typically remove the item via AJAX
      // removeCartItem(id);
    });
  });

  // Save for later
  document.querySelectorAll('.save-for-later').forEach(button => {
    button.addEventListener('click', function() {
      this.classList.toggle('text-primary');

      // Here you would typically save the item for later via AJAX
      // saveForLater(this.getAttribute('data-id'));

      // Show feedback
      const toast = document.createElement('div');
      toast.className = 'fixed bottom-4 right-4 bg-primary text-white px-4 py-2 rounded-lg shadow-lg z-50';
      toast.textContent = 'Article sauvegardé pour plus tard';
      document.body.appendChild(toast);

      setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transition = 'opacity 0.5s ease';
        setTimeout(() => toast.remove(), 500);
      }, 2000);
    });
  });

  // Update cart button
  document.getElementById('update-cart')?.addEventListener('click', function() {
    // Here you would typically update the entire cart via AJAX
    // updateCart();

    // Show feedback
    this.innerHTML = '<i class="fas fa-check mr-2"></i> Mis à jour';
    this.classList.remove('bg-gray-200', 'text-gray-700');
    this.classList.add('bg-green-500', 'text-white');

    setTimeout(() => {
      this.innerHTML = '<i class="fas fa-sync-alt mr-2"></i> Mettre à jour';
      this.classList.remove('bg-green-500', 'text-white');
      this.classList.add('bg-gray-200', 'text-gray-700');
    }, 2000);
  });

  // Clear cart button
  document.getElementById('clear-cart')?.addEventListener('click', function() {
    if (confirm('Êtes-vous sûr de vouloir vider votre panier ?')) {
      // Here you would typically clear the cart via AJAX
      // clearCart();

      location.reload(); // Reload to show empty cart state
    }
  });

  // Checkout button
  document.getElementById('checkout-btn')?.addEventListener('click', function() {
    window.location.href = '/checkout';
  });

  // Helper function to update item price display
  function updateItemPrice(id, quantity) {
    const cartItem = document.getElementById('cart-item-' + id);
    const priceElement = cartItem.querySelector('.text-primary');
    const unitPriceText = cartItem.querySelector('.text-gray-500 .font-medium').textContent;
    const unitPrice = parseFloat(unitPriceText.replace(' Dh', ''));

    const newPrice = (unitPrice * quantity).toFixed(2);
    priceElement.textContent = newPrice + ' Dh';

    updateCartTotals();
  }

  // Helper function to update cart totals
  function updateCartTotals() {
    let subtotal = 0;

    // Calculate subtotal
    document.querySelectorAll('[id^="cart-item-"]').forEach(item => {
      const priceText = item.querySelector('.text-primary').textContent;
      const price = parseFloat(priceText.replace(' Dh', ''));
      subtotal += price;
    });

    // Update subtotal display
    const subtotalElement = document.getElementById('subtotal');
    subtotalElement.textContent = subtotal.toFixed(2) + ' Dh';

    // Get shipping cost
    const shippingText = document.getElementById('shipping').textContent;
    const shipping = parseFloat(shippingText.replace(' Dh', ''));

    // Get discount
    const discountText = document.getElementById('discount').textContent;
    const discount = parseFloat(discountText.replace('-', '').replace(' Dh', ''));

    // Calculate and update total
    const total = subtotal + shipping - discount;
    document.getElementById('total').textContent = total.toFixed(2) + ' Dh';
  }
</script>
@endsection
