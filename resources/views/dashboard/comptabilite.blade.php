<?php

    $entreprise = request()->user()->entreprise;
?>
<!DOCTYPE html>
<html lang="fr">
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
        }
        
        .chart-title {
            font-size: 20px;
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .period-selector {
            display: flex;
            gap: 10px;
        }
        
        .period-btn {
            padding: 8px 15px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background-color: white;
            cursor: pointer;
            font-size: 14px;
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
        
        .chart-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: var(--gray-color);
            font-style: italic;
        }
        
        /* Table Section */
        .table-section {
            margin-bottom: 40px;
        }
        
        .table-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
        }
        
        .table-title {
            font-size: 20px;
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .table-actions {
            display: flex;
            gap: 10px;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #f5f5f5;
        }
        
        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: var(--gray-color);
            border-bottom: 1px solid #eee;
            white-space: nowrap;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        
        tbody tr:hover {
            background-color: #f9f9f9;
        }
        
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }
        
        .status-paid {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success-color);
        }
        
        .status-pending {
            background-color: rgba(255, 152, 0, 0.1);
            color: var(--warning-color);
        }
        
        .status-overdue {
            background-color: rgba(244, 67, 54, 0.1);
            color: var(--danger-color);
        }
        
        .category {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            background-color: #f0f0f0;
        }
        
        .category-salary { background-color: #e3f2fd; color: #1976d2; }
        .category-rent { background-color: #f3e5f5; color: #7b1fa2; }
        .category-equipment { background-color: #e8f5e8; color: #388e3c; }
        .category-marketing { background-color: #fff3e0; color: #f57c00; }
        .category-utilities { background-color: #fce4ec; color: #c2185b; }
        
        /* History Section */
        .history-section {
            margin-bottom: 40px;
        }
        
        .history-tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        
        .tab {
            padding: 12px 25px;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 500;
            color: var(--gray-color);
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }
        
        .tab:hover {
            color: var(--secondary-color);
        }
        
        .tab.active {
            color: var(--secondary-color);
            border-bottom-color: var(--secondary-color);
        }
        
        .history-content {
            display: none;
        }
        
        .history-content.active {
            display: block;
        }
        
        .history-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .history-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }
        
        .history-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .history-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }
        
        .history-details h4 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .history-details p {
            font-size: 14px;
            color: var(--gray-color);
        }
        
        .history-amount {
            font-weight: 600;
            font-size: 18px;
        }
        
        /* Quick Actions */
        .quick-actions {
            margin-bottom: 50px;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .action-card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
            color: white;
        }
        
        .action-icon.export { background-color: #ff9800; }
        .action-icon.report { background-color: #9c27b0; }
        .action-icon.tax { background-color: #f44336; }
        .action-icon.reconcile { background-color: #4caf50; }
        
        .action-card h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        
        .action-card p {
            font-size: 14px;
            color: var(--gray-color);
        }
        
        /* Footer */
        footer {
            background-color: #1a237e;
            color: white;
            padding: 40px 0 20px;
            margin-top: 50px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h4 {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-column h4:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: #c5cae9;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column ul li a:hover {
            color: white;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #c5cae9;
            font-size: 14px;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 992px) {
            .dashboard {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .header-container {
                flex-direction: column;
                gap: 15px;
            }
            
            nav ul {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .page-actions {
                width: 100%;
                justify-content: flex-start;
            }
            
            .chart-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .period-selector {
                width: 100%;
                justify-content: flex-start;
            }
        }
        
        @media (max-width: 576px) {
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .table-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .table-actions {
                width: 100%;
                justify-content: flex-start;
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
                         
                        </li>
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
                        <li><a class="dropdown-item" href="#"><i class="fas fa-tools me-2"></i> Parametre</a></li>
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
        </div>>

        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">
                <!-- Stats Row -->
                @include('partials.data')
                @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                <!-- Recent Orders -->
                <div class="row">

                    <!-- Dashboard -->
                    <section class="dashboard">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h3 class="card-title">Total Recettes</h3>
                                <div class="card-icon icon-income">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                            </div>
                            <div class="card-value">€ 124,850.00</div>
                            <div class="card-trend trend-up">
                                <i class="fas fa-arrow-up"></i>
                                <span>+12% vs mois précédent</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h3 class="card-title">Total Dépenses</h3>
                                <div class="card-icon icon-expense">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                            </div>
                            <div class="card-value">€ 78,430.00</div>
                            <div class="card-trend trend-down">
                                <i class="fas fa-arrow-down"></i>
                                <span>-5% vs mois précédent</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <h3 class="card-title">Résultat Net</h3>
                                <div class="card-icon icon-profit">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <div class="card-value positive">€ 46,420.00</div>
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
                            <div class="card-value">€ 89,250.00</div>
                            <div class="card-trend trend-up">
                                <i class="fas fa-arrow-up"></i>
                                <span>Solde disponible</span>
                            </div>
                        </div>
                    </section>

                    <!-- Charts Section -->
                    <section class="charts-section">
                        <div class="chart-card">
                            <div class="chart-header">
                                <h3 class="chart-title">Évolution des Recettes et Dépenses</h3>
                                <div class="period-selector">
                                    <button class="period-btn active">Mensuel</button>
                                    <button class="period-btn">Trimestriel</button>
                                    <button class="period-btn">Annuel</button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <div class="chart-placeholder">
                                    <div>
                                        <i class="fas fa-chart-line" style="font-size: 48px; margin-bottom: 15px; color: #ddd;"></i>
                                        <p>Graphique d'évolution des finances (intégration avec bibliothèque graphique)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="chart-card">
                            <div class="chart-header">
                                <h3 class="chart-title">Répartition des Dépenses</h3>
                                <div class="period-selector">
                                    <button class="period-btn active">Mois</button>
                                    <button class="period-btn">Année</button>
                                </div>
                            </div>
                            <div class="chart-container">
                                <div class="chart-placeholder">
                                    <div>
                                        <i class="fas fa-chart-pie" style="font-size: 48px; margin-bottom: 15px; color: #ddd;"></i>
                                        <p>Graphique circulaire des dépenses par catégorie</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Table Section -->
                    <section class="table-section">
                        <div class="table-card">
                            <div class="table-header">
                                <h3 class="table-title">Tableau Comptable Mensuel (Novembre 2023)</h3>
                                <div class="table-actions">
                                    <button class="btn btn-light"><i class="fas fa-filter"></i> Filtrer</button>
                                    <button class="btn btn-light"><i class="fas fa-download"></i> Télécharger</button>
                                </div>
                            </div>
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Référence</th>
                                            <th>Description</th>
                                            <th>Catégorie</th>
                                            <th>Type</th>
                                            <th>Montant</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>02/11/2023</td>
                                            <td>FAC-2023-00125</td>
                                            <td>Vente produit Alpha</td>
                                            <td><span class="category">Ventes</span></td>
                                            <td>Recette</td>
                                            <td>€ 8,500.00</td>
                                            <td><span class="status status-paid">Payée</span></td>
                                            <td><i class="fas fa-eye" style="color: var(--accent-color); cursor: pointer;"></i></td>
                                        </tr>
                                        <tr>
                                            <td>05/11/2023</td>
                                            <td>DEP-2023-00342</td>
                                            <td>Loyer bureau</td>
                                            <td><span class="category category-rent">Loyer</span></td>
                                            <td>Dépense</td>
                                            <td>€ 3,200.00</td>
                                            <td><span class="status status-paid">Payée</span></td>
                                            <td><i class="fas fa-eye" style="color: var(--accent-color); cursor: pointer;"></i></td>
                                        </tr>
                                        <tr>
                                            <td>10/11/2023</td>
                                            <td>FAC-2023-00126</td>
                                            <td>Vente produit Beta</td>
                                            <td><span class="category">Ventes</span></td>
                                            <td>Recette</td>
                                            <td>€ 12,750.00</td>
                                            <td><span class="status status-pending">En attente</span></td>
                                            <td><i class="fas fa-eye" style="color: var(--accent-color); cursor: pointer;"></i></td>
                                        </tr>
                                        <tr>
                                            <td>15/11/2023</td>
                                            <td>DEP-2023-00345</td>
                                            <td>Salaires novembre</td>
                                            <td><span class="category category-salary">Salaires</span></td>
                                            <td>Dépense</td>
                                            <td>€ 28,500.00</td>
                                            <td><span class="status status-paid">Payée</span></td>
                                            <td><i class="fas fa-eye" style="color: var(--accent-color); cursor: pointer;"></i></td>
                                        </tr>
                                        <tr>
                                            <td>18/11/2023</td>
                                            <td>DEP-2023-00348</td>
                                            <td>Achat matériel informatique</td>
                                            <td><span class="category category-equipment">Équipement</span></td>
                                            <td>Dépense</td>
                                            <td>€ 4,800.00</td>
                                            <td><span class="status status-paid">Payée</span></td>
                                            <td><i class="fas fa-eye" style="color: var(--accent-color); cursor: pointer;"></i></td>
                                        </tr>
                                        <tr>
                                            <td>22/11/2023</td>
                                            <td>FAC-2023-00130</td>
                                            <td>Vente produit Gamma</td>
                                            <td><span class="category">Ventes</span></td>
                                            <td>Recette</td>
                                            <td>€ 9,600.00</td>
                                            <td><span class="status status-overdue">En retard</span></td>
                                            <td><i class="fas fa-eye" style="color: var(--accent-color); cursor: pointer;"></i></td>
                                        </tr>
                                        <tr>
                                            <td>25/11/2023</td>
                                            <td>DEP-2023-00350</td>
                                            <td>Campagne marketing digital</td>
                                            <td><span class="category category-marketing">Marketing</span></td>
                                            <td>Dépense</td>
                                            <td>€ 2,500.00</td>
                                            <td><span class="status status-paid">Payée</span></td>
                                            <td><i class="fas fa-eye" style="color: var(--accent-color); cursor: pointer;"></i></td>
                                        </tr>
                                        <tr>
                                            <td>28/11/2023</td>
                                            <td>DEP-2023-00352</td>
                                            <td>Factures électricité/eau</td>
                                            <td><span class="category category-utilities">Services</span></td>
                                            <td>Dépense</td>
                                            <td>€ 850.00</td>
                                            <td><span class="status status-pending">En attente</span></td>
                                            <td><i class="fas fa-eye" style="color: var(--accent-color); cursor: pointer;"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>

                    <!-- History Section -->
                    <section class="history-section">
                        <div class="history-tabs">
                            <button class="tab active" data-tab="transactions">Historique des Transactions</button>
                            <button class="tab" data-tab="balances">Soldes Mensuels</button>
                            <button class="tab" data-tab="taxes">Déclarations Fiscales</button>
                        </div>
                        
                        <div id="transactions" class="history-content active">
                            <div class="history-list">
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #4caf50;">
                                            <i class="fas fa-arrow-down"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Virement reçu - Client XYZ</h4>
                                            <p>02/11/2023 • Réf: FAC-2023-00125</p>
                                        </div>
                                    </div>
                                    <div class="history-amount positive">+ € 8,500.00</div>
                                </div>
                                
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #f44336;">
                                            <i class="fas fa-arrow-up"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Paiement loyer</h4>
                                            <p>05/11/2023 • Réf: DEP-2023-00342</p>
                                        </div>
                                    </div>
                                    <div class="history-amount negative">- € 3,200.00</div>
                                </div>
                                
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #4caf50;">
                                            <i class="fas fa-arrow-down"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Facture partiellement payée</h4>
                                            <p>15/11/2023 • Réf: FAC-2023-00128</p>
                                        </div>
                                    </div>
                                    <div class="history-amount positive">+ € 5,250.00</div>
                                </div>
                                
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #f44336;">
                                            <i class="fas fa-arrow-up"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Masse salariale novembre</h4>
                                            <p>15/11/2023 • Réf: DEP-2023-00345</p>
                                        </div>
                                    </div>
                                    <div class="history-amount negative">- € 28,500.00</div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="balances" class="history-content">
                            <div class="history-list">
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #2196f3;">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Novembre 2023</h4>
                                            <p>Solde final: € 89,250.00</p>
                                        </div>
                                    </div>
                                    <div class="history-amount positive">+ € 46,420.00</div>
                                </div>
                                
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #2196f3;">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Octobre 2023</h4>
                                            <p>Solde final: € 42,830.00</p>
                                        </div>
                                    </div>
                                    <div class="history-amount positive">+ € 38,150.00</div>
                                </div>
                                
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #2196f3;">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Septembre 2023</h4>
                                            <p>Solde final: € 4,680.00</p>
                                        </div>
                                    </div>
                                    <div class="history-amount negative">- € 2,450.00</div>
                                </div>
                                
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #2196f3;">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Août 2023</h4>
                                            <p>Solde final: € 7,130.00</p>
                                        </div>
                                    </div>
                                    <div class="history-amount positive">+ € 5,200.00</div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="taxes" class="history-content">
                            <div class="history-list">
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #9c27b0;">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>TVA - 3ème trimestre 2023</h4>
                                            <p>Déclaration déposée le 15/10/2023</p>
                                        </div>
                                    </div>
                                    <div class="history-amount negative">- € 12,480.00</div>
                                </div>
                                
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #9c27b0;">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>Impôt sur les sociétés 2022</h4>
                                            <p>Paiement effectué le 30/09/2023</p>
                                        </div>
                                    </div>
                                    <div class="history-amount negative">- € 24,750.00</div>
                                </div>
                                
                                <div class="history-item">
                                    <div class="history-info">
                                        <div class="history-icon" style="background-color: #9c27b0;">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </div>
                                        <div class="history-details">
                                            <h4>TVA - 2ème trimestre 2023</h4>
                                            <p>Déclaration déposée le 15/07/2023</p>
                                        </div>
                                    </div>
                                    <div class="history-amount negative">- € 9,620.00</div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Quick Actions -->
                    <section class="quick-actions">
                        <h3 style="font-size: 24px; color: var(--primary-color); margin-bottom: 20px;">Actions Rapides</h3>
                        <div class="actions-grid">
                            <div class="action-card">
                                <div class="action-icon export">
                                    <i class="fas fa-file-export"></i>
                                </div>
                                <h4>Exporter Comptabilité</h4>
                                <p>Exportez vos données au format Excel, PDF ou FEC</p>
                            </div>
                            
                            <div class="action-card">
                                <div class="action-icon report">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <h4>Rapport Financier</h4>
                                <p>Générez un rapport détaillé de votre situation financière</p>
                            </div>
                            
                            <div class="action-card">
                                <div class="action-icon tax">
                                    <i class="fas fa-balance-scale"></i>
                                </div>
                                <h4>Prévision Fiscale</h4>
                                <p>Calculez vos prochaines obligations fiscales</p>
                            </div>
                            
                            <div class="action-card">
                                <div class="action-icon reconcile">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                                <h4>Réconciliation Bancaire</h4>
                                <p>Rapprochez vos transactions avec votre compte bancaire</p>
                            </div>
                        </div>
                    </section>
                    
                </div>

<!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-muted">© <?= now()->year ?> Fenghao motor SN. Tous droits réservés.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0 text-muted">Version 1.0.0</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        // Initialisation de Flatpickr pour les sélecteurs de date
        flatpickr(".datepicker", {
            dateFormat: "d/m/Y",
            locale: "fr"
        });
        
        // Gestion des onglets de l'historique
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Retirer la classe active de tous les onglets et contenus
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.history-content').forEach(c => c.classList.remove('active'));
                
                // Ajouter la classe active à l'onglet cliqué
                tab.classList.add('active');
                
                // Afficher le contenu correspondant
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        // Gestion des boutons de période
        document.querySelectorAll('.period-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.period-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                
                // Ici, vous pourriez ajouter une logique pour actualiser les graphiques
                // en fonction de la période sélectionnée
                console.log(`Période sélectionnée: ${btn.textContent}`);
            });
        });
        
        // Simulation de données pour les cartes de dashboard
        function updateDashboardValues() {
            // Cette fonction pourrait être utilisée pour actualiser les valeurs
            // depuis une API ou une source de données
            const cards = document.querySelectorAll('.dashboard-card');
            cards.forEach(card => {
                // Ajouter une animation subtile
                card.style.transform = 'translateY(-5px)';
                setTimeout(() => {
                    card.style.transform = 'translateY(0)';
                }, 300);
            });
        }
        
        // Gestion des actions rapides
        document.querySelectorAll('.action-card').forEach(card => {
            card.addEventListener('click', () => {
                const title = card.querySelector('h4').textContent;
                alert(`Action "${title}" déclenchée. Dans une implémentation réelle, cela ouvrirait la fonctionnalité correspondante.`);
            });
        });
        
        // Exemple de fonction pour exporter les données
        function exportAccountingData(format) {
            alert(`Export des données comptables au format ${format} en cours...`);
            // Ici, vous implémenteriez la logique d'export réelle
        }
        
        // Exemple de fonction pour générer un rapport
        function generateFinancialReport() {
            alert('Génération du rapport financier...');
            // Logique de génération de rapport
        }
        
        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Module Comptabilité Fenghao Motor SN chargé');
            
            // Simuler un chargement de données
            setTimeout(() => {
                updateDashboardValues();
            }, 1000);
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
   <script src="{{asset('asset/main.js')}}"></script>
   
</body>
</html>