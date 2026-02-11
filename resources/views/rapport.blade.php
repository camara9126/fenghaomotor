<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Mensuel | Logiciel Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
            padding: 20px;
        }

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
            color: #1976d2;
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
    <div class="dashboard-container">
        <header>
            <h1>Tableau de Bord Mensuel</h1>
            <div class="period-selector">
                <select id="monthSelect">
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
                </select>
                <div class="export-buttons">
                    <button class="btn btn-secondary" onclick="exportData('png')">Export PNG</button>
                    <button class="btn btn-primary" onclick="exportData('pdf')">Export PDF</button>
                </div>
            </div>
        </header>

        <div class="stats-summary">
            <div class="stat-card orders">
                <div class="stat-icon">
                    <span>📦</span>
                </div>
                <div class="stat-info">
                    <h3>Commandes</h3>
                    <div class="stat-value">1,247</div>
                    <div class="stat-change positive">↑ 12.5% vs mois dernier</div>
                </div>
            </div>

            <div class="stat-card revenue">
                <div class="stat-icon">
                    <span>💰</span>
                </div>
                <div class="stat-info">
                    <h3>Chiffre d'Affaires</h3>
                    <div class="stat-value">€45,820</div>
                    <div class="stat-change positive">↑ 8.3% vs mois dernier</div>
                </div>
            </div>

            <div class="stat-card products">
                <div class="stat-icon">
                    <span>📊</span>
                </div>
                <div class="stat-info">
                    <h3>Produits Vendus</h3>
                    <div class="stat-value">3,458</div>
                    <div class="stat-change positive">↑ 5.7% vs mois dernier</div>
                </div>
            </div>

            <div class="stat-card customers">
                <div class="stat-icon">
                    <span>👥</span>
                </div>
                <div class="stat-info">
                    <h3>Nouveaux Clients</h3>
                    <div class="stat-value">187</div>
                    <div class="stat-change negative">↓ 2.1% vs mois dernier</div>
                </div>
            </div>
        </div>

        <div class="charts-container">
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
                    <h2>Chiffre d'Affaires Mensuel</h2>
                </div>
                <div class="chart-wrapper">
                    <canvas id="revenueChart"></canvas>
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

            <div class="chart-card">
                <div class="chart-header">
                    <h2>Statut des Commandes</h2>
                </div>
                <div class="chart-wrapper">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>

        <footer>
            <p>Tableau de bord mis à jour en temps réel | Données du mois de septembre 2024</p>
            <p>© 2024 Votre Logiciel Analytics. Tous droits réservés.</p>
        </footer>
    </div>

    <script>
        // Données pour les graphiques
        const months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];
        const currentMonthIndex = 8; // Septembre (0-indexed)

        // Graphique des commandes
        const ordersCtx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ordersCtx, {
            type: 'line',
            data: {
                labels: ['1', '5', '10', '15', '20', '25', '30'],
                datasets: [{
                    label: 'Commandes',
                    data: [45, 52, 48, 65, 70, 75, 82],
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

        // Graphique du chiffre d'affaires
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep'],
                datasets: [{
                    label: 'Chiffre d\'affaires (k€)',
                    data: [32, 28, 35, 40, 38, 42, 45, 44, 45.8],
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(41, 128, 185, 0.9)'
                    ],
                    borderColor: [
                        'rgb(46, 204, 113)',
                        'rgb(46, 204, 113)',
                        'rgb(46, 204, 113)',
                        'rgb(46, 204, 113)',
                        'rgb(46, 204, 113)',
                        'rgb(46, 204, 113)',
                        'rgb(46, 204, 113)',
                        'rgb(46, 204, 113)',
                        'rgb(41, 128, 185)'
                    ],
                    borderWidth: 1
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
                            text: 'Chiffre d\'affaires (k€)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mois'
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
                labels: ['Produit A', 'Produit B', 'Produit C', 'Produit D', 'Autres'],
                datasets: [{
                    data: [35, 25, 20, 12, 8],
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

        // Graphique des statuts de commande
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(statusCtx, {
            type: 'polarArea',
            data: {
                labels: ['Livrées', 'En cours', 'En attente', 'Annulées'],
                datasets: [{
                    data: [75, 15, 8, 2],
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(52, 152, 219, 0.7)',
                        'rgba(241, 196, 15, 0.7)',
                        'rgba(231, 76, 60, 0.7)'
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
                    }
                },
                scales: {
                    r: {
                        ticks: {
                            display: false
                        }
                    }
                }
            }
        });

        // Gestion du changement de mois/année
        document.getElementById('monthSelect').addEventListener('change', function() {
            updateDashboard(this.value, document.getElementById('yearSelect').value);
        });

        document.getElementById('yearSelect').addEventListener('change', function() {
            updateDashboard(document.getElementById('monthSelect').value, this.value);
        });

        function updateDashboard(month, year) {
            const monthName = months[parseInt(month)];
            document.querySelector('footer p').textContent = `Tableau de bord mis à jour en temps réel | Données du mois de ${monthName} ${year}`;
            
            // Simulation de mise à jour des données
            alert(`Mise à jour des données pour ${monthName} ${year}... (simulation)`);
        }

        // Fonction d'export
        function exportData(format) {
            if (format === 'png') {
                alert('Export des graphiques au format PNG (simulation)');
            } else if (format === 'pdf') {
                alert('Génération du rapport PDF (simulation)');
            }
        }

        // Sélectionner le mois actuel dans le sélecteur
        document.getElementById('monthSelect').value = currentMonthIndex;
    </script>
</body>
</html>