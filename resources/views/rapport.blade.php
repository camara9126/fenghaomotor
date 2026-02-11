<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptabilité - B-Manager | Graphiques Financiers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Styles identiques à la page précédente */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary-color: #1a237e;
            --secondary-color: #3949ab;
            --accent-color: #5c6bc0;
            --success-color: #4caf50;
            --danger-color: #f44336;
            --warning-color: #ff9800;
            --light-color: #f5f5f5;
            --dark-color: #333;
            --gray-color: #757575;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
        header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo-icon {
            background-color: var(--accent-color);
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
        }
        
        .logo-text h1 {
            font-size: 24px;
            font-weight: 700;
        }
        
        .logo-text span {
            color: #c5cae9;
            font-weight: 400;
            font-size: 14px;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 25px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 5px 0;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        nav a:hover {
            color: #c5cae9;
        }
        
        nav a.active:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--accent-color);
            border-radius: 2px;
        }
        
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
        
        /* Page Header */
        .page-header {
            padding: 30px 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .page-header h2 {
            font-size: 32px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .page-header h2 i {
            color: var(--accent-color);
        }
        
        .page-actions {
            display: flex;
            gap: 15px;
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
        
        .btn-primary {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26, 35, 126, 0.2);
        }
        
        .btn-success {
            background-color: var(--success-color);
            color: white;
        }
        
        .btn-success:hover {
            background-color: #3d8b40;
            transform: translateY(-2px);
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
        
        /* Reste des styles identiques */
        .table-section, .history-section, .quick-actions, footer {
            /* Garder les mêmes styles que précédemment */
        }
        
        @media (max-width: 992px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header identique -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <div class="logo-icon">B</div>
                <div class="logo-text">
                    <h1>B-Manager</h1>
                    <span>Module Comptabilité</span>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="dashboard.html"><i class="fas fa-home"></i> Tableau de bord</a></li>
                    <li><a href="clients.html"><i class="fas fa-users"></i> Clients</a></li>
                    <li><a href="invoices.html"><i class="fas fa-file-invoice"></i> Factures</a></li>
                    <li><a href="accounting.html" class="active"><i class="fas fa-calculator"></i> Comptabilité</a></li>
                    <li><a href="reports.html"><i class="fas fa-chart-bar"></i> Rapports</a></li>
                    <li><a href="settings.html"><i class="fas fa-cog"></i> Paramètres</a></li>
                </ul>
            </nav>
            <div class="user-info">
                <div class="user-avatar">JD</div>
                <span>Jean Dupont</span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h2><i class="fas fa-calculator"></i> Comptabilité</h2>
            <div class="page-actions">
                <button class="btn btn-light"><i class="fas fa-print"></i> Imprimer</button>
                <button class="btn btn-success"><i class="fas fa-plus"></i> Nouvelle Transaction</button>
                <button class="btn btn-primary"><i class="fas fa-file-export"></i> Exporter</button>
            </div>
        </div>

        <!-- Dashboard -->
        <section class="dashboard">
            <div class="dashboard-card">
                <div class="card-header">
                    <h3 class="card-title">Total Recettes</h3>
                    <div class="card-icon icon-income">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                </div>
                <div class="card-value" id="total-revenus">€ 124,850.00</div>
                <div class="card-trend trend-up">
                    <i class="fas fa-arrow-up"></i>
                    <span id="revenus-trend">+12% vs mois précédent</span>
                </div>
            </div>
            
            <div class="dashboard-card">
                <div class="card-header">
                    <h3 class="card-title">Total Dépenses</h3>
                    <div class="card-icon icon-expense">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                </div>
                <div class="card-value" id="total-depenses">€ 78,430.00</div>
                <div class="card-trend trend-down">
                    <i class="fas fa-arrow-down"></i>
                    <span id="depenses-trend">-5% vs mois précédent</span>
                </div>
            </div>
            
            <div class="dashboard-card">
                <div class="card-header">
                    <h3 class="card-title">Résultat Net</h3>
                    <div class="card-icon icon-profit">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
                <div class="card-value positive" id="resultat-net">€ 46,420.00</div>
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
                <div class="card-value" id="tresorerie">€ 89,250.00</div>
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

        <!-- Reste du contenu (tableau, historique, actions rapides, footer) identique -->
    </main>

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
        // DONNÉES MENSUELLES - ANNÉE 2023
        // ============================================
        
        const monthlyData = {
            months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 
                     'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            revenues: [45600, 48900, 52300, 49800, 54200, 57800, 
                      61200, 58900, 64500, 67800, 71200, 75800],
            expenses: [38400, 39200, 40500, 39800, 41500, 43200,
                      45100, 44300, 46800, 47500, 48200, 49600],
            profits: [7200, 9700, 11800, 10000, 12700, 14600,
                     16100, 14600, 17700, 20300, 23000, 26200]
        };

        // ============================================
        // DONNÉES TRIMESTRIELLES
        // ============================================
        
        const quarterlyData = {
            quarters: ['T1 2023', 'T2 2023', 'T3 2023', 'T4 2023'],
            revenues: [146800, 161800, 184600, 214800],
            expenses: [118100, 124500, 136200, 145300],
            profits: [28700, 37300, 48400, 69500]
        };

        // ============================================
        // DONNÉES ANNUELLES
        // ============================================
        
        const yearlyData = {
            years: ['2019', '2020', '2021', '2022', '2023'],
            revenues: [385000, 412000, 458000, 512000, 588000],
            expenses: [312000, 338000, 372000, 418000, 471000],
            profits: [73000, 74000, 86000, 94000, 117000]
        };

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
        const labels = @json($labels);
        const recettes = @json($dataRecettes);
        const depenses = @json($dataDepenses);
        const benefices = @json($dataBenefices);
        
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
                    title = 'Évolution mensuelle 2023';
                    break;
                case 'trimestriel':
                    labels = quarterlyData.quarters;
                    revenueData = quarterlyData.revenues;
                    expenseData = quarterlyData.expenses;
                    profitData = quarterlyData.profits;
                    title = 'Évolution trimestrielle 2023';
                    break;
                case 'annuel':
                    labels = yearlyData.years;
                    revenueData = yearlyData.revenues;
                    expenseData = yearlyData.expenses;
                    profitData = yearlyData.profits;
                    title = 'Évolution annuelle 2019-2023';
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
                                    return `${label}: € ${value.toLocaleString('fr-FR')}`;
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
                                    return '€ ' + value.toLocaleString('fr-FR');
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
                title = 'Dépenses du mois - Novembre 2023';
            } else {
                labels = expensesDistributionYear.categories;
                data = expensesDistributionYear.amounts;
                backgroundColors = colors.categories;
                title = 'Dépenses annuelles - 2023';
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
                                    return `${label}: € ${value.toLocaleString('fr-FR')} (${percentage}%)`;
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
                `€ ${monthlyData.revenues[currentMonth].toLocaleString('fr-FR')}.00`;
            
            document.getElementById('total-depenses').textContent = 
                `€ ${monthlyData.expenses[currentMonth].toLocaleString('fr-FR')}.00`;
            
            document.getElementById('resultat-net').textContent = 
                `€ ${monthlyData.profits[currentMonth].toLocaleString('fr-FR')}.00`;
            
            // Trésorerie (cumul des bénéfices)
            let tresorerie = 0;
            for(let i = 0; i <= currentMonth; i++) {
                tresorerie += monthlyData.profits[i];
            }
            document.getElementById('tresorerie').textContent = 
                `€ ${tresorerie.toLocaleString('fr-FR')}.00`;
        }
        
        function updateDashboardValuesForPeriod(period) {
            if (period === 'mensuel') {
                updateDashboardValues();
            } else if (period === 'trimestriel') {
                // Utiliser les données du T4
                document.getElementById('total-revenus').textContent = 
                    `€ ${quarterlyData.revenues[3].toLocaleString('fr-FR')}.00`;
                document.getElementById('total-depenses').textContent = 
                    `€ ${quarterlyData.expenses[3].toLocaleString('fr-FR')}.00`;
                document.getElementById('resultat-net').textContent = 
                    `€ ${quarterlyData.profits[3].toLocaleString('fr-FR')}.00`;
                document.getElementById('tresorerie').textContent = 
                    `€ ${quarterlyData.profits[3].toLocaleString('fr-FR')}.00`;
            } else if (period === 'annuel') {
                // Utiliser les données de 2023
                document.getElementById('total-revenus').textContent = 
                    `€ ${yearlyData.revenues[4].toLocaleString('fr-FR')}.00`;
                document.getElementById('total-depenses').textContent = 
                    `€ ${yearlyData.expenses[4].toLocaleString('fr-FR')}.00`;
                document.getElementById('resultat-net').textContent = 
                    `€ ${yearlyData.profits[4].toLocaleString('fr-FR')}.00`;
                document.getElementById('tresorerie').textContent = 
                    `€ ${yearlyData.profits[4].toLocaleString('fr-FR')}.00`;
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
                `€ ${Math.round(newRevenue).toLocaleString('fr-FR')}.00`;
            document.getElementById('total-depenses').textContent = 
                `€ ${Math.round(newExpense).toLocaleString('fr-FR')}.00`;
            document.getElementById('resultat-net').textContent = 
                `€ ${Math.round(newRevenue - newExpense).toLocaleString('fr-FR')}.00`;
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
            console.log(`Chiffre d'affaires total: € ${totalRevenue.toLocaleString('fr-FR')}`);
            console.log(`Dépenses totales: € ${totalExpense.toLocaleString('fr-FR')}`);
            console.log(`Bénéfice net: € ${totalProfit.toLocaleString('fr-FR')}`);
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
</body>
</html>