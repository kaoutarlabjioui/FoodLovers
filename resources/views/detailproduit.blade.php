@extends('layouts')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-3">
  <div class="container mx-auto px-4">
    <div class="flex items-center text-sm">
      <a href="/" class="text-gray-500 hover:text-primary">Accueil</a>
      <span class="mx-2 text-gray-400">/</span>
      <a href="/boutique" class="text-gray-500 hover:text-primary">Boutique</a>
      <span class="mx-2 text-gray-400">/</span>
      <a href="#" class="text-gray-500 hover:text-primary">Ustensiles</a>
      <span class="mx-2 text-gray-400">/</span>
      <span class="text-primary">{{ $produit->nom }}</span>
    </div>
  </div>
</div>

<!-- Product Detail Section -->
<section class="py-12">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Product Images -->
      <div class="space-y-4">
        <!-- Main Image -->
        <div class="bg-white rounded-lg overflow-hidden border border-gray-100">
          <img src="{{ url('/storage/'. $produit->photo) }}" alt="{{ $produit->nom }}" class="w-full h-auto object-cover" id="main-image">
        </div>

        <!-- Thumbnail Gallery -->
        <div class="grid grid-cols-4 gap-2">
            <!-- Fallback if no gallery -->
            <div class="cursor-pointer rounded-lg overflow-hidden border border-primary transition-colors">
              <img src="{{ url('/storage/'. $produit->photo) }}" alt="{{ $produit->nom }}" class="w-full h-20 object-cover">
            </div>

        </div>
      </div>

      <!-- Product Info -->
      <div class="space-y-6">
        <div>
          <h1 class="text-3xl font-display font-bold mb-2">{{ $produit->nom }}</h1>
          <div class="flex items-center mb-4">
            <div class="flex text-yellow-400 mr-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <div class="text-2xl font-bold text-primary mb-4">
            <span id="unit-price" data-price="{{ $produit->prix }}">{{ $produit->prix }}</span>Dh
            <span class="text-sm text-gray-500">x <span id="quantity-display">1</span> = </span>
            <span id="total-price">{{ $produit->prix }}</span>Dh
            </div>

          <p class="text-gray-600 mb-6">{{ $produit->description }}</p>
        </div>

        <!-- Stock Status -->
        <div class="flex items-center">
          <span class="mr-2 font-medium">Disponibilité:</span>
          @if($produit->stock > 0)
            <span class="text-green-500 flex items-center">
              <i class="fas fa-check-circle mr-1"></i> En stock ({{ $produit->stock }} disponibles)
            </span>
          @else
            <span class="text-red-500 flex items-center">
              <i class="fas fa-times-circle mr-1"></i> Rupture de stock
            </span>
          @endif
        </div>

        <!-- Add to Cart -->
        <div class="pt-4 border-t border-gray-100">
          <div class="flex flex-wrap items-center gap-4">
            <div class="flex items-center border border-gray-300 rounded-lg">
              <button class="px-3 py-2 text-gray-500 hover:text-primary" onclick="decrementQuantity()">
                <i class="fas fa-minus"></i>
              </button>
              <input type="number" id="quantity" value="1" min="1" max="{{ $produit->stock }}" class="w-12 text-center border-0 focus:ring-0">
              <button class="px-3 py-2 text-gray-500 hover:text-primary" onclick="incrementQuantity()">
                <i class="fas fa-plus"></i>
              </button>
            </div>
            <form action="{{ route('panier.ajouter') }}" method="POST">
                @csrf
                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                <input type="hidden" name="nom" value="{{ $produit->nom }}">
                <input type="hidden" name="prix" value="{{ $produit->prix }}">
                <input type="hidden" name="photo" value="{{ $produit->photo }}">
                <input type="hidden" name="quantite" id="quantite_hidden" value="1">

                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-colors flex items-center">
                    <i class="fas fa-shopping-cart mr-2"></i> Ajouter au panier
                </button>
            </form>
            <button class="p-3 border border-gray-300 rounded-lg text-gray-500 hover:text-primary hover:border-primary transition-colors">
              <i class="fas fa-heart"></i>
            </button>
          </div>
        </div>

        <!-- Product Meta -->
        <div class="pt-4 border-t border-gray-100 space-y-2 text-sm text-gray-500">
            <span class="font-medium">Partager:</span>
            <div class="inline-flex space-x-2 ml-2">
              <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-pinterest"></i></a>
              <a href="#" class="text-gray-500 hover:text-primary"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        </div>
      </div>
    </div>
</section>

<!-- Product Tabs -->
<section class="py-8 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="border-b border-gray-200">
      <nav class="flex flex-wrap -mb-px">
        <button class="tab-button active mr-8 py-4 px-1 border-b-2 border-primary font-medium text-primary" data-tab="description">
          Description
        </button>
        <button class="tab-button mr-8 py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="specifications">
          Spécifications
        </button>
        <button class="tab-button mr-8 py-4 px-1 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="reviews">
          Avis
        </button>
      </nav>
    </div>
</section>
@endsection

@section('js')
<script>


  const inputVisible = document.getElementById('quantity');
  const inputHidden = document.getElementById('quantite_hidden');

  inputVisible.addEventListener('input', function () {
    inputHidden.value = this.value;
  });

  // Recalcul du prix total
  function updateTotalPrice() {
    const unitPrice = parseFloat(document.getElementById('unit-price').dataset.price);
    const quantity = parseInt(document.getElementById('quantity').value);
    const total = unitPrice * quantity;

    document.getElementById('quantity-display').textContent = quantity;
    document.getElementById('total-price').textContent = total.toFixed(2);
  }

  // Incrémenter la quantité
  function incrementQuantity() {
    const input = document.getElementById('quantity');
    const max = parseInt(input.getAttribute('max'));
    const currentValue = parseInt(input.value);
    if (currentValue < max) {
      input.value = currentValue + 1;
      updateTotalPrice();
    }
  }

  // Décrémenter la quantité
  function decrementQuantity() {
    const input = document.getElementById('quantity');
    const currentValue = parseInt(input.value);
    if (currentValue > 1) {
      input.value = currentValue - 1;
      updateTotalPrice();
    }
  }

  // Événements au chargement du DOM
  document.addEventListener('DOMContentLoaded', function () {
    // Mise à jour du prix si changement manuel
    document.getElementById('quantity').addEventListener('input', updateTotalPrice);
    updateTotalPrice();

    // Onglets de la fiche produit
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        tabButtons.forEach(btn => btn.classList.remove('active', 'text-primary', 'border-primary'));
        tabButtons.forEach(btn => btn.classList.add('text-gray-500', 'border-transparent'));
        tabContents.forEach(content => content.classList.add('hidden'));
        tabContents.forEach(content => content.classList.remove('active'));

        button.classList.add('active', 'text-primary', 'border-primary');
        button.classList.remove('text-gray-500', 'border-transparent');

        const tabId = button.getAttribute('data-tab');
        const activeContent = document.getElementById(`${tabId}-tab`);
        activeContent.classList.remove('hidden');
        activeContent.classList.add('active');
      });
    });
  });
</script>

@endsection
