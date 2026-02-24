<?php


    $entreprise = request()->user()->entreprise;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fenghao Motor SN</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('asset/style.css')}}">

    <!-- Icon Image -->
     <link rel="shortcut icon" href="{{asset('asset/logo/logo bas.png')}}"/>

    <style>
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .btn {
            padding: 12px 25px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-light {
            background-color: white;
            color: var(--dark-color);
            border: 1px solid #ddd;
        }
        
        .btn-light:hover {
            background-color: #f5f5f5;
            transform: translateY(-2px);
        }
        
        /* Dashboard */
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .dashboard-card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .card-title {
            font-size: 18px;
            color: var(--gray-color);
            font-weight: 500;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        
        .icon-income {
            background: linear-gradient(135deg, #4caf50, #8bc34a);
        }
        
        .icon-expense {
            background: linear-gradient(135deg, #f44336, #ff9800);
        }
        
        .icon-profit {
            background: linear-gradient(135deg, #2196f3, #03a9f4);
        }
        
        .icon-cash {
            background: linear-gradient(135deg, #9c27b0, #673ab7);
        }
        
        .card-value {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .card-value.positive {
            color: var(--success-color);
        }
        
        .card-value.negative {
            color: var(--danger-color);
        }
        
        .card-trend {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }
        
        .trend-up {
            color: var(--success-color);
        }
        
        .trend-down {
            color: var(--danger-color);
        }
        
        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .chart-card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .chart-title {
            font-size: 20px;
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .period-selector {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .period-btn {
            padding: 8px 15px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background-color: white;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .period-btn.active {
            background-color: var(--secondary-color);
            color: white;
            border-color: var(--secondary-color);
        }
        
        .chart-container {
            height: 300px;
            position: relative;
        }
        
        canvas {
            width: 100% !important;
            height: 100% !important;
        }

        
        @media (max-width: 992px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }
    </style>    
    
</head>
<body>
    <!-- Sidebar -->
    @include('partials.sidebar')
    
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">

        <!-- Top Bar -->
        <div class="top-bar d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h2 class="h4 mb-0" id="pageTitle">Bienvenue</h2>
            </div>
            
            <div class="d-flex align-items-center">
                <!-- Search Bar - Hidden on mobile -->
                <div class="d-none d-md-block me-3">
                    @if($alerte)
                        <div class="alert alert-danger">
                            ⛔ Vous avez <b><?= $alerte ?></b> produit(s) en rupture de stock. Merci de mettre a jour !
                        </div>
                    @endif
                </div>
                
                <!-- Notifications -->
                <div class="dropdown me-3">
                    <button class="btn btn-light dropdown-toggle" type="button" id="notificationsDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>     
                        @if($alerte)
                            <span class="badge bg-danger rounded-pill">
                                1   
                            </span>
                        @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <!--<li><h6 class="dropdown-header">Notifications</h6></li>-->
                        @if($alerte)
                            <li>
                                <a class="dropdown-item alert alert-info" href="{{ route('mouvements') }}">⛔ <b><?= $alerte ?></b> produit(s) est en rupture de stock.</a>
                            </li>
                        @endif
                    </ul>
                    
                </div>
                
                <!-- Mobile Search Button -->
                <button class="btn btn-light d-md-none me-2" id="mobileSearchBtn">
                    <i class="fas fa-search"></i>
                </button>
                
                <!-- User Menu -->
                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <!--<span class="badge bg-success">{{strtoupper(Auth::user()->name[0]) }}</span>-->
                        <!--<i class="fas fa-user-check text-success me-2"></i>-->
                        <div class="user-info">
                            <div class="user-avatar">
                                <img src="{{asset('asset/logo/user.png')}}" width="25" class="rounded-circle" alt="">
                            </div>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2 text-primary"></i> Mon profil</a></li>
                        <li><a class="dropdown-item" href="{{ route('parametre') }}"><i class="fas fa-cog me-2 text-primary"></i> Parametre</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                        @csrf    
                                <a class="dropdown-item" href="{{route('logout')}}"onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Déconnexion</a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
    
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">

                    <!-- Dashboard -->
                    <section class="dashboard">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h3 class="card-title">Total Recettes</h3>
                                <div class="card-icon icon-income">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                            </div>
                            <div class="card-value" id="total-revenus">XOF 124,850.00</div>
                            <div class="card-trend trend-up">
                                <!--<i class="fas fa-arrow-up"></i>
                                <span id="revenus-trend">+12% vs mois précédent</span>-->
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h3 class="card-title">Total Dépenses</h3>
                                <div class="card-icon icon-expense">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                            </div>
                            <div class="card-value" id="total-depenses">XOF 78,430.00</div>
                            <div class="card-trend trend-down">
                                <!--<i class="fas fa-arrow-down"></i>
                                <span id="depenses-trend">-5% vs mois précédent</span>-->
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h3 class="card-title">Résultat Net</h3>
                                <div class="card-icon icon-profit">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <div class="card-value positive" id="resultat-net">XOF 46,420.00</div>
                            <div class="card-trend trend-up">
                                <i class="fas fa-arrow-up"></i>
                                <span>Bénéfice ce mois</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h3 class="card-title">Trésorerie Actuelle</h3>
                                <div class="card-icon icon-cash">
                                    <i class="fas fa-wallet"></i>
                                </div>
                            </div>
                            <div class="card-value" id="tresorerie">XOF 89,250.00</div>
                            <div class="card-trend trend-up">
                                <i class="fas fa-arrow-up"></i>
                                <span>Solde disponible</span>
                            </div>
                        </div>
                    </section>

                    <!-- Charts Section avec Graphiques -->
                    <section class="charts-section">
                        <!-- Graphique 1: Évolution des Recettes et Dépenses -->
                        <div class="chart-card">
                            <div class="chart-header">
                                <h3 class="chart-title">Évolution des Recettes et Dépenses</h3>
                                <div class="period-selector" id="period-selector-1">
                                    <button class="period-btn active" data-period="mensuel">Mensuel</button>
                                    <button class="period-btn" data-period="trimestriel">Trimestriel</button>
                                    <button class="period-btn" data-period="annuel">Annuel</button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="evolutionChart"></canvas>
                            </div>
                        </div>
                        
                        <!-- Graphique 2: Répartition des Dépenses -->
                        <div class="chart-card">
                            <div class="chart-header">
                                <h3 class="chart-title">Répartition des Top Produits</h3>
                                <div class="period-selector" id="period-selector-2">
                                    <button class="period-btn active" data-period="mois">Ce mois</button>
                                    <button class="period-btn" data-period="annee">Cette année</button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <canvas id="repartitionChart"></canvas>
                            </div>
                        </div>
                    </section>
            </section>
            
        </div>
        

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-muted">© <?= now()->year ?> Fenghao Motor SN. Tous droits réservés.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 text-muted">Version 1.0.0</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>



    <script>

        // ============================================
        // DONNÉES COMPTABLES POUR LES GRAPHIQUES
        // ============================================

        // Configuration des couleurs
        const colors = {
            primary: '#3949ab',
            secondary: '#5c6bc0',
            success: '#4caf50',
            danger: '#f44336',
            warning: '#ff9800',
            info: '#2196f3',
            purple: '#9c27b0',
            teal: '#009688',
            orange: '#ff5722',
            pink: '#e91e63',
            categories: [
                '#4caf50', '#f44336', '#2196f3', '#ff9800', 
                '#9c27b0', '#009688', '#ff5722', '#e91e63',
                '#3f51b5', '#00bcd4', '#8bc34a', '#ffc107'
            ]
        };

        // ============================================
        // DONNÉES MENSUELLES - ANNÉE EN COURS
        // ============================================
        const monthlyData = @json($monthlyData);
        

        // ============================================
        // DONNÉES TRIMESTRIELLES
        // ============================================
        const quarterlyData = @json($quarterlyData);


        // ============================================
        // DONNÉES ANNUELLES
        // ============================================

        const yearlyData = @json($yearlyData);

        // ============================================
        // DONNÉES DE RÉPARTITION DES DÉPENSES - MOIS
        // ============================================
        
        const expensesDistributionMonth = {
            categories: @json($categories),
            amounts: @json($amounts),
            colors: ['#4caf50', '#2196f3', '#ff9800', '#f44336', 
                     '#9c27b0', '#009688', '#ff5722', '#e91e63']
        };

        // ============================================
        // DONNÉES DE RÉPARTITION DES DÉPENSES - ANNÉE
        // ============================================
        
       const expensesDistributionYear = {
            categories: @json($yearCategories),
            amounts: @json($yearAmounts),
             
        };

        // ============================================
        // INITIALISATION DES GRAPHIQUES
        // ============================================
        
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser les graphiques
            initEvolutionChart('mensuel');
            initRepartitionChart('mois');
            
            // Mettre à jour les valeurs du dashboard
            updateDashboardValues();
            
            // Gestionnaires d'événements pour les boutons de période
            setupPeriodButtons();
        });

        // ============================================
        // GRAPHIQUE 1: ÉVOLUTION DES RECETTES ET DÉPENSES
        // ============================================
        
        let evolutionChart;
        
        function initEvolutionChart(period) {
            const ctx = document.getElementById('evolutionChart').getContext('2d');
            
            let labels, revenueData, expenseData, profitData, title;
            
            switch(period) {
                case 'mensuel':
                    labels = monthlyData.months;
                    revenueData = monthlyData.revenues;
                    expenseData = monthlyData.expenses;
                    profitData = monthlyData.profits;
                    title = 'Évolution mensuelle <?= now()->year ?>';
                    break;
                case 'trimestriel':
                    labels = quarterlyData.quarters;
                    revenueData = quarterlyData.revenues;
                    expenseData = quarterlyData.expenses;
                    profitData = quarterlyData.profits;
                    title = 'Évolution trimestrielle <?= now()->year ?>';
                    break;
                case 'annuel':
                    labels = yearlyData.years;
                    revenueData = yearlyData.revenues;
                    expenseData = yearlyData.expenses;
                    profitData = yearlyData.profits;
                    title = 'Évolution annuelle de 2 ans à <?= now()->year ?>';
                    break;
            }
            
            // Détruire le graphique existant s'il y en a un
            if (evolutionChart) {
                evolutionChart.destroy();
            }
            
            evolutionChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Recettes',
                            data: revenueData,
                            borderColor: colors.success,
                            backgroundColor: 'rgba(76, 175, 80, 0.1)',
                            borderWidth: 3,
                            pointBackgroundColor: colors.success,
                            pointBorderColor: 'white',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            tension: 0.3,
                            fill: false
                        },
                        {
                            label: 'Dépenses',
                            data: expenseData,
                            borderColor: colors.danger,
                            backgroundColor: 'rgba(244, 67, 54, 0.1)',
                            borderWidth: 3,
                            pointBackgroundColor: colors.danger,
                            pointBorderColor: 'white',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            tension: 0.3,
                            fill: false
                        },
                        {
                            label: 'Bénéfice',
                            data: profitData,
                            borderColor: colors.info,
                            backgroundColor: 'rgba(33, 150, 243, 0.1)',
                            borderWidth: 2,
                            borderDash: [5, 5],
                            pointBackgroundColor: colors.info,
                            pointBorderColor: 'white',
                            pointBorderWidth: 2,
                            pointRadius: 3,
                            pointHoverRadius: 5,
                            tension: 0.3,
                            fill: false,
                            hidden: false // Caché par défaut, peut être activé
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: title,
                            font: {
                                size: 14,
                                weight: '500'
                            },
                            padding: {
                                bottom: 20
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    let value = context.raw || 0;
                                    return `${label}: ${value.toLocaleString('fr-FR')} XOF`;
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                boxWidth: 6
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return  value.toLocaleString('fr-FR') + 'XOF ';
                                }
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
        }

        // ============================================
        // GRAPHIQUE 2: RÉPARTITION DES DÉPENSES
        // ============================================
        
        let repartitionChart;
        
        function initRepartitionChart(period) {
            const ctx = document.getElementById('repartitionChart').getContext('2d');
            
            let labels, data, backgroundColors, title;
            
            if (period === 'mois') {
                labels = expensesDistributionMonth.categories;
                data = expensesDistributionMonth.amounts;
                backgroundColors = expensesDistributionMonth.colors;
                title =  new Date().toLocaleDateString('fr-FR', { month: 'long' });
            } else {
                labels = expensesDistributionYear.categories;
                data = expensesDistributionYear.amounts;
                backgroundColors = colors.categories;
                title = 'Dépenses annuelles - <?= now()->year ?>';
            }
            
            // Détruire le graphique existant
            if (repartitionChart) {
                repartitionChart.destroy();
            }
            
            repartitionChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColors,
                        borderColor: 'white',
                        borderWidth: 2,
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: title,
                            font: {
                                size: 14,
                                weight: '500'
                            },
                            padding: {
                                bottom: 20
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    let value = context.raw || 0;
                                    let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    let percentage = ((value / total) * 100).toFixed(1);
                                    return `${label}: XOF ${value.toLocaleString('fr-FR')} (${percentage}%)`;
                                }
                            }
                        },
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12,
                                padding: 15,
                                font: {
                                    size: 11
                                }
                            }
                        }
                    },
                    cutout: '60%',
                    layout: {
                        padding: {
                            top: 20,
                            bottom: 20
                        }
                    }
                }
            });
        }

        // ============================================
        // GESTIONNAIRES DE PÉRIODE
        // ============================================
        
        function setupPeriodButtons() {
            // Boutons pour le graphique d'évolution
            document.querySelectorAll('#period-selector-1 .period-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    // Retirer la classe active de tous les boutons
                    document.querySelectorAll('#period-selector-1 .period-btn').forEach(b => {
                        b.classList.remove('active');
                    });
                    // Ajouter la classe active au bouton cliqué
                    this.classList.add('active');
                    
                    // Mettre à jour le graphique avec la période sélectionnée
                    const period = this.getAttribute('data-period');
                    initEvolutionChart(period);
                    
                    // Mettre à jour les valeurs du dashboard en fonction de la période
                    updateDashboardValuesForPeriod(period);
                });
            });
            
            // Boutons pour le graphique de répartition
            document.querySelectorAll('#period-selector-2 .period-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('#period-selector-2 .period-btn').forEach(b => {
                        b.classList.remove('active');
                    });
                    this.classList.add('active');
                    
                    const period = this.getAttribute('data-period');
                    initRepartitionChart(period);
                });
            });
        }

        // ============================================
        // MISE À JOUR DES VALEURS DU DASHBOARD
        // ============================================
        
        function updateDashboardValues() {
            // Utiliser les données du mois actuel (index 10)
            const currentMonth = new Date().getMonth(); // Mois (0-indexed)
            
            document.getElementById('total-revenus').textContent = 
                `${monthlyData.revenues[currentMonth].toLocaleString('fr-FR')} XOF`;
            
            document.getElementById('total-depenses').textContent = 
                `${monthlyData.expenses[currentMonth].toLocaleString('fr-FR')} XOF`;
            
            document.getElementById('resultat-net').textContent = 
                `${monthlyData.profits[currentMonth].toLocaleString('fr-FR')} XOF`;
            
            // Trésorerie (cumul des bénéfices)
            let tresorerie = 0;
            for(let i = 0; i <= currentMonth; i++) {
                tresorerie += monthlyData.profits[i];
            }
            document.getElementById('tresorerie').textContent = 
                `${tresorerie.toLocaleString('fr-FR')} XOF`;
        }
        
        function updateDashboardValuesForPeriod(period) {
            if (period === 'mensuel') {
                updateDashboardValues();
            } else if (period === 'trimestriel') {
                // Utiliser les données du T4
                document.getElementById('total-revenus').textContent = 
                    `${quarterlyData.revenues[3].toLocaleString('fr-FR')} XOF`;
                document.getElementById('total-depenses').textContent = 
                    `${quarterlyData.expenses[3].toLocaleString('fr-FR')} XOF`;
                document.getElementById('resultat-net').textContent = 
                    `${quarterlyData.profits[3].toLocaleString('fr-FR')} XOF`;
                document.getElementById('tresorerie').textContent = 
                    `${quarterlyData.profits[3].toLocaleString('fr-FR')} XOF`;
            } else if (period === 'annuel') {
                // Utiliser les données actuelles
                document.getElementById('total-revenus').textContent = 
                    `${yearlyData.revenues[4].toLocaleString('fr-FR')} XOF`;
                document.getElementById('total-depenses').textContent = 
                    `${yearlyData.expenses[4].toLocaleString('fr-FR')} XOF`;
                document.getElementById('resultat-net').textContent = 
                    `${yearlyData.profits[4].toLocaleString('fr-FR')} XOF`;
                document.getElementById('tresorerie').textContent = 
                    `${yearlyData.profits[4].toLocaleString('fr-FR')} XOF`;
            }
        }

        // ============================================
        // FONCTIONS D'EXPORT POUR LES GRAPHIQUES
        // ============================================
        
        function exportChartAsImage(chartId, fileName) {
            const canvas = document.getElementById(chartId);
            const link = document.createElement('a');
            link.download = `${fileName}.png`;
            link.href = canvas.toDataURL('image/png');
            link.click();
        }

        // ============================================
        // SIMULATION DE DONNÉES EN TEMPS RÉEL
        // ============================================
        
        // Fonction pour générer des données aléatoires (démonstration)
        function generateRandomData() {
            const newRevenue = monthlyData.revenues[10] + (Math.random() * 2000 - 1000);
            const newExpense = monthlyData.expenses[10] + (Math.random() * 1000 - 500);
            
            document.getElementById('total-revenus').textContent = 
                `XOF ${Math.round(newRevenue).toLocaleString('fr-FR')}.00`;
            document.getElementById('total-depenses').textContent = 
                `XOF ${Math.round(newExpense).toLocaleString('fr-FR')}.00`;
            document.getElementById('resultat-net').textContent = 
                `XOF ${Math.round(newRevenue - newExpense).toLocaleString('fr-FR')}.00`;
        }

        // ============================================
        // EXPORT DES DONNÉES AU FORMAT CSV
        // ============================================
        
        function exportMonthlyDataToCSV() {
            let csv = "Mois,Recettes,Dépenses,Bénéfice\n";
            
            monthlyData.months.forEach((month, index) => {
                csv += `${month},${monthlyData.revenues[index]},${monthlyData.expenses[index]},${monthlyData.profits[index]}\n`;
            });
            
            const blob = new Blob([csv], { type: 'text/csv' });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'donnees_comptables_2023.csv';
            a.click();
            window.URL.revokeObjectURL(url);
        }

        // Ajouter des écouteurs pour les boutons d'export
        document.addEventListener('DOMContentLoaded', function() {
            // Exemple d'utilisation
            const exportBtn = document.querySelector('.btn-primary i.fa-file-export').parentElement;
            if (exportBtn) {
                exportBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    exportMonthlyDataToCSV();
                });
            }
        });

 
        // Exécuter les calculs
        const yearlyStats = calculateYearlyStats();
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    <script src="{{asset('asset/main.js')}}"></script>
</body>
</html>
