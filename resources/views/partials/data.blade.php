 <?php

    use App\Models\Client;
    use App\Models\Produit;
    use App\Models\Recette;
    use App\Models\Vente;

    
    // chiffre d'affaire mois actuel ttc
    $caMoisActuel = Recette::where('statut', 'recu')->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('montant');

    //Chiffre d'affaire HT + montant TVA
    $entreprise = request()->user()->entreprise;
    $ca_ht = $caMoisActuel;

    // chiffre d'affaire mois precedent
    $caMoisPrecedent = Recette::where('statut', 'recu')->whereMonth('created_at', now()->submonth()->month)->whereYear('created_at', now()->subMonth()->year)->sum('montant');

    // Taux chiffre d'affaire
    $tauxCA = $caMoisPrecedent > 0 ? (($caMoisActuel - $caMoisPrecedent) / $caMoisPrecedent) * 100 : null;

    // Commande mois actuel
    $commandesMois = Vente::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();

    // Commande mois precedent
    $commandesMoisPrecedent = Vente::whereMonth('created_at', now()->subMonth()->month)->whereYear('created_at', now()->subMonth()->year)->count();

    // Taux commande
    $tauxCommandes = $commandesMoisPrecedent > 0 ? (($commandesMois - $commandesMoisPrecedent) / $commandesMoisPrecedent)* 100 : null;

    // Total produit
    $totalProduits = Produit::all()->count();

    // Produit ajoute de ce mois
    $produitsMois = Produit::whereMonth('created_at', now()->month)->count();

    // Produit mois precedenr
    $produitsMoisPrecedent = Produit::whereMonth('created_at', now()->subMonth()->month)->count();

    // nombre total de cient
    $totalClients = Client::all()->count();

    // client de ce mois
    $clientsMois = Client::whereMonth('created_at', now()->month)->count();

    // client du mois precedent
    $clientsMoisPrecedent = Client::whereMonth('created_at', now()->subMonth()->month)->count();

    // Taux client
    $tauxClients = $clientsMoisPrecedent > 0 ? (($clientsMois - $clientsMoisPrecedent) / $clientsMoisPrecedent) * 100 : null;

?>

 <div class="row g-3 mb-4">
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1">Chiffre d'affaires </p>
                    <h3 class="value fw-bold">{{ number_format($ca_ht, 0, ',', ' ') }} XOF</h3>
                    
                        @if($tauxCommandes > 15)
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i> {{number_format($tauxCommandes, 1)}}% vs mois dernier
                        </small>
                        @elseif($tauxCommandes < 8)
                        <small class="text-danger">
                            <i class="fas fa-arrow-down me-1"></i> {{number_format(abs($tauxCommandes), 1)}}% vs mois dernier
                        </small>
                        @endif

                </div>
                <div class="icon bg-primary bg-opacity-10 text-primary">
                    <!--<i class="fas fa-franc-sign"></i>-->
                    <span>💰</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1">Commandes</p>
                    <h3 class="value fw-bold">{{$commandesMois}}</h3>
                    
                         @if($tauxCA > 15)
                         <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i> {{number_format($tauxCA, )}}% vs mois dernier
                         </small>
                        @elseif($tauxCA < 8)
                        <small class="text-danger">
                            <i class="fas fa-arrow-down me-1"></i> {{number_format(abs($tauxCA), 1)}}% vs mois dernier
                        </small>    
                        @endif
                    
                </div>
                <div class="icon bg-success bg-opacity-10 text-success">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1">Clients</p>
                    <h3 class="value fw-bold">{{$clientsMois}}</h3>
                    
                        @if($tauxClients > 15)
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i> {{number_format($tauxClients, 1)}}% vs mois dernier
                        </small>
                        @elseif($tauxClients < 8)
                        <small class="text-danger">
                            <i class="fas fa-arrow-down me-1"></i> {{number_format(abs($tauxClients), 1)}}% vs mois dernier
                        </small>    
                        @endif
                    
                </div>
                <div class="icon bg-warning bg-opacity-10 text-warning">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="text-muted mb-1">Produits</p>
                    <h3 class="value fw-bold">{{$produitsMois}}</h3>
                    <small class="text-info">
                            <i class="fas fa-arrow-up me-1"></i>
                    </small>
                </div>
                <div class="icon bg-info bg-opacity-10 text-info">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>
    </div>
</div>
