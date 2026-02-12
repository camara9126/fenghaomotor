@include('partials.header')
        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">
                <!-- Stats Row -->
                
                <!-- Recent Orders -->
                <div class="row">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">

                        <!-- Section Produits -->
                        <h3 class="mb-0">Recettes</h3>
                        @can('gerer-ventes')
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#depenseModal">
                                Enregister
                            </button>
                        @endcan
                        </div>
                        <div class="stat-card">        
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="stat-card">
                                        <div class="table-responsive">
                                            <!--<nav class="navbar navbar-light bg-light">-->
                                                <form method="get" action="{{route('recettes.search')}}" class="form-inline">
                                                   
                                                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher par nom client.." aria-label="Search">                                                            
                                                
                                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>                                                    
                                                       
                                                </form>
                                            <!--</nav>-->
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Ref-Paiement</th>
                                                        <th>Libelle</th>
                                                        <th>Montant</th>
                                                        <th>Mode de paiement</th>
                                                        <th>Statut</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($recettes as $r)
                                                    <tr>
                                                        <td>{{$r->reference}}</td>
                                                        <td>{{$r->date_recette}}</td>
                                                        <td>{{optional($r->paiement)->reference ?? '-'}}</td>
                                                        <td>{{$r->libelle}}</td>
                                                        <td>{{ucfirst(number_format($r->montant, 0, ',',' '))}} XOF</td>
                                                        <td>{{ucfirst($r->mode_paiement)}}</td>
                                                        <td>
                                                            <span class="badge bg-{{ $r->statut == 'recu' ? 'success' : 'danger' }}">
                                                                {{ ucfirst($r->statut) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="7" align="center">Donnee vide !</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>    
                                        </div>
                                        <div class="d-flex justify-content-center mt-4">
                                            {{$recettes->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal paiement -->
                        <div class="modal fade" id="depenseModal" tabindex="-1">
                            <div class="modal-dialog">
                                <form action="{{ route('recettes.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Recette</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <!-- Libellé -->
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Libellé de la recette</label>
                                                    <input type="text" name="libelle" class="form-control" 
                                                        placeholder="Ex : Vente produit X" required>
                                                </div>

                                                <!-- Paiement lié -->
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Paiement lié (optionnel)</label>
                                                    <select name="paiement_id" class="form-control">
                                                        <option value="">-- Aucun --</option>
                                                        @foreach($paiements as $paiement)
                                                            <option value="{{ $paiement->id }}">
                                                                {{ $paiement->reference }} - {{ number_format($paiement->montant,0,',',' ') }} FCFA
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Montant -->
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Montant (FCFA)</label>
                                                    <input type="number" name="montant" class="form-control" step="0.01" required>
                                                </div>

                                                <!-- Date -->
                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Date de la recette</label>
                                                    <input type="date" name="date_recette" 
                                                        class="form-control" value="{{ date('Y-m-d') }}" required>
                                                </div>

                                                <!-- Mode de paiement -->
                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Mode de paiement</label>
                                                    <select name="mode_paiement" class="form-control" required>
                                                        <option value="">-- Choisir --</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="mobile_money">Mobile Money</option>
                                                        <option value="virement">Virement</option>
                                                        <option value="cheque">Chèque</option>
                                                    </select>
                                                </div>

                                                <!-- Description -->
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Description (optionnelle)</label>
                                                    <textarea name="description" class="form-control" rows="3"
                                                            placeholder="Détails supplémentaires..."></textarea>
                                                </div>

                                            </div>

                                            <!-- Bouton -->
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success">
                                                    💾 Enregistrer la recette
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>   
                    </div>
                </div>
                
            </section>

@include('partials.footer')