@extends('layouts')
@section('content')

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
      @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg shadow-md dark:bg-green-200 dark:text-green-900" role="alert">
        <span class="font-medium">Succès :</span> {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg shadow-md dark:bg-red-200 dark:text-red-900" role="alert">
        <span class="font-medium">Erreur :</span> {{ session('error') }}
    </div>
@endif
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
      @foreach($competitions as $competition)
        <!-- Competition 1 -->
        <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">

          <div class="relative">
            <img src="https://npr.brightspotcdn.com/dims4/default/1bd6b9c/2147483647/strip/true/crop/768x360+0+0/resize/1760x826!/format/webp/quality/90/?url=http%3A%2F%2Fnpr-brightspot.s3.amazonaws.com%2F54%2F0a%2Fc673ab8445a18a37241611140f27%2F360-f-436660407-tiu4y4rrxwpd7uyy5kjzmttapn2kciwl.jpeg" alt="Desserts d'été" class="w-full h-48 object-cover">
            <!-- <div class="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">
              En cours
            </div> -->
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold mb-2">{{$competition->name}}</h3>
            <p class="text-gray-600 mb-4">{{$competition->description}}</p>
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <i class="fas fa-calendar-alt mr-2"></i>
              <span>{{$competition->date_debut}} - {{$competition->date_fin}}</span>
            </div>
          </div>

          <form action="/inscrire" method="post">
            @csrf
            <input type="hidden" name="competition_id" value="{{ $competition->id }}">
          <button class="bg-white hover:bg-gray-100 text-dark font-medium py-3 px-6 rounded-lg transition-colors inline-flex items-center justify-center">
            <i class="fas fa-user-plus mr-2"></i>
            S'inscrire
          </button>
          </form>
        </div>
        @endforeach
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
@endsection

@section('js')
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
@endsection
