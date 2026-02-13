    <div class="sidebar" id="sidebar">
        <div class="sidebar-header mb-0">           
            <img src="{{ asset('asset/logo/logo bas.png') }}" alt="Logo entreprise" class="w-100">
            <small class="text-white">{{ Auth::user()->entreprise->adresse }}</small>
        </div>

        <div class="px-2 py-2 mt-0">
            <ul class="nav flex-column">      
                <li class="nav-item mb-0 mt-0">
                    <a href="{{ route('dashboard.index') }}" class="nav-link" data-section="dashboard">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </li>
                @can('gerer-stock')
                    <li class="nav-item mb-0 mt-0">
                        <a href="{{ route('produits.index') }}" class="nav-link">
                            <i class="fas fa-list"></i> Produits
                        </a>
                    </li>
                    <li class="nav-item mb-0 mt-0">
                        <a href="{{ route('fournisseurs.index') }}" class="nav-link">
                            <i class="fas fa-truck"></i> Fournisseurs
                        </a>
                    </li>
                    <li class="nav-item mb-0 mt-0">
                        <a href="{{ route('mouvements') }}" class="nav-link">
                            <i class="fas fa-bars-staggered"></i> Stocks
                        </a>
                    </li>
                @endcan
                <hr>
                @can('gerer-ventes')
                    <li class="nav-item mb-0 mt-0">
                        <a href="{{ route('clients.index') }}" class="nav-link">
                            <i class="fas fa-users"></i> Clients
                        </a>
                    </li>
                    <li class="nav-item mb-0 mt-0">
                        <a href="{{ route('ventes.index') }}" class="nav-link">
                            <i class="fas fa-cart-arrow-down"></i> Ventes & Factures
                        </a>
                    </li> 
                @endcan
                <hr>
                <li class="nav-item mb-0 mt-0">
                    <a href="{{ route('paiements.index') }}" class="nav-link" data-section="invoices">
                        <i class="fas fa-money-bill-1-wave"></i> Paiements
                    </a>
                </li>
                <li class="nav-item mb-0 mt-0">
                    <a href="{{ route('recettes.index') }}" class="nav-link" data-section="finance">
                        <i class="fas fa-right-left"></i> Recettes
                    </a>
                </li>
                <li class="nav-item mb-0 mt-0">
                    <a href="{{ route('depenses.index') }}" class="nav-link" data-section="finance">
                        <i class="fas fa-arrow-right-from-bracket"></i> Depenses
                    </a>
                </li>
                <hr>
                <li class="nav-item mb-0 mt-0">
                    <a href="{{ route('dashboard.rapport') }}" class="nav-link" data-section="reports">
                        <i class="fas fa-chart-bar"></i> Rapports
                    </a>
                </li>
                @can('admin')
                <!--<li class="nav-item mb-0 mt-0">
                    <a href="{{ route('dashboard.comptabilite') }}" class="nav-link" data-section="reports">
                        <i class="fas fa-chart-bar"></i> Comptabilite
                    </a>
                </li>-->
                    <li class="nav-item">
                        <a href="{{ route('user.compte') }}" class="nav-link" data-section="settings">
                            <i class="fas fa-user"></i> Utilisateurs
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>