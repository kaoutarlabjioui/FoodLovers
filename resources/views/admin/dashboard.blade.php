@extends('admin.layout')
@section('title','Tableau de bord - Administration FoodLovers')




@section('js')
  <!-- JavaScript -->
  <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      document.getElementById('mobile-sidebar').classList.remove('-translate-x-full');
      document.getElementById('mobile-overlay').classList.remove('hidden');
    });

    document.getElementById('close-sidebar').addEventListener('click', function() {
      document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
      document.getElementById('mobile-overlay').classList.add('hidden');
    });

    document.getElementById('mobile-overlay').addEventListener('click', function() {
      document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
      document.getElementById('mobile-overlay').classList.add('hidden');
    });

    // Modal handling
    const modals = {
      'add-recipe-modal': document.getElementById('add-recipe-modal'),
      'add-user-modal': document.getElementById('add-user-modal'),
      'add-task-modal': document.getElementById('add-task-modal')
    };

    // Open modals
    document.getElementById('add-recipe-btn').addEventListener('click', function() {
      modals['add-recipe-modal'].classList.remove('hidden');
    });

    document.getElementById('add-task-btn').addEventListener('click', function() {
      modals['add-task-modal'].classList.remove('hidden');
    });

    // Close modals
    const closeButtons = document.querySelectorAll('.close-modal');
    closeButtons.forEach(button => {
      button.addEventListener('click', function() {
        for (const key in modals) {
          modals[key].classList.add('hidden');
        }
      });
    });

    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
      for (const key in modals) {
        if (event.target === modals[key]) {
          modals[key].classList.add('hidden');
        }
      }
    });

    // Charts
    const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
    const userGrowthChart = new Chart(userGrowthCtx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
        datasets: [{
          label: 'Nouveaux utilisateurs',
          data: [120, 145, 180, 220, 210, 250, 285, 320, 350, 370, 410, 430],
          backgroundColor: 'rgba(255, 107, 107, 0.1)',
          borderColor: '#FF6B6B',
          borderWidth: 2,
          tension: 0.3,
          pointBackgroundColor: '#FF6B6B',
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              display: true,
              color: 'rgba(0, 0, 0, 0.05)'
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        }
      }
    });

    const recipeCategoriesCtx = document.getElementById('recipeCategoriesChart').getContext('2d');
    const recipeCategoriesChart = new Chart(recipeCategoriesCtx, {
      type: 'doughnut',
      data: {
        labels: ['Desserts', 'Plats principaux', 'Entrées', 'Boissons', 'Petit-déjeuner', 'Autres'],
        datasets: [{
          data: [35, 25, 15, 10, 10, 5],
          backgroundColor: [
            '#FF6B6B',
            '#4ECDC4',
            '#FFE66D',
            '#1A535C',
            '#F7B267',
            '#A5A58D'
          ],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'right',
            labels: {
              boxWidth: 12,
              padding: 15
            }
          }
        },
        cutout: '70%'
      }
    });
  </script>
@endsection


