
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fenghao Motor SN</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

     <!-- CSS -->
    <link rel="stylesheet" href="{{asset('asset/style.css')}}">
    
     <!-- Icon Image -->
     <link rel="shortcut icon" href="{{asset('asset/logo/logo bas.png')}}"/>
    
    <style>
        :root {
            --primary-color: #ab0100;
            --secondary-color: #f11615;
            --success-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
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
        
        /* Reste des styles identiques */
        .table-section, .history-section, .quick-actions, footer {
            /* Garder les mêmes styles que précédemment */
        }
        
        @media (max-width: 992px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }
        
        /* Sidebar Styles */
        .sidebar {
            background: #ab0100; /*linear-gradient(180deg, #2c3e50 0%, #1a252f 100%);*/
            color: white;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            transition: all 0.3s;
            box-shadow: 3px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.1);
        }
        
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 250px;
            transition: all 0.3s;
            min-height: 100vh;
        }
        
        /* Stat Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        
        .stat-card .icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        /* Top Bar */
        .top-bar {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        /* User Profile */
        .user-profile {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #f11615, #ab0100);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                margin-left: -250px;
            }
            
            .sidebar.active {
                margin-left: 0;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .top-bar {
                padding: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .stat-card .value {
                font-size: 1.5rem;
            }
            
            .table-responsive {
                font-size: 0.9rem;
            }
        }
        
        @media (max-width: 576px) {
            .top-bar h2 {
                font-size: 1.2rem;
            }
            
            .stat-card {
                padding: 15px;
            }
            
            .stat-card .icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
        
        /* Mobile Menu Button */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #ab0100;
            margin-right: 15px;
        }
        
        @media (max-width: 992px) {
            .menu-toggle {
                display: block;
            }
        }
        
        /* Overlay for mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }
        
        .overlay.active {
            display: block;
        }
        
        /* Chart Container */
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
        
        /* Table Styles */
        .data-table {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .data-table th {
            background: #f8f9fa;
            border: none;
            padding: 15px;
            font-weight: 600;
            color: #495057;
        }
        
        .data-table td {
            padding: 15px;
            border-top: 1px solid #e9ecef;
            vertical-align: middle;
        }
        
        /* Badge Styles */
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .badge-paid {
            background: #d4edda;
            color: #155724;
        }
        
        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .badge-canceled {
            background: #f8d7da;
            color: #721c24;
        }
        
        /* Button Styles */
        .btn-action {
            width: 35px;
            height: 35px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        
        /* Footer */
        .footer {
            background: white;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 1px solid #e9ecef;
        }

        /* rapport */
        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e1e5eb;
        }

        h1 {
            color: #2c3e50;
            font-size: 28px;
        }

        .period-selector {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .period-selector select {
            padding: 8px 15px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background-color: white;
            font-weight: 500;
        }

        .stats-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 24px;
        }

        .orders .stat-icon {
            background-color: #e3f2fd;
            color: #f11615;
        }

        .revenue .stat-icon {
            background-color: #e8f5e9;
            color: #388e3c;
        }

        .products .stat-icon {
            background-color: #fff3e0;
            color: #f57c00;
        }

        .customers .stat-icon {
            background-color: #f3e5f5;
            color: #7b1fa2;
        }

        .stat-info h3 {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-change {
            font-size: 13px;
        }

        .positive {
            color: #27ae60;
        }

        .negative {
            color: #e74c3c;
        }

        .charts-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-bottom: 30px;
        }

        @media (max-width: 1100px) {
            .charts-container {
                grid-template-columns: 1fr;
            }
        }

        .chart-card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h2 {
            font-size: 18px;
            color: #2c3e50;
        }

        .chart-wrapper {
            position: relative;
            height: 300px;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e1e5eb;
            color: #7f8c8d;
            font-size: 14px;
        }

        .export-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-secondary {
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        .btn-secondary:hover {
            background-color: #d5dbdb;
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
                   
                </div>
                
                <!-- Notifications -->
                <div class="dropdown me-3">
                    <button class="btn btn-light dropdown-toggle" type="button" id="notificationsDropdown" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="badge bg-danger rounded-pill">
                            1
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><h6 class="dropdown-header">Notifications</h6></li>
                        <li><a class="dropdown-item" href="#">Paiement reçu de Client XYZ</a></li>
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
                        <i class="fas fa-user-check text-success me-2"></i>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2"></i> Mon profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Parametre</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                        @csrf    
                                <a class="dropdown-item" href="{{route('logout')}}"onclick="event.preventDefault(); this.closest('form').submit();"><i class="fas fa-sign-out-alt me-2"></i> Déconnexion</a>
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
                <div class="dashboard-container">
                    <header>
                        <h1>Rapport Mensuel</h1>
                        <div class="period-selector">
                            <!--<select id="monthSelect">
                                <option value="0">Janvier</option>
                                <option value="1">Février</option>
                                <option value="2">Mars</option>
                                <option value="3">Avril</option>
                                <option value="4">Mai</option>
                                <option value="5">Juin</option>
                                <option value="6">Juillet</option>
                                <option value="7">Août</option>
                                <option value="8" selected>Septembre</option>
                                <option value="9">Octobre</option>
                                <option value="10">Novembre</option>
                                <option value="11">Décembre</option>
                            </select>
                            <select id="yearSelect">
                                <option>2022</option>
                                <option>2023</option>
                                <option selected>2024</option>
                            </select>--> 
                            <!--<div class="export-buttons">
                                <button class="btn btn-secondary" onclick="exportData('png')">Export PNG</button>
                                <button class="btn btn-primary" onclick="exportData('pdf')">Export PDF</button>
                            </div>-->
                        </div>
                    </header>

                   
                    <h5>Donnees Statistiques mensuels:</h5>
                    <div class="stats-summary mb-3"> 
                        @include('partials.data')
                    </div>

                    <h5> Diagrammes graphiques mensuels:</h5>
                        <div class="charts-container">
                           
                            <!--<div class="chart-card">
                                <div class="chart-header">
                                    <h2>Recette Mensuel</h2>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="revenueChart"></canvas>
                                </div>
                            </div>

                            <div class="chart-card">
                                <div class="chart-header">
                                    <h2>Statut des Commandes</h2>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="statusChart"></canvas>
                                </div>
                            </div>-->

                            <div class="chart-card">
                                <div class="chart-header">
                                    <h2>Commandes Mensuelles</h2>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="ordersChart"></canvas>
                                </div>
                            </div>
                            <div class="chart-card">
                                <div class="chart-header">
                                    <h2>Top Produits du Mois</h2>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="productsChart"></canvas>
                                </div>
                            </div>

                            
                        </div>

                    
                </div>
            </section>
                    <main class="container">
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
                                    <h3 class="chart-title">Répartition des Dépenses</h3>
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
                    </main>
        </div>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // ============================================
        // DONNÉES RAPPORTS POUR LES GRAPHIQUES
        // ============================================


        // Données pour les graphiques
        const topProductLabels = @json($topProduitsLabels);
        const topProductData = @json($topProduitsData);
        const commandesMoisLabels = @json($commandesMoisLabels);
        const commandesMoisData = @json($commandesMoisData);

        // Graphique des commandes
        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ordersCtx, {
            type: 'line',
            data: {
                labels: commandesMoisLabels, //['1', '5', '10', '15', '20', '25', '30'],
                datasets: [{
                    label: 'Commandes',
                    data: commandesMoisData, //[45, 52, 48, 65, 70, 75, 82],
                    borderColor: '#3498db',
                    backgroundColor: 'rgba(52, 152, 219, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
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
                        title: {
                            display: true,
                            text: 'Nombre de commandes'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Jours du mois'
                        }
                    }
                }
            }
        });

        // Graphique des produits
        const productsCtx = document.getElementById('productsChart').getContext('2d');
        const productsChart = new Chart(productsCtx, {
            type: 'doughnut',
            data: {
                labels: topProductLabels, //['Produit A', 'Produit B', 'Produit C', 'Produit D', 'Autres'],
                datasets: [{
                    data: topProductData, //[35, 25, 20, 12, 8],
                    backgroundColor: [
                        '#3498db',
                        '#2ecc71',
                        '#e74c3c',
                        '#f39c12',
                        '#95a5a6'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw}%`;
                            }
                        }
                    }
                }
            }
        });


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
            categories: ['Salaires', 'Loyers', 'Équipement', 'Marketing', 
                        'Services', 'Formation', 'Déplacements', 'Assurances'],
            amounts: [28500, 3200, 4800, 2500, 850, 1200, 650, 430],
            colors: ['#4caf50', '#2196f3', '#ff9800', '#f44336', 
                     '#9c27b0', '#009688', '#ff5722', '#e91e63']
        };

        // ============================================
        // DONNÉES DE RÉPARTITION DES DÉPENSES - ANNÉE
        // ============================================
        
        const expensesDistributionYear = {
            categories: ['Salaires', 'Loyers', 'Équipement', 'Marketing', 
                        'Services', 'Formation', 'Déplacements', 'Assurances', 
                        'Frais bancaires', 'Consulting', 'Fournitures', 'Autres'],
            amounts: [324500, 38400, 42500, 28600, 10200, 14400, 
                     7800, 5160, 2400, 18500, 8200, 5340],
            percentages: [42.5, 8.2, 9.1, 6.1, 2.2, 3.1, 
                        1.7, 1.1, 0.5, 4.0, 1.8, 1.7]
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
                title = 'Dépenses du mois ';
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
            // Utiliser les données de novembre (index 10)
            const currentMonth = 10; // Novembre (0-indexed)
            
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
                // Utiliser les données de 2023
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

        // ============================================
        // DONNÉES STATISTIQUES SUPPLÉMENTAIRES
        // ============================================
        
        const statisticsData = {
            averageRevenue: 58900,
            averageExpense: 44500,
            bestMonth: 'Décembre 2023',
            bestMonthRevenue: 75800,
            worstMonth: 'Janvier 2023',
            worstMonthRevenue: 45600,
            growth: {
                revenue: 12.5,
                expense: 4.2,
                profit: 23.8
            }
        };

        // Calculs supplémentaires
        function calculateYearlyStats() {
            const totalRevenue = monthlyData.revenues.reduce((a, b) => a + b, 0);
            const totalExpense = monthlyData.expenses.reduce((a, b) => a + b, 0);
            const totalProfit = totalRevenue - totalExpense;
            const profitMargin = ((totalProfit / totalRevenue) * 100).toFixed(1);
            
            console.log(`=== STATISTIQUES ANNUELLES 2023 ===`);
            console.log(`Chiffre d'affaires total: XOF ${totalRevenue.toLocaleString('fr-FR')}`);
            console.log(`Dépenses totales: XOF ${totalExpense.toLocaleString('fr-FR')}`);
            console.log(`Bénéfice net: XOF ${totalProfit.toLocaleString('fr-FR')}`);
            console.log(`Marge bénéficiaire: ${profitMargin}%`);
            
            return {
                totalRevenue,
                totalExpense,
                totalProfit,
                profitMargin
            };
        }

        // Exécuter les calculs
        const yearlyStats = calculateYearlyStats();

    </script>


    <script>
        // Toggle sidebar on mobile
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const mainContent = document.getElementById('mainContent');
        
        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        });
        
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        });
        
        
        
        // Mobile search functionality
        const mobileSearchBtn = document.getElementById('mobileSearchBtn');
        if (mobileSearchBtn) {
            mobileSearchBtn.addEventListener('click', function() {
                const searchQuery = prompt("Entrez votre recherche :");
                if (searchQuery) {
                    alert("Recherche de : " + searchQuery);
                    // Implement search functionality here
                }
            });
        }
        
        // Make sure chart resizes properly on load
        window.dispatchEvent(new Event('resize'));
    </script>
    
    <script src="{{asset('asset/main.js')}}"></script>
</body>
</html>