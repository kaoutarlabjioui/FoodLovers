<div class="container mx-auto px-4">
      <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-display font-bold">Ustensiles de Cuisine</h2>
        <a href="#" class="text-primary hover:underline">Voir tout <i class="fas fa-arrow-right ml-1"></i></a>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Product Card 1 -->
         @foreach($produits as $produit)
        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
          <div class="relative">
            <img src="{{url('/storage/'. $produit->photo)}}" alt="{{$produit->nom}}" class="h-64 w-full object-cover group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <form action="/detailsproduit" method="POST" class="inline">
                @csrf

                <input type="hidden" name="produit" value="{{ $produit->id }}">
                <button type="submit" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                    <i class="fas fa-eye"></i>
                </button>
            </form>
              <button class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-heart"></i>
              </button>
              <a href="/panier" class="bg-white text-dark p-2 rounded-full mx-1 hover:bg-primary hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
              </a>
            </div>
          </div>
          <div class="p-4">
            <h3 class="font-bold text-lg mb-1 hover:text-primary transition-colors">
              <a href="#">{{$produit->nom}}</a>
            </h3>
            <div class="flex justify-between items-center">
              <div class="text-lg font-bold text-primary">{{$produit->prix}}Dh</div>
              <div class="text-lg font-bold text-primary">{{$produit->stock}}</div>
              <form action="{{ route('panier.ajouter') }}" method="POST">
                @csrf
                <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                <input type="hidden" name="nom" value="{{ $produit->nom }}">
                <input type="hidden" name="prix" value="{{ $produit->prix }}">
                <input type="hidden" name="photo" value="{{ $produit->photo }}">
                <input type="hidden" name="quantite" id="quantite_hidden" value="1">

                <button type="submit" title="Ajouter au panier" class="bg-primary text-white p-3 rounded-lg hover:bg-primary/90 transition-colors flex items-center justify-center">
                    <i class="fas fa-shopping-cart mr-2"></i>
                </button>
            </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
